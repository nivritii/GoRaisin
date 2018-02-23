<?php

use frontend\assets\HomePageAsset;
use frontend\assets\CampaignAsset;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use frontend\models\Category;
use kartik\date\DatePicker;
HomePageAsset::register($this);
CampaignAsset::register($this);

/* @var $this yii\web\View */
/* @var $model frontend\models\Campaign */

?>


<div class="container">
    <br/>
    <div class="row setup-content" id="step-1">
        <div class="container col-xs-6 col-sm-offset-3">
            <div class="alert alert-success hide"></div>
            <form action="delete?id=<?=$campaign->c_id?>" method="post" name="passwordForm">
                <div class="col-md-12 well text-left">
                    <h1 class="tabpage-title" style="margin-bottom: 20px;">Delete your project</h1>
                    <p class="text-left" style="font-size: large">Are you sure you want to delete your <span style="color: #0a6bbe;"><b><?=$campaign->c_title?></b></span> project?<br/><div>This action will immediately delete this project from the system and cannot be undone.</div></p>
                    <div style="margin-top: 20px; margin-bottom: 10px;">Enter your GoRaisin password for verification</div>
                    <div>
                        <input type="password" name="password" id="password"></div>
                    <input onclick="validate()" class="btn btn-md btn-danger" type="submit" value="Delete Project" style="border: 0;width: 35%">
                    <a style="margin-left: 20px; text-underline: #0a6bbe" href="<?=Url::to(['campaign/view','id' => $campaign->c_id])?>">No, keep the project</a>
                    <hr class="no_line" style="margin: 30px auto 30px;" />
                    <p class="text-left" style="font-size: medium;margin-bottom: 20px;"><b>Forgot your password</b></p>
                    <a href="<?=Url::to(['campaign/forgotpassword'])?>">
                        <input class="btn btn-md btn-info" value="Send email to reset password" style="border: 0;width: 45%; margin-bottom: 30px">
                    </a>
                </div>
            </form>
            <!-- </form> -->
        </div>
    </div>
</div>

<script>
    var password = document.passwordForm.password;
    var error_message = "";
    function validate() {
        if(password.value==""){
            password.focus();
            error_message="Please enter your password";
        }
        if(error_message){
            $('.alert-success').removeClass('hide').html(error_message);
            error_message='';
            return false;
        }else{
            error_message='';
            return true;
        }
        return false
    }
</script>