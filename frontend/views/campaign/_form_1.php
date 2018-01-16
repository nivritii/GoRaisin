<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use frontend\models\Campaign;
use trntv\yii\datetime\DateTimeWidget;
use frontend\models\Category;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model frontend\models\Campaign */
/* @var $form yii\widgets\ActiveForm */
?>
<style>
    #preview{
        width:100%;
        border:1px solid#e5e5e5;
        height:420px;
    }
    #preview img{
        width:100%;
    }
</style>

<script src="https://code.jquery.com/jquery-3.1.0.min.js"
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
</script>


<div class="container">
<div class="text-left">
    <div class="form-group">
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'c_title')->textInput(['maxlength' => true]) ?>
     
<!--     $list = CHtml::listData(Category::model()->findAll(array('order' => 'name')), 'id', 'name');-->
           
    <?php $categories= Category::find()-> all();
        $listData = ArrayHelper::map($categories,'id','name');?>
    <?= $form->field($model, 'c_cat_id')->dropDownList($listData, ['prompt' => '---- Select campaign category ----']); ?>
      
    <div id="preview"><img src="" alt="Campaign Image" style="width:75%"/></div>
    <?= $form->field($model, 'file')->fileInput();  ?>
       
    <?= $form->field($model, 'c_description')->textarea(['rows' => 3]); ?>
    
    <?= $form->field($model, 'c_start_date')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'c_end_date')->textInput(['maxlength' => true]) ?>
    
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

    <?= $form->field($model, 'c_goal')->textInput() ?>
    <?php ActiveForm::end(); ?>
    
    </div>
</div>
</div>

