<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Wallet;
use frontend\models\WalletSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\rpc\jsonRPCClient;

/**
 * WalletController implements the CRUD actions for Wallet model.
 */
class WalletController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function beforeAction($action)
    {
        $this->enableCsrfValidation = false;
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return parent::beforeAction($action);
    }

    public $url = 'http://192.168.1.138:8092/rpc';

    /**
     * Lists all Wallet models.
     * @return mixed
     */
    public function actionIndex()
    {
//        $searchModel = new WalletSearch();
//        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $rpc = new jsonRPCClient('http://192.168.1.138:8092/rpc',true);
        //$rpc->__construct("http://172.23.207.109:8092/rpc",true);

        if($_SERVER["REQUEST_METHOD"]=="POST"){
            $username=$_POST['username'];
            $rpc->setRPCNotification(true);
            $response=$rpc->__call("suggest_brain_key", []);
            $response = BaseJson::decode($response,true);

            return $this-> render('new',[
                'response' => $response,
            ]);

        }

        return $this->render('index', [
//            'searchModel' => $searchModel,
//            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionMywallet()
    {
        $rpc = new jsonRPCClient('http://192.168.1.138:8092/rpc',true);
        $rpc->setRPCNotification(true);
        $response=$rpc->__call("get_account_history", ["test1", 1000]);
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $response = ['description'];

        return $this->render('mywallet',[
           'response' => $response,
        ]);
    }

    /**
     * Displays a single Wallet model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Wallet model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Wallet();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Wallet model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Wallet model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Wallet model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Wallet the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Wallet::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
