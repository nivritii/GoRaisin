<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Campaign */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="campaign-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'c_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'c_image')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'c_description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'c_start_date')->textInput() ?>

    <?= $form->field($model, 'c_end_date')->textInput() ?>

    <?= $form->field($model, 'c_goal')->textInput() ?>

    <?= $form->field($model, 'c_video')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'c_description_long')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'c_author')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'c_created_at')->textInput() ?>

    <?= $form->field($model, 'c_display_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'c_email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'c_location')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'c_biography')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'c_social_profile')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'c_status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'c_cat_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
