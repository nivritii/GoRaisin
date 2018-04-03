<?php

namespace frontend\controllers;

use frontend\models\Wallet;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\rpc\jsonRPCClient;
use Yii;
use frontend\models\Fund;
use frontend\models\Campaign;
use yii\helpers\BaseJson;

class WalletController extends \yii\web\Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['*'],
                    ],
                    // allow authenticated users
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['index', 'create', 'mywallet'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function beforeAction($action)
    {
        $this->enableCsrfValidation = false;
        //\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return parent::beforeAction($action);
    }

    public $url = 'http://52.74.110.127:8092/rpc';
    //192.168.1.138 - webpuppies
    //172.23.205.29 - utown
    //172.17.254.127 - iss

    /**
     * @return string
     */
    public function actionIndex()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $brainKey = $this->createBrainKey();

            return $this->render('new', [
                'brainKey' => $brainKey,
            ]);
        }

        if ($this->checkForWallet()) {
            return $this->redirect(['mywallet']);
        }

        return $this->render('create');
    }

    public function actionCreate()
    {
        $wallet = new Wallet();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $wallet->accname = $_POST['accName'];
            $wallet->brainKey = $_POST['brainKey'];
            $wallet->userId = Yii::$app->user->identity->getId();
            $wallet->save(false);

            $response = $this->createAccount($wallet->brainKey, $wallet->accname);
            if (!empty($response['result'])) {
                $transferRpc = $this->transferAmt($wallet->accname);
                /*$balanceRpc = $this->listAccBalance($wallet->accname);*/

                /*return $this->render('mywallet', [
                    'response' => $balanceRpc,
                ]);*/
                return $this->redirect(['mywallet']);
            }
        }
        return $this->redirect(['index']);
    }

    public function actionMywallet()
    {
        $wallet = Wallet::find()->where(['userId' => \Yii::$app->user->id])->one();

        $response = $this->listAccBalance($wallet->accname);
        $balance = $response['result'][0]['amount'] / 100000;

        $descriptions = array();
        $amountTransferred = array();

        $accountHistory = $this->getAccHistory($wallet->accname);

        for ($i = 0; $i < (count($accountHistory['result']) - 1); $i++) {
            $descriptions[$i] = $accountHistory['result'][$i]['description'];
        }

        for ($i = 0; $i < (count($accountHistory['result']) - 1); $i++) {
            $amountTransferred[$i] = $accountHistory['result'][$i]['op']['op'][1]['amount']['amount'] / 100000;
        }


        return $this->render('mywallet', [
            'balance' => $balance,
            'descriptions' => $descriptions,
            'amountTransferred' => $amountTransferred,
        ]);
    }

    public function actionFund($id)
    {
        $fund = new Fund();
        $campaign = $this->findCampaign($id);
        $receiverAccName = $this->getWallet($campaign->c_author);
        $senderAccName = $this->getWallet(Yii::$app->user->identity->getId());

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $fields = explode(',', $_POST['reward']);
            $amt = $fields[0];
            $fund->r_id = $fields[1];
            $fund->fund_c_id = $id;
            $fund->fund_user_id = Yii::$app->user->identity->getId();
            $fund->fund_amt = $amt;

            $response = $this->fundCampaign($senderAccName->accname, $receiverAccName->accname, $amt);
            if (!empty($response)) {
                $fund->save(false);
                return $this->redirect(['campaign/mycampaign']);
            }
        }

        return $this->redirect(['campaign/fund']);
    }

    protected function getWallet($userId)
    {
        $wallet = Wallet::find()->where(['userId' => $userId])->one();
        if (!empty($wallet)) {
            return $wallet;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    protected function findCampaign($id)
    {
        if (($model = Campaign::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    protected function getAccHistory($accName)
    {
        $rpc = new jsonRPCClient($this->url, true);
        $rpc->setRPCNotification(true);
        $response = $rpc->__call("get_account_history", [$accName, 10000]);

        return $response;
    }

    protected function listAccBalance($accName)
    {
        $rpc = new jsonRPCClient($this->url, true);
        $rpc->setRPCNotification(true);
        $response = $rpc->__call("list_account_balances", [$accName]);

        return $response;
    }

    protected function transferAmt($accName)
    {
        $rpc = new jsonRPCClient($this->url, true);
        $rpc->setRPCNotification(true);
        $response = $rpc->__call("transfer", ["kiru", $accName, "5000", "BTS", "", true]);
        $response = $response['result'];

        return $response;
    }

    protected function fundCampaign($senderAcc, $receiverAcc, $amount)
    {
        $rpc = new jsonRPCClient($this->url, true);
        $rpc->setRPCNotification(true);
        $response = $rpc->__call("transfer", [$senderAcc, $receiverAcc, $amount, "BTS", "", true]);
        $response = $response['result'];

        return $response;
    }

    protected function createBrainKey()
    {
        $rpc = new jsonRPCClient($this->url, true);
        $rpc->setRPCNotification(true);
        $response = $rpc->__call("suggest_brain_key", []);
        $response1 = $response['result'];

        return $response1['brain_priv_key'];
        /*$client = new \GuzzleHttp\Client([
            'headers' => [ 'Content-Type' => 'application/json',
                'Access-Control-Allow-Origin' => '*',
                'Access-Control-Allow-Methods' => 'POST, GET, PUT, DELETE, OPTIONS',
                'Access-Control-Allow-Credentials' => false,
                'Access-Control-Allow-Headers' => 'X-Requested-With, X-HTTP-Method-Override, Content-Type, Accept'],
        ]);

        $url = 'http://52.74.110.127:8092/rpc';
        $data = array(
            'method' => "suggest_brain_key",
            'id' => 1,
            'jsonrpc' => "2.0",
        );

        $response = $client->post($url,
            ['body' => json_encode(
                $data
            )]
        );
        $response = BaseJson::decode($response->getBody()->getContents(),true);
        return $response['result']['brain_priv_key'];*/
    }

    protected function createAccount($brain_priv_key, $accname)
    {
        $rpc = new jsonRPCClient($this->url, true);
        $rpc->setRPCNotification(true);
        $response = $rpc->__call("create_account_with_brain_key", [$brain_priv_key, $accname, "kiru", "kiru", true]);
        return $response;
    }

    protected function checkForWallet()
    {
        $wallet = Wallet::find()->where(['userId' => \Yii::$app->user->id])->one();
        if (!empty($wallet)) {
            return true;
        }

        return false;
    }

}
