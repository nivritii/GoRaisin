<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Campaign;
use frontend\models\CampaignSearch;
use frontend\models\Reward;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CampaignController implements the CRUD actions for Campaign model.
 */
class CampaignController extends Controller
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
     * Lists all Campaign models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CampaignSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Campaign model.
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
     * Creates a new Campaign model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Campaign();
        $reward = new Reward();

        if ($model->load(Yii::$app->request->post())) {
            $model-> c_author = Yii::$app->user->identity->getId();
            
           //$imageName = $model->c_title;
            $model->file = UploadedFile::getInstance($model,'file');
            $model->file->saveAs('uploads/campaign_img/'.$model->file->baseName.'.'.$model->file->extension);
            $model->c_image=$model->file->baseName.'.'.$model->file->extension;
            
//            $model->videoFile = UploadedFile::getInstance($model, 'videoFile');
//            $model->videoFile->saveAs('uploads/campaign_video/'.$model->videoFile->baseName.'.'.$model->videoFile->extension);
//            $model->c_video=$model->videoFile->baseName.'.'.$model->videoFile->extension;
                                  
            if($model->save(false)){              
                $reward->load(Yii::$app->request->post());
                $reward->c_id = $model->c_id;
                if ($reward->save(false)){
                return $this->redirect(['view', 'id' => $model->c_id]);
                }
            }
        }
        return $this->render('create', [
                'model' => $model,
                'reward' => $reward,
            ]);
    }

    /**
     * Updates an existing Campaign model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->c_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Campaign model.
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
     * Finds the Campaign model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Campaign the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Campaign::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
