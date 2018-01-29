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
    <br />
    <div class="form-group">
        <!-- <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>-->
        <div style="width: 100%;height: 80px;margin-left: 10%;margin-right: 5%">
            <div style="float: left;display: inline-block;width: 20%">
                <p class="item-title">Campaign video</p>
            </div>
            <div style="float: left;display: inline-block;width: 50%;margin-left: 3%">
                <?= $form->field($model, 'c_video')
                    ->textInput(['maxlength' => true,'style' => 'width:600px'])
                    ->label(false)
                ?>
            </div>
        </div>

        <div style="width: 100%;height: 80px;margin-left: 10%;margin-right: 5%">
            <div style="float: left;display: inline-block;width: 20%">
                <p class="item-title">Main description</p>
            </div>
            <div style="float: left;display: inline-block;width: 50%;margin-left: 3%">
                <?= $form->field($model, 'c_description_long')
                    ->textarea(['row' => 20,'style' => 'width:600px'])
                    ->label(false)
                ?>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
