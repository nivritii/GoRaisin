<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Campaign */
/* @var $form ActiveForm */
?>
<div class="campaign-content">
    <h3>Description</h3>
    <br /><br />

    <?= Html::img('@web/images/uploads/campaign/'.$model->c_image,['class' => 'attachment-blog-navi size-blog-navi wp-post-image'],['alt'=>'Image'],['align'=>'left'],['width'=>'80'],['height'=>'80']) ?>
    <br /><br />
    <p><?=$model->c_description_long?></p>
    <?php
    $video = \frontend\models\Campaign::find()
        ->where(['c_id' => 142])
        ->one();
    /*echo $video['c_video'];*/
    print_r($video['c_video']);
    ?>
</div>