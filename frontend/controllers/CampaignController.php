<?php

namespace frontend\controllers;

use frontend\models\Update;
use Yii;
use frontend\models\Campaign;
use frontend\models\CampaignSearch;
use frontend\models\CampaignReward;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\models\Category;
use frontend\models\Comment;
use frontend\models\Fund;
use frontend\models\RewardItem;
use frontend\models\Model;
use yii\web\UploadedFile;
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
        $updates = Update::find()->where(['campaign_id'=>$id])->orderBy(['id' => SORT_DESC])->all();
        
        $comment = new Comment();
        $comments = Comment::find()->where(['comment_camp_id'=>$id])->orderBy(['comment_datetime'=>SORT_DESC])->all();
        
        if($comment->load(Yii::$app->request->post())){
            $comment->comment_camp_id = $id;
            $comment->comment_user_id = Yii::$app->user->identity->getId();
            
            if($comment->save(false)){
            $comments = Comment::find()->where(['comment_camp_id'=>$id])->orderBy(['comment_datetime'=>SORT_DESC])->all();
            return $this->render('view', [
            'model' => $this->findModel($id),
            'categories' => $categories,
            'comments' => $comments,
            'updates' => $updates,
            ]);
            }
        }
        return $this->render('view', [
            'model' => $this->findModel($id),
            'categories' => $categories,
            'comments' => $comments,
            'updates' => $updates,
        ]);
    }

    /**
     * Creates a new Campaign model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        /*$model = new Campaign();
        $c_reward = new CampaignReward();
        $rewardsItem = [new RewardItem()];
        $current_image = $model->c_image;

        if ($model->load(Yii::$app->request->post())) {
            $model-> c_author = Yii::$app->user->identity->getId();
            $imageName = $model->c_title;
            $model->file = UploadedFile::getInstance($model,'c_image');

            if(!empty($model->file) && $model->file->size !== 0){
                $model->file->saveAs('uploads/campaign/'.$imageName.'.'.$model->
                    file->extension);
                $model->c_image = 'uploads/campaign/'.$imageName.'.'.$model->file->extension;
            }else {
                $model->c_image = $current_image;
            }


                                  
            if($model->save(false)){
            $rewardsItem = Model::createMultiple(RewardItem::classname());
            Model::loadMultiple($rewardsItem, Yii::$app->request->post());
            
            $c_reward->campaign_id=$model->c_id;*/

            // validate all models
            /*$valid = $c_reward->validate();
            $valid = Model::validateMultiple($rewardsItem);
            
            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $c_reward->save(false)) {
                        foreach ($rewardsItem as $rewardItem) {
                            $rewardItem->campaign_reward_id = $c_reward->id;
                            if (! ($flag = $rewardItem->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $model->c_id]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
                
            }
        }
        return $this->render('create', [
                'model' => $model,
                'c_reward' => $c_reward,
                'rewardsItem' => (empty($rewardsItem)) ? [new RewardItem] : $rewardsItem,
            ]);*/

        $model = new Campaign();
        $current_image = $model->c_image;

        if ($model->load(Yii::$app->request->post())) {
            $model-> c_author = Yii::$app->user->identity->getId();
            $imageName = $model->c_title;
            $model->file = UploadedFile::getInstance($model,'c_image');

            if(!empty($model->file) && $model->file->size !== 0){
                $model->file->saveAs('uploads/campaign/image/'.$imageName.'.'.$model->
                    file->extension);
                $model->c_image = 'uploads/campaign/image/'.$imageName.'.'.$model->file->extension;
            }else {
                $model->c_image = $current_image;
            }

            $model->save();
            return $this->redirect('index');
        }

        return $this->render('create', [
            'model' => $model,
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
