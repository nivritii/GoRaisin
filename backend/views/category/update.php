<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Campaign;

/* @var $this yii\web\View */
/* @var $model backend\models\Category */

$this->title = 'Update Category';
$this->params['breadcrumbs'][] = ['label' => 'Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="category-update">

    <?php
    $campaigns = ArrayHelper::map(Campaign::find()
        ->select('c_title')
        ->where(['c_cat_id' => $model->id])
        ->from('campaign')
        ->all(), 'c_title', 'c_title');
    ?>

    <div style="text-align: center">
        <h2>Update Category</h2>
    </div>

   <!-- --><?/*= $this->render('_form', [
        'model' => $model,
    ]) */?>
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?/*= $form->field($model, 'class')->textInput(['maxlength' => true]) */?>

    <div>
        <p style="font-weight: 600">Featured Campaign</p>
        <?= $form->field($model, 'featured_campaign_id')
            ->dropDownList(ArrayHelper::map(Campaign::find()->all(), 'c_id', 'c_title'),
                ['prompt' => 'Select Car Name'])
            ->label(false)
        ?>
    </div>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
