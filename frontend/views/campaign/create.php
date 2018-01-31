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
use kartik\file\FileInput;

HomePageAsset::register($this);
CampaignAsset::register($this);


/* @var $this yii\web\View */
/* @var $model frontend\models\Campaign */

$this->title = 'Create Campaign - GoRaisin';
$this->params['breadcrumbs'][] = ['label' => 'Campaigns', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

//$c_reward = new Reward();
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>

<div class="container">
    <div class="row form-group">
        <div class="col-xs-12">
            <ul class="nav nav-pills nav-justified thumbnail setup-panel" id="myNav">
                <li id="navStep1" class="li-nav active" step="#step-1">
                    <a>
                        <h4 class="list-group-item-heading">Basics</h4>
                        <p class="list-group-item-text">Introduce your project</p>
                    </a>
                </li>
                <li id="navStep2" class="li-nav disabled" step="#step-2">
                    <a>
                        <h4 class="list-group-item-heading">Rewards</h4>
                        <p class="list-group-item-text">Backers benefits</p>
                    </a>
                </li>
                <li id="navStep3" class="li-nav disabled" step="#step-3">
                    <a>
                        <h4 class="list-group-item-heading">The Story</h4>
                        <p class="list-group-item-text">More about your project</p>
                    </a>
                </li>
                <li id="navStep4" class="li-nav disabled" step="#step-4">
                    <a>
                        <h4 class="list-group-item-heading">Company</h4>
                        <p class="list-group-item-text">Share about your team</p>
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
                    <h1>Basics</h1>
                    <div class="container col-xs-12">
                        <div class="container">
                            <br />
                            <div class="form-group">
                                <div style="width: 100%;height: 80px">
                                    <div style="float: left;display: inline-block;width: 20%">
                                        <p class="item-title">Campaign Title</p>
                                    </div>
                                    <div style="display: inline-block;float: left;margin-left: 2%;width: 50%">
                                        <input type="text" style="width: 100%" name="cTitle">
                                    </div>
                                </div>

                                <!--     $list = CHtml::listData(Category::model()->findAll(array('order' => 'name')), 'id', 'name');-->
                                <div style="clear:both;height: 80px">
                                    <div style="float: left;display: inline-block;width: 20%">
                                        <p class="item-title">Category</p>
                                    </div>
                                    <?php $categories= Category::find()-> all();
                                    $listData = ArrayHelper::map($categories,'id','name');?>
                                    <div style="display: inline-block;float: left;margin-left: 2%;width: 50%">
                                        <select name="search_categories" id="search_categories" style="border-radius: 10px;width: 35%">
                                            <option value="">Select Category</option>
                                            <option value="3">Art</option>
                                            <option value="4">Manufacture</option>
                                            <option value="7">Music</option>
                                            <option value="8">Food</option>
                                            <option value="9">Computer</option>
                                            <option value="10">Clothes</option>
                                            <option value="11">Travel</option>
                                            <option value="12">Fashion</option>
                                            <option value="13">Science</option>
                                        </select>
                                    </div>
                                </div>

                                <div style="clear:both;height: 80px">
                                    <div style="float: left;display: inline-block;width: 20%">
                                        <p class="item-title">Campaign image</p>
                                    </div>
                                    <div style="float: left;display: inline-block;width: 50%;margin-left: 3%">
                                        <div class="file-upload">
                                            <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Add Image</button>

                                            <div class="image-upload-wrap">
                                                <input class="file-upload-input" type='file' onchange="readURL(this);" accept="image/*" name="cImage" />
                                                <div class="drag-text">
                                                    <h3>Drag and drop a file or select add Image</h3>
                                                </div>
                                            </div>
                                            <div class="file-upload-content">
                                                <img class="file-upload-image" src="#" alt="your image" />
                                                <div class="image-title-wrap">
                                                    <button type="button" onclick="removeUpload()" class="remove-image">Remove <span class="image-title">Uploaded Image</span></button>
                                                </div>
                                            </div>
                                        </div>
                                        <?php /*echo FileInput::widget([
                                            'name' => 'cImage',
                                        ]);*/?>
                                        <!--<input placeholder="Image" name="cImage">-->
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
                    <h1 class="text-center">Rewards</h1>

                    <!--<form>-->
                    <div class="container col-xs-12">
                        <br/>
                        <div class="row clearfix">
                            <div class="col-md-12 column">
                                <table class="table table-bordered table-hover" id="tab_logic">
                                    <thead>
                                    <tr >
                                        <th class="text-center">
                                            #
                                        </th>
                                        <th class="text-center">
                                            Title
                                        </th>
                                        <th class="text-center">
                                            Pledge Amount
                                        </th>
                                        <th class="text-center">
                                            Description
                                        </th>
                                        <th class="text-center">
                                            Limit
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr id='addr0'>
                                        <td>
                                            1
                                        </td>
                                        <td>
                                            <input type="text" name='rTitle[]'  id='rTitle' placeholder='Title' class="form-control"/>
                                        </td>
                                        <td>
                                            <input type="text" name='rAmt[]' placeholder='Pledge Amount' class="form-control"/>
                                        </td>
                                        <td>
                                            <input type="text" name='rDesc[]' placeholder='Description' class="form-control"/>
                                        </td>
                                        <td>
                                            <input type="text" name='rLimit[]' placeholder='Limit' class="form-control"/>
                                        </td>
                                    </tr>
                                    <tr id='addr1'></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <a id="add_row" class="btn btn-success pull-left">Add Reward</a><a id='delete_row' class="btn btn-danger pull-right">Remove Reward</a>
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
                    <h1 class="text-center">The Story</h1>

                    <!--<form>-->
                    <div class="container col-xs-12">
                        <div class="container">
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
                    <h1 class="text-center">Company</h1>

                    <!--<form>-->
                    <div class="container col-xs-12">
                        <br/>
                        <div class="campaignAboutYou-form">
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
                    <input class="btn btn-md btn-info" type="submit" value="Submit" id="submit">
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

    // Add , Delete row dynamically

    $(document).ready(function(){
        var i=1;

        $("#add_row").click(function(){
            i++;
            $('#addr'+(i-1)).html("<td>"+ (i) +"</td><td><input name='rTitle[]' id='rTitle' type='text' placeholder='Title' class='form-control input-md'  /> </td><td><input  name='rAmt[]' type='text' placeholder='Pledge Amount'  class='form-control input-md'></td><td><input  name='rDesc[]' type='text' placeholder='Description'  class='form-control input-md'></td><td><input  name='rLimit[]' type='text' placeholder='Limit'  class='form-control input-md'></td>");
            $('#tab_logic').append('<tr id="addr'+i+'"></tr>');
        });

        $("#delete_row").click(function(){
            if(i>1){
                $("#addr"+(i-1)).html('');
                i--;
            }
        });

        $("#submit").click(function(){
            $.ajax({
                method:"POST",
                data: $("#tab_logic").serialize(),
                success:function(data){
                    alert(data);
                    $("#tab_logic")[0].reset();
                }
            })
        });
    });

</script>