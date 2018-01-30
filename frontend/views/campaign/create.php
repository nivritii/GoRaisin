<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\Campaign;
use frontend\models\CampaignReward;
use frontend\models\RewardItem;
use frontend\assets\HomePageAsset;
use frontend\assets\CampaignAsset;
use yii\helpers\Url;
use frontend\models\Reward;
use frontend\models\Category;
use yii\helpers\ArrayHelper;

HomePageAsset::register($this);
CampaignAsset::register($this);


/* @var $this yii\web\View */
/* @var $model frontend\models\Campaign */

$this->title = 'Create Campaign - GoRaisin';
$this->params['breadcrumbs'][] = ['label' => 'Campaigns', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

//$c_reward = new Reward();
?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<div class="container">
    <div class="row form-group">
        <div class="col-xs-12">
            <ul class="nav nav-pills nav-justified thumbnail setup-panel" id="myNav">
                <li id="navStep1" class="li-nav active" step="#step-1">
                    <a>
                        <h4 class="list-group-item-heading">Step 1</h4>
                        <p class="list-group-item-text">First step description</p>
                    </a>
                </li>
                <li id="navStep2" class="li-nav disabled" step="#step-2">
                    <a>
                        <h4 class="list-group-item-heading">Step 2</h4>
                        <p class="list-group-item-text">Second step description</p>
                    </a>
                </li>
                <li id="navStep3" class="li-nav disabled" step="#step-3">
                    <a>
                        <h4 class="list-group-item-heading">Step 3</h4>
                        <p class="list-group-item-text">Third step description</p>
                    </a>
                </li>
                <li id="navStep4" class="li-nav disabled" step="#step-4">
                    <a>
                        <h4 class="list-group-item-heading">Step 4</h4>
                        <p class="list-group-item-text">Second step description</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>

<form class="createCampaign" enctype="multipart/form-data" action="create" method="post">
<div class="container">
    <div class="row setup-content" id="step-1">
        <div class="col-xs-12">
            <div class="col-md-12 well text-center">
                <h1> STEP 1</h1>
                <div class="container col-xs-12">
                    <div class="container">
                        <h1 class="basic-title">Basics</h1>
                        <br />
                        <div class="form-group">
                            <div style="width: 100%;height: 80px">
                                <div style="float: left;display: inline-block;width: 20%">
                                    <p class="item-title">Campaign Title</p>
                                </div>
                                <div style="float: left;display: inline-block;width: 50%;margin-left: 3%">
                                    <p><input placeholder="Campaign Title" name="cTitle"></p>
                                </div>
                            </div>

                            <!--     $list = CHtml::listData(Category::model()->findAll(array('order' => 'name')), 'id', 'name');-->
                            <div style="clear:both;height: 80px">
                                <div style="float: left;display: inline-block;width: 20%">
                                    <p class="item-title">Category</p>
                                </div>
                                <?php $categories= Category::find()-> all();
                                $listData = ArrayHelper::map($categories,'id','name');?>
                                <div style="float: left;display: inline-block;width: 50%;margin-left: 3%">
                                    <p><input placeholder="Campaign Category" name="cCategory"></p>
                                </div>
                            </div>

                            <div style="clear:both;height: 80px">
                                <div style="float: left;display: inline-block;width: 20%">
                                    <p class="item-title">Campaign image</p>
                                    <p><input placeholder="Image" name="cImage"></p>
                                </div>
                                <div style="float: left;display: inline-block;width: 50%;margin-left: 3%">
                                    <img src="<?php echo Yii::$app->request->baseUrl.'/uploads/campaign/default.jpg'?>" style="height: 400px;width: 600px"/>

                                </div>
                            </div>

                            <div style="clear:both;height: 150px">
                                <div style="float: left;display: inline-block;width: 20%">
                                    <p class="item-title">Short description</p>
                                </div>
                                <div style="float: left;display: inline-block;width: 50%;margin-left: 3%">
                                    <p><input placeholder="Description" name="cDesc"></p>
                                </div>
                            </div>

                            <div style="clear:both;height: 80px">
                                <div style="float: left;display: inline-block;width: 20%">
                                    <p class="item-title">Start date</p>
                                </div>
                                <div style="float: left;display: inline-block;width: 50%;margin-left: 3%">
                                    <p><input placeholder="Startdate" name="cStartdate"></p>
                                </div>
                            </div>

                            <div style="clear:both;height: 80px">
                                <div style="float: left;display: inline-block;width: 20%">
                                    <p class="item-title">End date</p>
                                </div>
                                <div style="float: left;display: inline-block;width: 50%;margin-left: 3%">
                                    <p><input placeholder="Enddate" name="cEnddate"></p>
                                </div>
                            </div>

                            <div style="clear:both;height: 80px">
                                <div style="float: left;display: inline-block;width: 20%">
                                    <p class="item-title">Fund cap</p>
                                </div>
                                <div style="float: left;display: inline-block;width: 50%;margin-left: 3%">
                                    <p><input placeholder="goal" name="cGoal"></p>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <input onclick="step1Next()" class="btn btn-md btn-info" value="Next">

                <!-- </form> -->
            </div>
        </div>
    </div>
</div>
<div class="container">
        <div class="row setup-content" id="step-2">
            <div class="col-xs-12">
                <div class="col-md-12 well text-center">
                    <h1 class="text-center"> STEP 2</h1>

                    <!--<form>-->
                    <div class="container col-xs-12">
                        <div class="container">
                            <h1 class="basic-title">Rewards</h1>
                            <br />
                            <div class="form-group">
                                <div style="width: 100%;height: 80px">
                                    <div style="float: left;display: inline-block;width: 20%">
                                        <p class="item-title">Reward Title</p>
                                    </div>
                                    <div style="float: left;display: inline-block;width: 50%;margin-left: 3%">
                                        <p><input placeholder="Reward Title" name="rTitle"></p>
                                    </div>
                                </div>
                                <div style="width: 100%;height: 80px">
                                    <div style="float: left;display: inline-block;width: 20%">
                                        <p class="item-title">Reward Pledge Amount</p>
                                    </div>
                                    <div style="float: left;display: inline-block;width: 50%;margin-left: 3%">
                                        <p><input placeholder="Reward Pledge Amount" name="rPledgeAmt"></p>
                                    </div>
                                </div>

                                <div style="clear:both;height: 150px">
                                    <div style="float: left;display: inline-block;width: 20%">
                                        <p class="item-title">Reward description</p>
                                    </div>
                                    <div style="float: left;display: inline-block;width: 50%;margin-left: 3%">
                                        <p><input placeholder="Reward Description" name="rDesc"></p>
                                    </div>
                                </div>

                                <div style="clear:both;height: 80px">
                                    <div style="float: left;display: inline-block;width: 20%">
                                        <p class="item-title">Reward Delivery Date</p>
                                    </div>
                                    <div style="float: left;display: inline-block;width: 50%;margin-left: 3%">
                                        <p><input placeholder="Reward Delivery Date" name="rDeliverydate"></p>
                                    </div>
                                </div>

                                <div style="clear:both;height: 80px">
                                    <div style="float: left;display: inline-block;width: 20%">
                                        <p class="item-title">Reward Shipping Details</p>
                                    </div>
                                    <div style="float: left;display: inline-block;width: 50%;margin-left: 3%">
                                        <p><input placeholder="Reward Shipping Details" name="rShipping"></p>
                                    </div>
                                </div>

                                <div style="clear:both;height: 80px">
                                    <div style="float: left;display: inline-block;width: 20%">
                                        <p class="item-title">Reward Limit Availability</p>
                                    </div>
                                    <div style="float: left;display: inline-block;width: 50%;margin-left: 3%">
                                        <p><input placeholder="Reward Limit Availability" name="rLimit"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--</form> -->

                    <input onclick="prevStep()" class="btn btn-md btn-info" value="Prev">
                    <input onclick="step2Next()" class="btn btn-md btn-info" value="Next">

                </div>
            </div>
        </div>
</div>
<div class="container">
    <div class="row setup-content" id="step-3">
        <div class="col-xs-12">
            <div class="col-md-12 well text-center">
                <h1 class="text-center"> STEP 3</h1>

                <!--<form>-->
                <div class="container col-xs-12">
                    <div class="container">
                        <h1 class="basic-title">Story</h1>
                        <br />
                        <div class="form-group">
                            <div style="clear:both;height: 80px">
                                <div style="float: left;display: inline-block;width: 20%">
                                    <p class="item-title">Campaign video</p>
                                </div>
                                <div style="float: left;display: inline-block;width: 50%;margin-left: 3%">
                                    <img src="<?php echo Yii::$app->request->baseUrl.'/uploads/campaign/default.jpg'?>" style="height: 400px;width: 600px"/>
                                    <p><input placeholder="Video" name="cVideo"></p>
                                </div>
                            </div>

                            <div style="clear:both;height: 150px">
                                <div style="float: left;display: inline-block;width: 20%">
                                    <p class="item-title">Main Description</p>
                                </div>
                                <div style="float: left;display: inline-block;width: 50%;margin-left: 3%">
                                    <p><input placeholder="Long Description" name="cLDesc"></p>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <!--</form> -->

                <input onclick="prevStep()" class="btn btn-md btn-info" value="Prev">
                <input onclick="step3Next()" class="btn btn-md btn-info" value="Next">

            </div>
        </div>
    </div>
</div>
<div class="container">

    <div class="row setup-content" id="step-4">
        <div class="col-xs-12">
            <div class="col-md-12 well text-center">
                <h1 class="text-center"> STEP 4</h1>

                <!--<form>-->
                <div class="container col-xs-12">
                    <div class="campaignAboutYou-form">
                        <h1 class="basic-title">About you</h1>
                        <br />
                        <div class="form-group">
                            <div style="width: 100%;height: 80px;margin-left: 10%;margin-right: 5%">
                                <div style="float: left;display: inline-block;width: 20%">
                                    <p class="item-title">Display name</p>
                                </div>
                                <div style="float: left;display: inline-block;width: 50%;margin-left: 3%">
                                    <p><input placeholder="Name" name="cName"></p>
                                </div>
                            </div>

                            <div style="width: 100%;height: 80px;margin-left: 10%;margin-right: 5%">
                                <div style="float: left;display: inline-block;width: 20%">
                                    <p class="item-title">Email</p>
                                </div>
                                <div style="float: left;display: inline-block;width: 50%;margin-left: 3%">
                                    <p><input placeholder="Email" name="cEmail"></p>
                                </div>
                            </div>

                            <div style="width: 100%;height: 80px;margin-left: 10%;margin-right: 5%">
                                <div style="float: left;display: inline-block;width: 20%">
                                    <p class="item-title">Biography</p>
                                </div>
                                <div style="float: left;display: inline-block;width: 50%;margin-left: 3%">
                                    <p><input placeholder="Biography" name="cBio"></p>
                                </div>
                            </div>

                            <div style="clear:both;height: 80px;margin-left: 10%;margin-right: 5%;margin-top: 7%">
                                <div style="float: left;display: inline-block;width: 20%">
                                    <p class="item-title">Your location</p>
                                </div>
                                <div style="float: left;display: inline-block;width: 50%;margin-left: 7%">
                                    <p><input placeholder="Location" name="cLocation"></p>
                                </div>
                            </div>

                            <div style="clear:both;height: 80px;margin-left: 10%;margin-right: 5%">
                                <div style="float: left;display: inline-block;width: 20%">
                                    <p class="item-title">Social profile</p>
                                </div>
                                <div style="float: left;display: inline-block;width: 50%;margin-left: 7%">
                                    <p><input placeholder="Profile" name="cProfile"></p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!--</form> -->
                <input onclick="prevStep()" class="btn btn-md btn-info" value="Prev">
                <input class="btn btn-md btn-info" type="submit">
                <div class="form-group">
                </div>
            </div>
        </div>
    </div>
</div>
</form>

<script>
    var currentStep = 1;

    $(document).ready(function () {

        $('.li-nav').click(function () {

            var $targetStep = $($(this).attr('step'));
            currentStep = parseInt($(this).attr('id').substr(7));

            if (!$(this).hasClass('disabled')) {
                $('.li-nav.active').removeClass('active');
                $(this).addClass('active');
                $('.setup-content').hide();
                $targetStep.show();
            }
        });

        $('#navStep1').click();

    });



    function step1Next() {
        //You can make only one function for next, and inside you can check the current step
        if (true) {//Insert here your validation of the first step
            currentStep += 1;
            $('#navStep' + currentStep).removeClass('disabled');
            $('#navStep' + currentStep).click();
        }
    }

    function prevStep() {
        //Notice that the btn prev not exist in the first step
        currentStep -= 1;
        $('#navStep' + currentStep).click();
    }

    function step2Next() {
        if (true) {
            $('#navStep3').removeClass('disabled');
            $('#navStep3').click();
        }
    }

    function step3Next() {
        if (true) {
            $('#navStep4').removeClass('disabled');
            $('#navStep4').click();
        }
    }

</script>