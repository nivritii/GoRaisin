<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Sign up - GoRaisin';
$this->params['breadcrumbs'][] = $this->title;
frontend\assets\LoginAsset::register($this);
?>
<div class="site-signup">
    <div id="login-div">
        <p class="login-notice">Have an account?<?= Html::a('Log in', ['site/login'],['class' => 'signup-a']) ?></p>
        <hr />
        <p class="form-title">Sign up</p>
        <div class="row">
            <div style="margin-left: 3%;margin-top: 9%;margin-right: 3%;">
                <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'username')
                    ->textInput(['autofocus' => true,'style' => 'width:380px','placeholder' => 'Username'])
                    ->label(false)
                ?>

                <?= $form->field($model, 'email')
                    ->textInput(['style' => 'width:380px','placeholder' => 'Email'])
                    ->label(false)
                ?>

                <?= $form->field($model, 'password')
                    ->passwordInput(['style' => 'width:380px','placeholder' => 'Password'])
                    ->label(false)
                ?>

                <?= $form->field($model, 'repeat_password')
                    ->passwordInput(['style' => 'width:380px','placeholder' => 'Re-enter Password'])
                    ->label(false)
                ?>

                <?= Html::submitButton('Sign up', ['class' => 'login-button', 'name' => 'signup-button']) ?>

                <?php ActiveForm::end(); ?>
                <p class="notice-facebook">By signing up, you agree to our <?= Html::a('terms of use', ['site/index'],['class' => 'policy-a']) ?>,<?= Html::a('privacy policy', ['site/index'],['class' => 'policy-a']) ?>, and <?= Html::a('cookie policy', ['site/index'],['class' => 'policy-a']) ?>.</p>

                <fieldset class="title">
                    <legend>Or</legend>
                </fieldset>
                <br />

                <div style="text-align: center">
                <?= yii\authclient\widgets\AuthChoice::widget([
                    'baseAuthUrl' => ['site/auth'],
                ]) ?>
                </div>
                <p class="notice-facebook2">We'll never post anything on Facebook without your permission.</p>
            </div>
        </div>
    </div>
</div>
