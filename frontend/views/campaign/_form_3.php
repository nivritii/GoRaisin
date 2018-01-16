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

<div class="campaignReward-form">

    <div class="form-group">
    <!--<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>-->
      
    <?= $form->field($model, 'c_display_name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'c_email')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'c_location')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'c_biography')->textarea(['rows' => 6]); ?>
    <?= $form->field($model, 'c_social_profile')->textInput(['maxlength' => true]) ?>

    <?php ActiveForm::end(); ?>
    </div>
</div>
