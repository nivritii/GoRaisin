<?php

namespace frontend\controllers;

use frontend\models\Reward;
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

    public function beforeAction($action)
    {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
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
        $model = new Campaign();
        $reward = new Reward();

        if($_SERVER["REQUEST_METHOD"]=="POST"){
            $model->c_title=$_POST['cTitle'];
            $model->c_cat_id=7;
            $model->c_author= Yii::$app->user->identity->getId();
            $model->c_image=$_POST['cImage'];
            $model->c_description=$_POST['cDesc'];
            $model->c_start_date=$_POST['cStartdate'];
            $model->c_end_date=$_POST['cEnddate'];
            $model->c_goal=$_POST['cGoal'];
            $model->c_video=$_POST['cVideo'];
            $model->c_description_long=$_POST['cLDesc'];
            $model->c_display_name=$_POST['cName'];
            $model->c_email=$_POST['cEmail'];
            $model->c_biography=$_POST['cBio'];
            $model->c_location=$_POST['cLocation'];
            $model->c_social_profile=$_POST['cProfile'];

            if ($model->save()){
//                $reward->c_id=$model->c_id;
//                $reward->r_title=$_POST['rTitle'];
//                $reward->r_pledge_amt=$_POST['rPledgeAmt'];
//                $reward->r_description=$_POST['rDesc'];
//                $reward->r_delivery_date=$_POST['rDeliverydate'];
//                $reward->r_shipping_details=$_POST['rShipping'];
//                $reward->r_limit_availability=$_POST['rLimit'];
//                $reward->save();

                $number = count($_POST['rTitle0']);
                if($number>0){
                    for ($i=0; $i<$number; $i++){

                        $rTitle = 'rTitle'.$i;
                        $rAmt = 'rAmt'.$i;
                        $rDesc = 'rDesc'.$i;
                        $rLimit = 'rLimit'.$i;

                        if(trim($_POST[$rTitle])!=''){
                            $reward->c_id=$model->c_id;
                            $reward->r_title=$_POST[$rTitle];
                            $reward->r_pledge_amt=$_POST[$rAmt];
                            $reward->r_description=$_POST[$rDesc];
                            $reward->r_limit_availability=$_POST[$rLimit];
                            $reward->save();
                        }
                    }
                }

                    return $this->redirect(['view', 'id'=>$model->c_id]);
                }
            }

            return $this->render('create',[]);
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
