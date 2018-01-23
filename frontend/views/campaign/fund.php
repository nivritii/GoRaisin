<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\Campaign;
use frontend\models\Reward;
use frontend\assets\HomePageAsset;

HomePageAsset::register($this);
/* @var $this yii\web\View */
/* @var $model frontend\models\Campaign */

$this->title = 'Create Campaign';
$this->params['breadcrumbs'][] = ['label' => 'Campaigns', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$model = new Campaign();
$reward = new Reward();

?>
<div class="container">
    <div class="text-center">
        <div class="form-group">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($fund, 'fund_c_id')->textInput() ?>

    <?= $form->field($fund, 'fund_user_id')->textInput() ?>

    <?= $form->field($fund, 'fund_amt')->textInput() ?>

    <?= $form->field($fund, 'fund_note')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($fund->isNewRecord ? 'Create' : 'Update', ['class' => $fund->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>

    