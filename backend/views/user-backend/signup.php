<?php
/**
 * Created by PhpStorm.
 * User: cherry
 * Date: 30/10/2017
 * Time: 12:34 PM
 */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title='Create Administrator';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-signup">
    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
            <?= $form->field($model, 'username')->label('User Name')->textInput(['autofocus' => true]) ?>
            <?= $form->field($model, 'email')->label('Email Address') ?>
            <?/*= $form->field($model, 'mobile')->textInput()->hint('Please enter your name')->label('Email ') */?>
            <?/*= $form->field($model,'phone')*/?>
            <?= $form->field($model, 'password')->label('Password')->passwordInput() ?>
            <?= $form->field($model, 'confirmPass')->label('Confirm Password')->passwordInput() ?>
            <?/*= $form->field($model,'image')->label('Image')->textInput()*/?>

            <?php
/*            echo $form->field($model, 'file')->widget('user-backend\FileInput', [
            ]);
            */?>


            <div class="form-group">
                <?= Html::submitButton('Create', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>


