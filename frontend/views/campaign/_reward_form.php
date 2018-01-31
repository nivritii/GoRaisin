<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Reward */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reward-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($reward, 'r_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($reward, 'r_pledge_amt')->textInput() ?>

    <?= $form->field($reward, 'r_description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($reward, 'r_delivery_date')->textInput() ?>

    <?= $form->field($reward, 'r_shipping_details')->textInput(['maxlength' => true]) ?>

    <?= $form->field($reward, 'r_limit_availability')->textInput() ?>
<!--    <div class="form-group">-->
<!--        --><?//= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
<!--    </div>-->
    <?php ActiveForm::end(); ?>

</div>
