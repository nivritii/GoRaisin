<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\SupportSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="support-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?/*= $form->field($model, 'id') */?>

    <?= $form->field($model, 'email') ?>

    <?= $form->field($model, 'type')->dropDownList(['basic'=>'basic questions','back'=>'back project','project'=>'start project'], ['prompt'=>'(select type)','style'=>'font-size:15px']) ?>

    <?= $form->field($model, 'content') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
