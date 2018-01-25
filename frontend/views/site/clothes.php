<?php
/**
 * Created by PhpStorm.
 * User: cherry
 * Date: 25/01/2018
 * Time: 2:03 PM
 */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Modal;
use yii\helpers\Url;
frontend\assets\TabAsset::register($this);
?>
<div class="tab-title-container">
    <p class="tab-title">Clothes</p>
    <br />
    <div class="featured-campaign-container1">
        <p class="featured-campaign-text">FEATURED CAMPAIGN</p>
        <?= Html::img('@web/images/uploads/Koala.jpg',['class' => 'featured-campaign-image']) ?>
        <p class="featured-campaign-title">Koala</p>
        <p class="campaign-fund-progress">70% FUNDED</p>
    </div>

    <div class="featured-campaign-container2">
        <p class="featured-campaign-text-right">NEW</p>
        <div class="featured-campaign-image-container">
            <?= Html::img('@web/images/uploads/Tulips.jpg',['class' => 'featured-campaign-image-right']) ?>
        </div>
        <div class="featured-campaign-title-container">
            <p class="featured-campaign-title-right">Tulips</p>
            <p class="campaign-fund-progress-right">30% funded</p>
        </div>
        <br />
        <br />

        <div class="featured-campaign-image-container">
            <?= Html::img('@web/images/uploads/Lighthouse.jpg',['class' => 'featured-campaign-image-right']) ?>
        </div>
        <div class="featured-campaign-title-container">
            <p class="featured-campaign-title-right">Lighthouse</p>
            <p class="campaign-fund-progress-right">60% funded</p>
        </div>
        <br />
        <br />

        <div class="featured-campaign-image-container">
            <?= Html::img('@web/images/uploads/Penguins.jpg',['class' => 'featured-campaign-image-right']) ?>
        </div>
        <div class="featured-campaign-title-container">
            <p class="featured-campaign-title-right">Penguins</p>
            <p class="campaign-fund-progress-right">80% funded</p>
        </div>
    </div>

</div>
<hr />