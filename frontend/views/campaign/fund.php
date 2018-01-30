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
            <div class="container col-xs-12">
                <div class="campaignAboutYou-form">
                    <div class="form-group">
                        <?php foreach ($rewards as $reward){?>
                        <div class="card">
                            <div class="card-block">
                                <h4 class="card-title"><?=$reward->r_title?></h4>
                                <h6 class="card-subtitle mb-2 text-muted"><input type="radio" name="optradio"><?=$reward->r_description?></h6>
                            </div>
                        </div>
                            <br/>
                        <?php };?>
                    </div>
                </div>
            </div>
            <!--</form> -->
        </div>
    </div>
</div>

    