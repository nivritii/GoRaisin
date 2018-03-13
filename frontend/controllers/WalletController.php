<?php

namespace frontend\controllers;

use frontend\models\Wallet;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\rpc\jsonRPCClient;

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
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
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
        $rpc = new jsonRPCClient('http://192.168.1.138:8092/rpc',true);

        if($_SERVER["REQUEST_METHOD"]=="POST"){
            $username=$_POST['username'];
            $rpc->setRPCNotification(true);
            $response=$rpc->__call("suggest_brain_key", []);
            $response1 = BaseJson::decode($response,true);

            return $this-> render('new',[
                'response' => $response1['result']['op']['id'],
            ]);
        }

        if($this->getWallet()){
            return $this->redirect(['mywallet']);
        }

        return $this->render('new');

    }

    public function actionMywallet()
    {
        return $this->render('mywallet');
    }

    protected function getWallet()
    {
        $wallet = Wallet::find()->where(['userId'=>\Yii::$app->user->id])->one();
        if(!empty($wallet)){
            return true;
        }

        return false;
    }

}
