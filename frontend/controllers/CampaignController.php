<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Campaign;
use frontend\models\CampaignSearch;
use frontend\models\Reward;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\models\Category;
use frontend\models\Comment;
use frontend\models\Fund;
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
            'access' => [
                'class' => 'yii\filters\AccessControl',
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ]

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
        $categories= Category::find()-> all();
        
        $comment = new Comment();
        $comments = Comment::find()->where(['comment_camp_id'=>$id])->all();
        
        if($comment->load(Yii::$app->request->post())){
            $comment->comment_camp_id = $id;
            $comment->comment_user_id = Yii::$app->user->identity->getId();
            
            if($comment->save(false)){
            $comments = Comment::find()->where(['comment_camp_id'=>$id])->all();
            return $this->render('view', [
            'model' => $this->findModel($id),
            'comments' => $comments,
            ]);
            }
        }
        return $this->render('view', [
            'model' => $this->findModel($id),
            'categories' => $categories,
            'comments' => $comments,
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
    
    public function actionShow($id)
    {        
        $model = Campaign::find()->all();
        $categories = Category::find()->all();
        
        if($id!='NULL'){
            
            $model = Campaign::find()->where(['c_cat_id'=>$id])->all();            
            return $this->render('show',[
            'model'=>$model,
            'categories'=>$categories,
            ]);
            
        }else{
            return $this->render('show',[
            'model'=>$model,
            'categories'=>$categories,
            ]);
        }
    }
    
    public function actionFund()
    {
        $fund = new Fund();
        return $this->render('fund',[
            'fund'=>$fund,
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
