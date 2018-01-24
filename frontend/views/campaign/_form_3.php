<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use frontend\models\Campaign;
use frontend\models\Reward;

/* @var $this yii\web\View */
/* @var $model frontend\models\Campaign */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="campaignAboutYou-form">
    <h1 class="basic-title">About you</h1>

    <div class="form-group">
        <!--<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>-->
        <div style="width: 100%;height: 80px;margin-left: 10%;margin-right: 5%">
            <div style="float: left;display: inline-block;width: 20%">
                <p class="item-title">Display name</p>
            </div>
            <div style="float: left;display: inline-block;width: 50%;margin-left: 3%">
                <?= $form->field($model, 'c_display_name')
                    ->textInput(['maxlength' => true,'style' => 'width:500px'])
                    ->label(false)
                ?>
            </div>
        </div>

        <div style="width: 100%;height: 80px;margin-left: 10%;margin-right: 5%">
            <div style="float: left;display: inline-block;width: 20%">
                <p class="item-title">Email</p>
            </div>
            <div style="float: left;display: inline-block;width: 50%;margin-left: 3%">
                <?= $form->field($model, 'c_email')
                    ->textInput(['maxlength' => true,'style' => 'width:500px'])
                    ->label(false)
                ?>
            </div>
        </div>

        <div style="width: 100%;height: 80px;margin-left: 10%;margin-right: 5%">
            <div style="float: left;display: inline-block;width: 20%">
                <p class="item-title">Biography</p>
            </div>
            <div style="float: left;display: inline-block;width: 50%;margin-left: 3%">
                <?= $form->field($model, 'c_biography')
                    ->textarea(['rows' => 6,'style' => 'width:500px'])
                    ->label(false)
                ?>
            </div>
        </div>

        <div style="clear:both;height: 80px;margin-left: 10%;margin-right: 5%">
            <div style="float: left;display: inline-block;width: 20%">
                <p class="item-title">Your location</p>
            </div>
            <div style="float: left;display: inline-block;width: 50%;margin-left: 7%">
                <?= $form->field($model, 'c_location')
                    ->textInput(['maxlength' => true,'style' => 'width:500px'])
                    ->label(false)
                ?>
            </div>
        </div>

        <div style="clear:both;height: 80px;margin-left: 10%;margin-right: 5%">
            <div style="float: left;display: inline-block;width: 20%">
                <p class="item-title">Social profile</p>
            </div>
            <div style="float: left;display: inline-block;width: 50%;margin-left: 7%">
                <?= $form->field($model, 'c_social_profile')
                    ->textInput(['maxlength' => true,'style' => 'width:500px'])
                    ->label(false)
                ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
