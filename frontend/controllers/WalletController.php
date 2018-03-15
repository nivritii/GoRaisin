<?php

namespace frontend\controllers;

use frontend\models\Wallet;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\rpc\jsonRPCClient;
use Yii;

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
                        'actions' => ['index','create','mywallet'],
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

    public $url = 'http://192.168.1.138:8092/rpc';


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

        if ($this->getWallet()) {
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
            $wallet->id = Yii::$app->user->getId();
            $wallet->save(false);

            $response = $this->createAccount($wallet->brainKey, $wallet->accname);
            return $this->render(['mywallet']);
        }
        return $this->redirect(['index']);
    }

    protected function createBrainKey()
    {
        $rpc = new jsonRPCClient('http://192.168.1.138:8092/rpc', true);
        $rpc->setRPCNotification(true);
        $response = $rpc->__call("suggest_brain_key", []);
        $response1 = $response['result'];

        return $response1['brain_priv_key'];
    }

    protected function createAccount($brain_priv_key, $accname)
    {
        $rpc = new jsonRPCClient('http://192.168.1.138:8092/rpc', true);
        $rpc->setRPCNotification(true);
        $response = $rpc->__call("suggest_brain_key", [$brain_priv_key, $accname, "kiru", "kiru", true]);
        return $response;
    }

    public function actionMywallet()
    {
        $this->getBalance();
        return $this->render('mywallet');
    }

    protected function getBalance()
    {
        $rpc = new jsonRPCClient('http://192.168.1.138:8092/rpc', true);
        $rpc->setRPCNotification(true);
        $response = $rpc->__call("list_account_balances", [$brain_priv_key, $accname, "kiru", "kiru", true]);
    }

    protected function getWallet()
    {
        $wallet = Wallet::find()->where(['userId' => \Yii::$app->user->id])->one();
        if (!empty($wallet)) {
            return true;
        }

        return false;
    }

}
