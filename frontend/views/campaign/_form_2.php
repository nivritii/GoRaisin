<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use frontend\models\Campaign;
use trntv\yii\datetime\DateTimeWidget;
frontend\assets\CampaignAsset::register($this);

/* @var $this yii\web\View */
/* @var $model frontend\models\Campaign */
/* @var $form yii\widgets\ActiveForm */
$imagePath = '/'.$model->c_image;
?>

<div class="container">
    <h1 class="basic-title">Story</h1>
    <br />
    <div class="form-group">
        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

        <div style="clear:both;height: 80px">
            <div style="float: left;display: inline-block;width: 20%">
                <p class="item-title">Campaign video</p>
            </div>
            <div style="float: left;display: inline-block;width: 50%;margin-left: 3%">
                <img src="<?php echo Yii::$app->request->baseUrl.'/uploads/campaign/video/default.jpg'?>" style="height: 400px;width: 600px"/>
                <?= $form->field($model, 'c_video')
                    ->fileInput(['style' => 'color:#940094;width:400px'])
                    ->label(false)
                ?>
            </div>
        </div>

        <div style="clear:both;height: 150px">
            <div style="float: left;display: inline-block;width: 20%">
                <p class="item-title">Main Description</p>
            </div>
            <div style="float: left;display: inline-block;width: 50%;margin-left: 3%">
                <?= $form->field($model, 'c_description_long')
                    ->textarea(['rows' => 20])
                    ->label(false)
                ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>

