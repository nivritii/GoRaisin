<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\PasswordResetRequestForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Forgot your password?';
$this->params['breadcrumbs'][] = $this->title;
frontend\assets\LoginAsset::register($this);
?>
<div class="site-request-password-reset" style="margin-left: 10%">
    <div style="height: 50px">
        <p style="padding-left: 5%;padding-top:2.5%;font-size: 20px;font-weight: 600;color: #363636">Forgot your password?</p>
    </div>

    <div style="margin-left: 5%">
    <p style="padding-top: 2%;color: #404040;font-size: 15px">Please fill out your email. A link to reset password will be sent there.</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>

                <?= $form->field($model, 'email')
                    ->textInput(['autofocus' => true,'placeholder' => 'Email'])
                    ->label(false)
                ?>

                <div class="form-group">
                    <?= Html::submitButton('Continue', ['class' => 'continue-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
    </div>
</div>
