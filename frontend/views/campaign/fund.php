<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\Campaign;
use frontend\models\Reward;
use frontend\assets\HomePageAsset;

HomePageAsset::register($this);
/* @var $this yii\web\View */
/* @var $model frontend\models\Campaign */

$this->title = 'Create Campaign';
$this->params['breadcrumbs'][] = ['label' => 'Campaigns', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$model = new Campaign();
$reward = new Reward();

?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

<div class="container">
    <div class="col-xs-12">
        <div class="col-md-12 well text-center">
            <br/>
            <h1 class="text-center" >Fund the Project</h1>
            <br/>
            <!--<form>-->
            <form enctype="multipart/form-data" action="fund?id=<?=$c_id?>" method="post">
            <div class="container col-xs-12">
                <div class="campaignAboutYou-form">
                    <div class="form-group">
                        <?php foreach ($rewards as $reward){?>
                        <div class="card">
                            <div class="card-block">
                                <h4 class="card-title"><?=$reward->r_title?></h4>
                                <h6 class="card-subtitle mb-2 text-muted"><input type="radio" name="reward" value="<?=$reward->r_pledge_amt?>"><?=$reward->r_description?></h6>
                            </div>
                        </div>
                        <?php };?>
                        <br/>
                        <input class="btn btn-md btn-info" type="submit" value="Pledge" id="submit" style="color: #ffffff;background-color: #940094;border: 0;width: 10%">
                    </div>
                </div>
            </div>
            </form>
            <!--</form> -->
        </div>
    </div>
</div>

    