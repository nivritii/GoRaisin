<?php
/**
 * Created by PhpStorm.
 * User: cherry
 * Date: 25/01/2018
 * Time: 2:07 PM
 */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use frontend\models\Campaign;
use frontend\models\Category;
frontend\assets\TabAsset::register($this);
?>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <h3>HOME</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
    </div>
  </div>

<div class="tab-title-container">
    <br />
    <?php $model = Campaign::find()->where(['c_id'=>$id])->all();
        $limit = 3;
        $model2 = Campaign::find()->where(['c_cat_id'=>$id])->limit($limit)->all();?>
    <div class="featured-campaign-container1">
        <p class="featured-campaign-text">FEATURED CAMPAIGN</p>
        <p class="featured-campaign-image"><?= Html::img('@web/images/uploads/Tulips.jpg') ?></p>
        <p class="featured-campaign-title"><?=$model->c_title?></p>
        <p class="campaign-fund-progress">90% FUNDED</p>
    </div>

    <div class="featured-campaign-container2">
        <p class="featured-campaign-text-right">NEW</p>
        <?php foreach($model2 as $campaign) {?>
        <div class="featured-campaign-image-container">
            <?= Html::img('@web/images/uploads/Koala.jpg',['class' => 'featured-campaign-image-right']) ?>
        </div>
        <div class="featured-campaign-title-container">
            <p class="featured-campaign-title-right"><?=$model2->c_title?></p>
            <p class="campaign-fund-progress-right">30% funded</p>
        </div>
        <br />
        <br />
        <?php }?>
    </div>
</div>
<hr />