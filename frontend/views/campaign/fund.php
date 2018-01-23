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

<body class="archive category layout-full-width nice-scroll-on mobile-tb-left button-flat header-classic minimalist-header sticky-header sticky-white ab-hide subheader-both-left menu-line-below-80-1 menuo-right menuo-no-borders footer-copy-center">
    <!-- Main Theme Wrapper -->
    <div id="Wrapper">
        <!-- Header Wrapper -->
        <!-- Main Content -->
<!--        <div id="Content">-->
            <div class="content_wrapper clearfix">
                <div class="sections_group">
                    <div class="section">
                        <div class="section_wrapper clearfix">
                            <div class="fund-form">
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


</div>
                        </div>
                    </div>
                </div>
            </div>
<!--        </div>-->
    </div>
    