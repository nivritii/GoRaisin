<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
frontend\assets\LoginAsset::register($this);

$this->title = 'Log in - GoRaisin';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <div id="login-div">
        <p class="form-title">Log in</p>
        <div class="row">
            <div style="margin-left: 3%;margin-top: 9%;margin-right: 3%;">
                <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, 'username')
                    ->textInput(['autofocus' => true,'style' => 'width:380px','placeholder' => 'Username'])
                    ->label(false)
                ?>

                <?= $form->field($model, 'password')
                    ->passwordInput(['style' => 'width:380px','placeholder' => 'Password'])
                    ->label(false)
                ?>

                <div style="color:#999;margin:1em 0">
                    <?= Html::a('Forgot your password?', ['site/request-password-reset'],['class' => 'forget-password']) ?>
                </div>

                <?= Html::submitButton('Log in', ['class' => 'login-button', 'name' => 'login-button']) ?>

                <?= $form->field($model, 'rememberMe')->checkbox() ?>
                <?php ActiveForm::end(); ?>

                <fieldset class="title">
                    <legend>Or</legend>
                </fieldset>
                <br />

                <?= Html::submitButton('<i class="fa fa-facebook-square fa-lg"></i>&nbsp&nbsp&nbsp&nbsp&nbsp&nbspLog in with Facebook', ['class' => 'login-facebook', 'name' => 'login-button']) ?>
                <p class="notice-facebook">We'll never post anything on Facebook without your permission.</p>

                <hr />
                <p class="signup-notice">New to GoRaisin?<?= Html::a('Sign up', ['site/signup'],['class' => 'signup-a']) ?></p>
            </div>
        </div>
    </div>
</div>
