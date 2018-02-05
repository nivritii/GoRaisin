<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\UserBackendSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-backend-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>


    <?= $form->field($model, 'username')
        ->label(false)
        ->textInput(['placeholder' => 'Username'])
    ?>

    <?/*= $form->field($model, 'auth_key') */?><!--

    --><?/*= $form->field($model, 'password_hash') */?>

    <?= $form->field($model, 'email')
        ->label(false)
        ->textInput(['placeholder' => 'Email'])
    ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary','style' => 'background-color: #7348b3; color: #ffffff;border:0']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default','type' => 'reset']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
