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
use yii\filters\AccessControl;
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
                        'actions' => ['show','view'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                ],
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
        $model = new Campaign();
        $categories= Category::find()-> all();
        $updates = Update::find()->where(['campaign_id'=>$id])->orderBy(['id' => SORT_DESC])->all();
        
        $comment = new Comment();
        $comments = Comment::find()->where(['comment_camp_id'=>$id])->orderBy(['comment_datetime'=>SORT_DESC])->all();

        $backed = Fund::find()->where(['fund_c_id'=>$id])->sum('fund_amt');
        $progress = ($backed/$this->findModel($id)->c_goal)*100;

        if (Yii::$app->request->post('moderation')) {
            $model -> c_status = "moderation";
        }

        if($comment->load(Yii::$app->request->post())){
            $comment->comment_camp_id = $id;
            $comment->comment_user_id = Yii::$app->user->identity->getId();
            
            if($comment->save(false)){
            $comments = Comment::find()->where(['comment_camp_id'=>$id])->orderBy(['comment_datetime'=>SORT_DESC])->all();
            return $this->render('view', [
                'model' => $this->findModel($id),
                'backed' => $backed,
                'progress' => $progress,
                'categories' => $categories,
                'comments' => $comments,
                'updates' => $updates,
            ]);
            }
        }
        return $this->render('view', [
            'model' => $this->findModel($id),
            'backed' => $backed,
            'progress' => $progress,
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
        $categories = Category::find()->all();
        $reward = new Reward();

        if($_SERVER["REQUEST_METHOD"]=="POST"){
            $model->c_title=$_POST['cTitle'];
            $model->c_cat_id=$_POST['cCategory'];
            $model->c_author= Yii::$app->user->identity->getId();

            if(isset($_FILES['cImage']['name']) && $_FILES['cImage']['size'] > 0){
                $uploaddir = '/web/images/uploads/campaign/';
                $dirpath = realpath(dirname(getcwd())).$uploaddir;
                $uploadfile = $dirpath . basename($_FILES['cImage']['name']);
                $model->c_image = basename($_FILES['cImage']['name']);
                move_uploaded_file($_FILES['cImage']['tmp_name'], $uploadfile);
            }else {
                $model->c_image = 'default.jpg';
            }

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

                $number = count($_POST['rTitle']);
                echo("<script>console.log('PHP: ".$number."');</script>");
                    for ($i=0; $i<$number; $i++){
                            $reward->c_id=$model->c_id;
                            $reward->r_title=$_POST['rTitle'][$i];
                        echo("<script>console.log('Get Reward hereN: ".$reward->r_title."');</script>");
                            $reward->r_pledge_amt=$number;
                            $reward->r_description=$_POST['rDesc'][$i];
                            $reward->r_limit_availability=$_POST['rLimit'][$i];
                            $reward->save(false);
                    }


                    return $this->redirect(['view', 'id'=>$model->c_id]);
                }
            }

            return $this->render('create',[
                'categories' =>$categories,
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
//        $backed = Fund::find()->where(['fund_c_id'=>$id])->sum('fund_amt');
//        $progress = ($backed/$this->findModel($id)->c_goal)*100;
        
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
//                'backed' =>$backed,
//                'progress' =>$progress,
                ]);
        }
    }
    
    public function actionFund($id)
    {
        $rewards = Reward::find()->where(['c_id'=>$id])->all();
        $fund = new Fund();

        if($_SERVER["REQUEST_METHOD"]=="POST"){
            $fund->fund_c_id=$id;
            $fund->fund_user_id=Yii::$app->user->identity->getId();
            $fund->fund_amt=$_POST['reward'];
            if ($fund->save(false)){
                return $this->redirect(['mycampaign']);
            }
        }

        return $this->render('fund',[
            'rewards'=>$rewards,
            'c_id'=>$id,
        ]);
    }

    public function actionMycampaign()
    {
        $campaigns = Campaign::find()->where(['c_author'=>Yii::$app->user->identity->getId()])->all();
        $fund = Fund::find()->where(['fund_user_id'=>Yii::$app->user->getId()])->all();

        $cIds = Fund::find()->select(['fund_c_id'])->where(['fund_user_id'=>Yii::$app->user->getId()])->distinct();
        $fundedCampaigns = Campaign::find()->where(['c_id'=>$cIds])->all();

        return $this->render('mycampaign',[
            'campaigns' => $campaigns,
            'activities' => $fund,
            'cIds' => $cIds,
            'fundedCampaigns' => $fundedCampaigns,
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
