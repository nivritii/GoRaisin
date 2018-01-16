<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\FaqSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="faq-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?/*= $form->field($model, 'id') */?>

    <?= $form->field($model, 'question') ?>

    <?= $form->field($model, 'answer') ?>

    <?= $form->field($model, 'type') -> dropDownList(['basic'=>'basic','back'=>'back project','project'=>'start project'], ['prompt'=>'(select type)','style'=>'width:200px'])  ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
