<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Campaign */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="campaign-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'c_title')
        ->textInput(['maxlength' => true,'readonly' => true,'style' => 'background-color:#ffffff'])
    ?>

    <div>
        <p style="font-weight: 600">Campaign Image</p>
        <p><?php echo Yii::$app->urlManagerFrontend->baseUrl;?></p>
        <?= Html::img(Yii::$app->urlManagerFrontend->baseUrl."/images/uploads/campaign/".$model->c_image,['alt'=>'Image'],['align'=>'left'],['width'=>'400'],['height'=>'600']) ?>
    </div>

    <?= $form->field($model, 'c_description')->textInput(['rows' => 3,'maxlength' => true,'readonly' => true,'style' => 'background-color:#ffffff']) ?>

    <?= $form->field($model, 'c_start_date')->textInput(['readonly' => true,'style' => 'background-color:#ffffff']) ?>

    <?= $form->field($model, 'c_end_date')->textInput(['readonly' => true,'style' => 'background-color:#ffffff']) ?>

    <?= $form->field($model, 'c_goal')->textInput(['readonly' => true,'style' => 'background-color:#ffffff']) ?>

    <?php
    $video = "https://www.youtube.com/watch?v=".$model->c_video;
    preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $video, $matches);
    $id = $matches[1];
    $width = '800px';
    $height = '450px';
    ?>
    <p style="font-weight: 600">Campaign Video</p>
    <div style="text-align: center">
        <iframe id="ytplayer" type="text/html" width="<?php echo $width ?>" height="<?php echo $height ?>"
                src="https://www.youtube.com/embed/<?php echo $id ?>?rel=0&showinfo=0&color=white&iv_load_policy=3"
                frameborder="0" allowfullscreen></iframe>
    </div>

    <div>
        <p style="font-weight: 600">Camapign Description</p>
        <div style="background-color: #ffffff;border: 1px solid #dbdbdb;border-radius: 5px">
            <p><?=$model->c_description_long?></p>
        </div>
    </div>

    <div>
        <p style="font-weight: 600">Campaign Author</p>
        <div style="background-color: #ffffff;height: 2%;vertical-align: center;border: 1px solid #dbdbdb;">
            <p style="margin-left: 1%;margin-top: 0.5%"><?php echo $model->cAuthor->username ?></p>
        </div>
    </div>

    <?= $form->field($model, 'c_created_at')->textInput(['readonly' => true,'style' => 'background-color:#ffffff']) ?>

    <div>
        <p style="font-weight: 600">Location</p>
        <div style="background-color: #ffffff;height: 2%;vertical-align: center;border: 1px solid #dbdbdb;">
            <p style="margin-left: 1%;margin-top: 0.5%"><?php echo $model->cLocation->country ?></p>
        </div>
    </div>

    <?= $form->field($model, 'c_status')->dropDownList(['draft' => 'draft','publish' => 'publish','moderation' => 'moderation']) ?>

    <div>
        <p style="font-weight: 600">Category</p>
        <div style="background-color: #ffffff;height: 2%;vertical-align: center;border: 1px solid #dbdbdb">
            <p style="margin-left: 1%;margin-top: 0.5%"><?php echo $model->cCat->name ?></p>
        </div>
    </div>

    <?= $form->field($model, 'c_new_tag')->dropDownList(['0' => 'not new','1' => 'new campaign']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
