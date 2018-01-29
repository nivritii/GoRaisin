<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use frontend\models\Campaign;
use trntv\yii\datetime\DateTimeWidget;
use frontend\models\Category;
use yii\helpers\ArrayHelper;
use kartik\file\FileInput;
frontend\assets\CampaignAsset::register($this);

/* @var $this yii\web\View */
/* @var $model frontend\models\Campaign */
/* @var $form yii\widgets\ActiveForm */
$imagePath = '/'.$model->c_image;
?>
<!--<style>
    #preview{
        width:100%;
        border:1px solid#e5e5e5;
        height:420px;
    }
    #preview img{
        width:100%;
    }
</style>-->

<!--<script src="https://code.jquery.com/jquery-3.1.0.min.js"
        integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s="
        crossorigin="annonymous">
</script>
<script type="text/javascript">
    function readURL(input){
        if(input.files && input.files[0]){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#preview img').attr('src',e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    $(document).on('change','input[type="file"]',function(){
        readURL(this);
    })
</script>-->

<div class="container">
    <h1 class="basic-title">Basics</h1>
    <br />
    <div class="form-group">
        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
        <div style="width: 100%;height: 80px">
            <div style="float: left;display: inline-block;width: 20%">
                <p class="item-title">Campaign Title</p>
            </div>
            <div style="float: left;display: inline-block;width: 50%;margin-left: 3%">
                <?= $form->field($model, 'c_title')
                    ->textInput(['maxlength' => true,'style' => 'width:600px'])
                    ->label(false)
                ?>
            </div>
        </div>

        <!--     $list = CHtml::listData(Category::model()->findAll(array('order' => 'name')), 'id', 'name');-->
        <div style="clear:both;height: 80px">
            <div style="float: left;display: inline-block;width: 20%">
                <p class="item-title">Category</p>
            </div>
            <?php $categories= Category::find()-> all();
            $listData = ArrayHelper::map($categories,'id','name');?>
            <div style="float: left;display: inline-block;width: 50%;margin-left: 3%">
                <?= $form->field($model, 'c_cat_id')
                    ->dropDownList($listData, ['prompt' => 'Campaign category','style' => 'width:400px'])
                    ->label(false)
                ?>
            </div>
        </div>

        <div style="clear:both;height: 80px">
            <div style="float: left;display: inline-block;width: 20%">
                <p class="item-title">Campaign image</p>
            </div>
            <div style="float: left;display: inline-block;width: 50%;margin-left: 3%">
                <!--<img src="<?php /*echo Yii::$app->request->baseUrl.'/uploads/campaign/image/default.jpg'*/?>" style="height: 400px;width: 600px"/>-->
                <? echo $form->field($model, 'c_image')
                    ->label(false)
                    ->widget(FileInput::classname(), [
                        'options' => ['accept' => 'uploads/campaign/image'],
                    ]);?>
                <?/*= $form->field($model, 'c_image')
                    ->fileInput(['style' => 'color:#940094;width:400px'])
                    ->label(false)
                    ->hint('This is the main image of your campaign. This is the first thing people will see about your campaign.')
                */?>
            </div>
        </div>

        <div style="clear:both;height: 150px">
            <div style="float: left;display: inline-block;width: 20%">
                <p class="item-title">Short description</p>
            </div>
            <div style="float: left;display: inline-block;width: 50%;margin-left: 3%">
                <?= $form->field($model, 'c_description')
                    ->textarea(['rows' => 5])
                    ->label(false)
                    ->hint('Short description - introduce people on what you are doing')
                ?>
            </div>
        </div>

        <div style="clear:both;height: 80px">
            <div style="float: left;display: inline-block;width: 20%">
                <p class="item-title">Start date</p>
            </div>
            <div style="float: left;display: inline-block;width: 50%;margin-left: 3%">
                <?= $form->field($model, 'c_start_date')
                    ->textInput(['maxlength' => true])
                    ->label(false)
                ?>
            </div>
        </div>

        <div style="clear:both;height: 80px">
            <div style="float: left;display: inline-block;width: 20%">
                <p class="item-title">End date</p>
            </div>
            <div style="float: left;display: inline-block;width: 50%;margin-left: 3%">
                <?= $form->field($model, 'c_end_date')
                    ->textInput(['maxlength' => true])
                    ->label(false)
                ?>
            </div>
        </div>

        <!--   $form->field($model, 'c_start_date')->widget(
            'trntv\yii\datetime\DateTimeWidget',
            [
                'phpDatetimeFormat' => 'yyyy-MM-dd\'T\'HH:mm:ssZZZZZ',
                'clientOptions' => [
                    'minDate' => new \yii\web\JsExpression('new Date("2015-01-01")'),
                    'allowInputToggle' => false,
                    'sideBySide' => true,
                    'locale' => 'zh-cn',
                    'widgetPositioning' => [
                       'horizontal' => 'auto',
                       'vertical' => 'auto'
                    ]
                ]
            ]
            );

            $form->field($model, 'c_end_date')->widget(
                 DatePicker::className(), [
                // inline too, not bad
                 'inline' => false,
                 // modify template for custom rendering
                //'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
                'clientOptions' => [
                    'autoclose' => true,
                    'format' => 'dd-M-yyyy'
                ]
        ]);-->
        <div style="clear:both;height: 80px">
            <div style="float: left;display: inline-block;width: 20%">
                <p class="item-title">Fund cap</p>
            </div>
            <div style="float: left;display: inline-block;width: 50%;margin-left: 3%">
                <?= $form->field($model, 'c_goal')
                    ->textInput(['maxlength' => true,'style' => 'width:600px'])
                    ->label(false)
                ?>
            </div>
        </div>
        <?php ActiveForm::end(); ?>

    </div>
</div>

