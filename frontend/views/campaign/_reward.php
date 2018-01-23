<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use wbraganca\dynamicform\DynamicFormWidget;

/* @var $this yii\web\View */
/* @var $model frontend\models\Reward */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="reward-form">
    
<?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>
    
    <div class="row">
<!--         <div class="panel panel-default">-->
<!--        <div class="panel-heading"><h4><i class="glyphicon glyphicon-envelope"></i>Rewards</h4></div>-->
        <div class="panel-body">
             <?php DynamicFormWidget::begin([
                'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                'widgetBody' => '.container-items', // required: css class selector
                'widgetItem' => '.item', // required: css class
                'limit' => 4, // the maximum times, an element can be cloned (default 999)
                'min' => 1, // 0 or 1 (default 1)
                'insertButton' => '.add-item', // css class
                'deleteButton' => '.remove-item', // css class
                'model' => $rewardsItem[0],
                'formId' => 'dynamic-form',
                'formFields' => [
                    'r_title',
                    'r_pledge_amt',
                    'r_description',
                    'r_delivery_date',
                    'r_shipping_details',
                    'r_limit_availability'
                ],
            ]); ?>

            <div class="container-items"><!-- widgetContainer -->
            <?php foreach ($rewardsItem as $i => $rewardItem): ?>
                <div class="item panel panel-default">
                    <!-- widgetBody -->
                    <div class="panel-heading">
                        <h3 class="panel-title pull-left">Rewards</h3>
                        <div class="pull-right">
                            <button type="button" class="add-item btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></button>
                            <button type="button" class="remove-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        <?php
                            // necessary for update action.
                            if (! $rewardItem->isNewRecord) {
                                echo Html::activeHiddenInput($rewardItem, "[{$i}]id");
                            }
                        ?>
                        <div class="row">
                            <div class="col-sm-6">
                                <?= $form->field($rewardItem, "[{$i}]r_title")->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-sm-6">
                                <?= $form->field($rewardItem, "[{$i}]r_pledge_amt")->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-sm-6">
                                <?= $form->field($rewardItem, "[{$i}]r_description")->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-sm-6">
                                <?= $form->field($rewardItem, "[{$i}]r_delivery_date")->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-sm-6">
                                <?= $form->field($rewardItem, "[{$i}]r_shipping_details")->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-sm-6">
                                <?= $form->field($rewardItem, "[{$i}]r_limit_availability")->textInput(['maxlength' => true]) ?>
                            </div>
                        </div><!-- .row -->
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
            <?php DynamicFormWidget::end(); ?>
        </div>
<!--    </div>-->
</div>
