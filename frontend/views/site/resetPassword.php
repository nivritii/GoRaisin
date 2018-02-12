<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ResetPasswordForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Reset password';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-reset-password">
    <div style="text-align: center;background-color: #f9f9f9">
    <h1 style="margin-top: 5%;font-size: 25px"><?= Html::encode($this->title) ?></h1>

    <p>Please input your new password:</p>

    <div class="row">
        <div class="col-lg-5" style="margin: auto">
            <p>
                New Password
            </p>
            <?php $form = ActiveForm::begin(['id' => 'reset-password-form']); ?>

                <?= $form->field($model, 'password')
                    ->passwordInput(['autofocus' => true,'style' => 'margin-left:41.5%'])
                    ->label(false)
                ?>

                <div class="form-group">
                    <?= Html::submitButton('Save', ['class' => 'btn btn-primary','style' => 'font-size:15px']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
    </div>
    <br />
    <br />
</div>
