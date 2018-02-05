<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\CategorySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id')
        ->label(false)
        ->textInput(['placeholder' => 'Category ID'])
    ?>

    <?= $form->field($model, 'name')
        ->label(false)
        ->textInput(['placeholder' => 'Category Name'])
    ?>

    <?/*= $form->field($model, 'class') */?><!--

    --><?/*= $form->field($model, 'featured_campaign_id') */?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary','style' => 'background-color: #7348b3; color: #ffffff;border:0']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default','type' => 'reset']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
