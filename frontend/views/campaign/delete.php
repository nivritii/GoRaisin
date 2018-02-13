<?php

use frontend\assets\HomePageAsset;
use frontend\assets\CampaignAsset;
use yii\helpers\Html;
use frontend\models\Category;
use kartik\date\DatePicker;
HomePageAsset::register($this);
CampaignAsset::register($this);

/* @var $this yii\web\View */
/* @var $model frontend\models\Campaign */

?>
<div class="container">
    <div class="row setup-content" id="step-1">
        <div class="col-xs-12">
            <div class="col-md-12 well text-center">
                <h1 class="tabpage-title">Delete your project</h1>
                <div class="container col-xs-12">
                    <div class="container">
                        <br/>
                        <div class="form-group">
                            <div style="width: 100%;height: 80px">
                                <div style="float: left;display: inline-block;width: 20%">
                                    <p class="item-title">Are you sure you want to delete your <?=$campaign->$c_title?> project? This action cannot be undone and will immediately delete this project from the system. </p>
                                </div>
                                <div style="display: inline-block;float: left;margin-left: 2%;width: 50%">
                                    <input type="text" style="width: 100%" name="cTitle" id="cTitle" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <input onclick="step1Next()" class="btn btn-md btn-info" value="Next" style="color: #ffffff;background-color: #940094;border: 0;width: 10%">
            <!-- </form> -->
            </div>
        </div>
    </div>
</div>