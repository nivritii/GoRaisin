<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Question */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Ask a question</h4>
    </div>

    <?php $form = ActiveForm::begin(); ?>
    <div class="modal-body">
        <?= $form->field($model, 'question')->textarea(['rows' => 12]) ?>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <?= Html::submitButton('Submit', ['class' => 'btn btn-success','style' => 'background-color:#8f13a5f0;border-radius:2px;']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
