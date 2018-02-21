<?php

namespace frontend\controllers;

use common\models\LoginForm;
use frontend\models\Reward;
use frontend\models\Update;
use frontend\tests\unit\models\PasswordResetRequestFormTest;
use Yii;
use frontend\models\Campaign;
use frontend\models\Location;
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
use atans\actionlog\models\ActionLog;
use frontend\models\PasswordResetRequestForm;

ActionLog::error('Some error message');
ActionLog::info('Some info message');
ActionLog::warning('Some warning message');
ActionLog::success('Some success message');


$data = ['success' => true, 'message' => 'Successfully']; // optional
$category = 'application'; // optional
ActionLog::success('Some success message', $data, $category);

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
//                'actions' => [
//                    'delete' => ['POST'],
//                ],
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
                        'actions' => ['show','view','viewcompany','myintroduction'],
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
     * Submit Campaign for Review
     * @param $id
     * @throws NotFoundHttpException
     */
    public function actionReview($id)
    {
        $reviewCampaign = $this->findModel($id);
        $reviewCampaign->c_status='moderation';
        $reviewCampaign->save();
        return $this->redirect(['view', 'id' => $reviewCampaign->c_id]);
    }
    /**
     * View campaign company profile
     * @param $id
     * @throws NotFoundHttpException
     */
    public function actionViewcompany($id)
    {
        return $this->renderAjax('viewcompany',['model' => $this->findModel($id)]);
    }
    /**
     * Link to external website
     * @param $website
     * @throws NotFoundHttpException
     */
    public function actionLinkexternal($website)
    {
        return $this->redirect('http://'.$website);
    }
    /**
     * Create comment for a Campaign
     * @param $id
     * @return \yii\web\Response
     */
    public function actionComment($id)
    {
        $comment = new Comment();
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            $comment->comment_camp_id = $id;
            $comment->comment_user_id = Yii::$app->user->identity->getId();
            $comment->comment_content = $_POST['comment'];
            $comment->save(false);
            return $this->redirect(['view', 'id' => $id]);
        }
        return $this->redirect(['view', 'id' => $id]);
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
        $comments = Comment::find()->where(['comment_camp_id'=>$id])->orderBy(['comment_datetime'=>SORT_DESC])->all();
        $backed = Fund::find()->where(['fund_c_id'=>$id])->sum('fund_amt');
        if($backed!=0){
            $progress = ($backed/$this->findModel($id)->c_goal)*100;
        }else
            $progress=0;

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

      public function actionNew()
      {
          $newCampaign = new Campaign();
          $categories = Category::find()->all();
          $countries = Location::find()->all();

          if($_SERVER["REQUEST_METHOD"]=="POST"){
              $newCampaign->c_author= Yii::$app->user->identity->getId();
              $newCampaign->c_cat_id=$_POST['cCategory'];
              $newCampaign->c_description=$_POST['cDesc'];
              $newCampaign->c_location=$_POST['cLocation'];

              if($newCampaign->save(false)){
                  return $this->redirect(['create', 'id'=>$newCampaign->c_id]);
              }
          }

          return $this->render('new',[
              'categories' =>$categories,
              'countries' => $countries,
          ]);
      }

    /**
     * @param $id
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException
     */
    public function actionCreate($id)
    {
        $model = $this->findModel($id);
        $categories = Category::find()->where(['!=', 'id', $model->c_cat_id])->all();
        $reward = new Reward();

        if($_SERVER["REQUEST_METHOD"]=="POST"){
            $model->c_title=$_POST['cTitle'];
            $model->c_cat_id=$_POST['cCategory'];

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
                'model' => $model,
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

        return $this->render('update', [
            'model' => $model,
            'categories' => $categories,
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
     * Other people view introduction of campaign author
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionMyintroduction($id)
    {
        $model = $this->findModel($id);
        $authorId = $model->cAuthor->id;
        $campaigns = Campaign::find()->where(['c_author'=>$authorId])->all();

        $cIds = Fund::find()->select(['fund_c_id'])->where(['fund_user_id'=>$authorId])->distinct();
        $fundedCampaigns = Campaign::find()->where(['c_id'=>$cIds])->all();

        return $this->render('myintroduction',[
            'campaigns' => $campaigns,
            'cIds' => $cIds,
            'fundedCampaigns' => $fundedCampaigns,
            'model' => $this->findModel($id)
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
        $campaign = $this->findModel($id);
        $user = new LoginForm();
        $model="";

        if($_SERVER["REQUEST_METHOD"]=="POST"){
            $user->username=Yii::$app->user->getIdentity()->username;
            $user->password=$_POST['password'];
            if($user->login()){
                return $this->redirect(['mycampaign']);
            }else{
                $model="hidden";
                return $this->render('delete',[
                    'campaign' => $campaign,
                    'model' => $model,
                    ]);
            }
        }

        return $this->render('delete',[
           'campaign' => $campaign,
            'model' => $model,
        ]);
    }

    public function actionForgotpassword()
    {
        $emailUser = new PasswordResetRequestForm();
        $emailUser->email=Yii::$app->user->getIdentity()->email;

        if ($emailUser->sendEmail()) {
            Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
            return $this->goHome();
        } else {
            Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
        }
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