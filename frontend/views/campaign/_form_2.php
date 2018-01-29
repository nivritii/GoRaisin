<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use frontend\models\Campaign;
use trntv\yii\datetime\DateTimeWidget;
use kartik\file\FileInput;
use yii\helpers\Url;
frontend\assets\CampaignAsset::register($this);

/* @var $this yii\web\View */
/* @var $model frontend\models\Campaign */
/* @var $form yii\widgets\ActiveForm */
$imagePath = '/'.$model->c_image;
?>

<div class="container">
    <h1 class="basic-title">Story</h1>
    <br />
    <div class="form-group">
        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

        <div style="clear:both;height: 80px">
            <div style="float: left;display: inline-block;width: 20%">
                <p class="item-title">Campaign video</p>
            </div>
            <div style="float: left;display: inline-block;width: 50%;margin-left: 3%">
                <?php echo $model->c_video ?>
                <?= $form->field($model, 'c_video')
                    ->textInput(['style' => 'color:#940094;width:600px'])
                    ->hint('Please upload your video to YouTube then put the link of campaign video here.')
                    ->label(false)
                ?>
            </div>
        </div>

        <div style="clear:both;height: 150px">
            <div style="float: left;display: inline-block;width: 20%">
                <p class="item-title">Main Description</p>
            </div>
            <div style="float: left;display: inline-block;width: 50%;margin-left: 3%">
                <?= $form->field($model, 'c_description_long')
                    ->textarea(['rows' => 20])
                    ->label(false)
                ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>

