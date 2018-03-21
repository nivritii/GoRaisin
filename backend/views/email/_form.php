<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
use backend\models\FrontendUser;
use yii\helpers\ArrayHelper;
use yii\db\Query;

/* @var $this yii\web\View */
/* @var $model backend\models\Email */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="email-form">
    <?php $receivers = ArrayHelper::map(FrontendUser::find()
        ->select('username')
        ->from('user')
        ->all(), 'username', 'username');
    ?>

    <?php $receiverAddrs = ArrayHelper::map(FrontendUser::find()
        ->select('email')
        ->from('user')
        ->all(), 'email', 'email');
    ?>

    <?php
    $str = '';
    $aa = array();
    $rows = (new \yii\db\Query())
        ->select(['email'])
        ->from('user')
        ->all();


    foreach ($rows as $key => $val)
    {
        $aa = $rows[$key]['email'];
        $str = "'" . $rows[$key]['email'] . "'" . ',' . $str;
        /*$str = $str . "," . $rows[$key]['email'];*/
    }
    $str2 = rtrim($str, ',');
    ?>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'receiver_name')->dropDownList($receivers) ?>

    <?= $form->field($model, 'receiver_address')->dropDownList($receiverAddrs) ?>

    <?= $form->field($model, 'subject')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?/*= $form->field($model, 'attachment')->fileInput(['maxlength' => true]) */?>

    <?= $form->field($model,'attachment')
        ->fileInput()
        ->widget(FileInput::className(),[
        ]);
    ?>

    <div class="form-group" style="text-align: center">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
