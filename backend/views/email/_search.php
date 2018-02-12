<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\EmailSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="email-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>



    <?= $form->field($model, 'receiver_name')
        ->label(false)
        ->textInput(['placeholder' => 'Receiver Name'])
    ?>



    <?= $form->field($model, 'subject')
        ->label(false)
        ->textInput(['placeholder' => 'Email Subject'])
    ?>



    <?php // echo $form->field($model, 'attachment') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary','style' => 'background-color: #7348b3; color: #ffffff;border:0']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default','type' => 'reset']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
