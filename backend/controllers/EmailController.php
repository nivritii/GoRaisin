<?php

namespace backend\controllers;

use backend\models\FrontendUser;
use Yii;
use backend\models\Email;
use backend\models\EmailSearch;
use yii\web\UploadedFile;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\db\Query;
use yii\db\Exception;

/**
 * EmailController implements the CRUD actions for Email model.
 */
class EmailController extends Controller
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

    /**
     * Lists all Email models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EmailSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Email model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Email model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $str = '';
        $aa = array();
        $rows = (new \yii\db\Query())
            ->select(['email'])
            ->from('user')
            ->all();


        foreach ($rows as $key => $val)
        {
            $aa = $rows[$key]['email'];
            //$str = "'" . $rows[$key]['email'] . "'" . ',' . $str;
            //$str = $str . "," . $rows[$key]['email'];
        }

        $model = new Email();

        if ($model->load(Yii::$app->request->post()))
        {
            //upload the attachment
            /*$model->attachment = UploadedFile::getInstance($model,'attachment');*/

            /*if($model->attachment)
            {
                $time = time();
                $model->attachment->saveAs('attachments/'.$time.'.'.$model->attachment->extension);
                $model->attachment='attachments/'.$time.'.'.$model->attachment->extension;
            }*/
            /*if($model->attachment)
            {
                $value = Yii::$app->mailer->compose()
                    ->setFrom([ array('cherrygu1209@gmail.com','cherrygu94@gamil.com') => 'GoRaisin'])
                    ->setTo($model->receiver_address)
                    ->setSubject($model->subject)
                    ->setHtmlBody($model->content)
                    ->attach($model->attachment)
                    ->send();
            }else{
                $value = Yii::$app->mailer->compose()
                    ->setFrom([ array('cherrygu1209@gmail.com,cherrygu94@gmail.com') => 'GoRaisin'])
                    ->setTo($model->receiver_address)
                    ->setSubject($model->subject)
                    ->setHtmlBody($model->content)
                    ->send();
            }*/

            $receiverAddr = ArrayHelper::map(FrontendUser::find()
                ->select('email')
                ->from('user')
                ->all(), 'email', 'email');
            foreach ($receiverAddr as $item){
                $arrayAddr = "'".$item."'".",";
            }

            $str = '';
            $aa = array();
            $rows = (new \yii\db\Query())
                ->select(['email'])
                ->from('user')
                ->all();


            foreach ($rows as $key => $val)
            {
                $aa = $rows[$key]['email'];
                $str = "'" . $rows[$key]['email'] . "'" . ',' . $str;
            }
            $str2 = rtrim($str, ',');
            echo $str2;


            $query = new Query;
            $query->select('email')
                ->from('user');
            $command = $query->createCommand();
            $enderecos = $command->queryAll();

            $value = Yii::$app->mailer->compose('mailTemplate')
                ->setFrom(['cherry@webpuppies.com.sg' => 'GoRaisin'])
                ->setTo($model->receiver_address)
                ->setSubject($model->subject)
                /*->setHtmlBody($model->content)*/
                ->send();
            $model->save();
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Email model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Email model.
     * If deletion is successful, the browser will be redirected to the 'header' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Email model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Email the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Email::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
