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
    <p style="font-weight: 600">Campaign Image</p>
    <?= Html::img(Yii::getAlias('@frontend') . "/web/images/uploads/campaign/".$model->c_image,['alt'=>'Image'],['align'=>'left'],['width'=>'400'],['height'=>'600']) ?>
    <?/*= $form->field($model, 'c_image')->textInput(['maxlength' => true,'readonly' => true,'style' => 'background-color:#ffffff']) */?>

    <?= $form->field($model, 'c_description')->textInput(['maxlength' => true,'readonly' => true,'style' => 'background-color:#ffffff']) ?>

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

    <?/*= $form->field($model, 'c_video')->textInput(['maxlength' => true,'readonly' => true,'style' => 'background-color:#ffffff']) */?>

    <?= $form->field($model, 'c_description_long')->textarea(['rows' => 10,'readonly' => true,'style' => 'background-color:#ffffff']) ?>

    <?= $form->field($model, 'c_author')->textInput(['readonly' => true,'style' => 'background-color:#ffffff']) ?>

    <?= $form->field($model, 'c_created_at')->textInput(['readonly' => true,'style' => 'background-color:#ffffff']) ?>

    <?= $form->field($model, 'c_location')->textInput(['maxlength' => true,'readonly' => true,'style' => 'background-color:#ffffff']) ?>

    <?= $form->field($model, 'c_status')->dropDownList(['draft' => 'draft','publish' => 'publish','moderation' => 'moderation']) ?>

    <?= $form->field($model, 'c_cat_id')->textInput(['readonly' => true,'style' => 'background-color:#ffffff']) ?>

    <?= $form->field($model, 'c_new_tag')->textInput(['readonly' => true,'style' => 'background-color:#ffffff']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
