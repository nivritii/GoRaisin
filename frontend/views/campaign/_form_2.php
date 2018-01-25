<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use frontend\models\Campaign;

/* @var $this yii\web\View */
/* @var $model frontend\models\Campaign */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="campaignStory-form">
    <h1 class="basic-title">Story</h1>
    <br />
    <div class="form-group">
        <!--<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>-->

        <div style="width: 80%;height: 80px;margin-left: 10%;margin-right: 5%">
            <div style="float: left;display: inline-block;width: 20%">
                <p class="item-title">Campaign video</p>
            </div>
            <div style="float: left;display: inline-block;width: 50%;margin-left: 3%">
                <img src="<?php echo Yii::$app->request->baseUrl.'/uploads/campaign/default.jpg'?>" style="height: 400px;width: 600px"/>
                <?= $form->field($model, 'c_video')
                    ->fileInput(['style' => 'color:#d30000;width:400px'])
                    ->label(false)
                    ->hint('Upload a video from your computer! A campaign with a video has a great chance of success!')
                ?>
            </div>
        </div>

        <div style="clear:both;height: 80px;margin-left: 10%;margin-right: 5%">
            <div style="float: left;display: inline-block;width: 20%">
                <p class="item-title">Campaign Description</p>
            </div>
            <div style="float: left;display: inline-block;width: 50%;margin-left: 1.5%;">
                <?= $form->field($model, 'c_description_long')
                    ->textarea(['rows' => 20])
                    ->label(false)
                ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>
        <br />
    </div>
</div>
