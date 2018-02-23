<?php

namespace frontend\controllers;

use common\models\LoginForm;
use frontend\models\Faq;
use frontend\models\Reward;
use frontend\models\Update;
use frontend\tests\unit\models\PasswordResetRequestFormTest;
use Yii;
use frontend\models\Campaign;
use frontend\models\Location;
use frontend\models\CampaignSearch;
use frontend\models\Company;
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
use frontend\models\ResetPasswordForm;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii2mod\alert;

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
        $countries = Location::find()->where(['!=', 'id', $model->c_location])->all();
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
                'countries' => $countries,
            ]);
        }

    public function actionPreview($id)
    {
        $model = $this->findModel($id);
        $categories = Category::find()->where(['!=', 'id', $model->c_cat_id])->all();
        $countries = Location::find()->where(['!=', 'id', $model->c_location])->all();
        $reward = new Reward();
        $company = $this->findCompany($id);

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
            $model->c_location=$_POST['cLocation'];

            if ($model->save()){
                $company->campaign_id=$model->c_id;
                $company->company_name=$_POST['comName'];
                $company->company_email=$_POST['comEmail'];
                $company->company_website=$_POST['comWebsite'];
                $company->company_description=$_POST['comDesc'];
                $company->company_industry=$_POST['comIndustry'];
                $company->company_employees_count=$_POST['comEmp'];
                $company->company_postal=$_POST['comPostal'];
                $company->company_designation=$_POST['comPosition'];
                $company->save();

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
                return $this->render('preview', [
                    'model' => $this->findModel($id),
                    ]);
            }
        }

        return $this->render('create',[
            'model' => $model,
            'categories' =>$categories,
            'countries' => $countries,
        ]);
    }

        /**
         * Updates an existing Campaign model.
         * If update is successful, the browser will be redirected to the 'view' page.
         * @param integer $id
         * @return mixed
         * @throws NotFoundHttpException if the model cannot be found
         */
    public function actionEdit($id)
    {
        $model = $this->findModel($id);
        $categories = Category::find()->all();
        $reward = Reward::find()->where(['c_id'=>$id])->one();
        $company = $this->findCompany($id);
        $countries = Location::find()->all();

        if($reward != null){
            return $this->render('edit', [
                'model' => $model,
                'reward' => $reward,
                'categories' => $categories,
                'company' => $company,
                'countries' => $countries,
            ]);
        }
        return $this->render('edit', [
            'model' => $model,
            'categories' => $categories,
            'company' => $company,
            'countries' => $countries,
        ]);

    }

    public function actionPublished($id)
    {
        if($this->checkStatus($id)){

            $model = $this->findModel($id);
            $categories = Category::find()->all();
            $reward = Reward::find()->where(['c_id'=>$id])->one();
            $company = $this->findCompany($id);
            $countries = Location::find()->all();

            return $this->render('updatepublished',[
                'model' => $model,
                'reward' => $reward,
                'categories' => $categories,
                'company' => $company,
                'countries' => $countries,
            ]);
        }

        Yii::$app->session->setFlash('error', 'Your campaign has not been launched yet!');
        return $this->redirect('mycampaign');
    }
    
    public function actionShow($id)
    {        
        $model = Campaign::find()/*->where(['c_status' => 'publish'])*/->all();
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
        $draftedCampaigns = Campaign::find()->where(['c_status'=>'draft'])->all();
        $publishedCampaigns = Campaign::find()->where(['c_status'=>'published'])->all();

        $fund = Fund::find()->where(['fund_user_id'=>Yii::$app->user->getId()])->all();

        $cIds = Fund::find()->select(['fund_c_id'])->where(['fund_user_id'=>Yii::$app->user->getId()])->distinct();
        $fundedCampaigns = Campaign::find()->where(['c_id'=>$cIds])->all();

        return $this->render('mycampaign',[
            'campaigns' => $campaigns,
            'draftedCampaigns' => $draftedCampaigns,
            'publishedCampaigns' => $publishedCampaigns,
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
        $campaigns = Campaign::find()->where(['c_author'=>$authorId,'c_status'=>'publish'])->all();

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

        if($_SERVER["REQUEST_METHOD"]=="POST"){
            $user->username=Yii::$app->user->getIdentity()->username;
            $user->password=$_POST['password'];
            if($user->login()){
                /*$reward = Reward::find()->where(['c_id' => $campaign->c_id])->one();
                $reward->delete();
                $campaign->delete();
                return $this->redirect(['mycampaign']);*/

                if($this->countRewards($id)>0){
                    $this->deleteRewards($id);
                }
                if($this->countComments($id)>0){
                    $this->deleteComments($id);
                }
                if($this->countUpdates($id)>0){
                    $this->deleteUpdates($id);
                }
                if($this->countfaqs($id)>0){
                    $this->deletefaqs($id);
                }

                $this->deleteCompany($campaign->c_id);
                $this->findModel($id)->delete();

                Yii::$app->session->setFlash('success', 'You have deleted successfully your project!');
                return $this->redirect('mycampaign');
            }else{
                return $this->render('delete',[
                    'campaign' => $campaign,
                    ]);
            }
        }
        return $this->render('delete',[
           'campaign' => $campaign,
        ]);
    }

    public function actionForgotpassword()
    {
        $model = new PasswordResetRequestForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('forgotpassword', [
            'model' => $model,
        ]);



        /*$emailUser->email=Yii::$app->user->getIdentity()->email;

        if ($emailUser->sendEmail()) {
            Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
            return $this->goHome();
        } else {
            Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
        }*/
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
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

    protected function findReward($id)
    {
        if(($rewards = Reward::find()->where(['c_id'=>$id])->all()) !=null){
            return $rewards;
        }

        return new Reward();
    }

    protected function findCompany($id)
    {
        if (($company = Company::find()->where(['campaign_id'=>$id])->one()) !== null){
            return $company;
        }

        return new Company();
    }

    protected function checkStatus($id)
    {
        $campaign = Campaign::find()->where(['c_id'=>$id])->one();
        if($campaign->c_status=='published'){
            return true;
        }
        return false;
    }

    protected function countRewards($id)
    {
        $count = Reward::find()->where(['c_id'=>$id])->count();
        return $count;
    }

    protected function deleteRewards($id)
    {
        $rewards = Reward::find()->where(['c_id'=>$id])->all();
        foreach ($rewards as $reward){
            $reward->delete();
            return true;
        }
        return false;
    }

    protected function countComments($id)
    {
        $count = Comment::find()->where(['comment_camp_id'=>$id])->count();
        return $count;
    }

    protected function deleteComments($id)
    {
        $comments = Comment::find()->where(['comment_camp_id'=>$id])->all();
        foreach ($comments as $comment){
            $comment->delete();
            return true;
        }
        return false;
    }

    protected function countUpdates($id)
    {
        $count = Update::find()->where(['campaign_id'=>$id])->count();
        return $count;
    }

    protected function deleteUpdates($id)
    {
        $updates = Update::find()->where(['campaign_id'=>$id])->all();
        foreach ($updates as $update){
            $update->delete();
            return true;
        }
        return false;
    }

    protected function countfaqs($id)
    {
        $count = Faq::find()->where(['campaign_id'=>$id])->count();
        return $count;
    }

    protected function deleteFaqs($id)
    {
        $faqs = Update::find()->where(['campaign_id'=>$id])->all();
        foreach ($faqs as $faq){
            $faq->delete();
            return true;
        }
        return false;
    }
  
    protected function deleteCompany($id)
    {
        $company = Company::find()->where(['campaign_id'=>$id])->one();
        $company->delete();
    }
}