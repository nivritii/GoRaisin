<?php
/**
 * Created by PhpStorm.
 * User: cherry
 * Date: 25/01/2018
 * Time: 2:04 PM
 */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Modal;
use yii\helpers\Url;
frontend\assets\TabAsset::register($this);
?>
<div class="tab-title-container">
    <p class="tab-title">Travels</p>
    <br />
    <div class="featured-campaign-container1">
        <p class="featured-campaign-text">FEATURED CAMPAIGN</p>
        <?= Html::img('@web/images/uploads/Jellyfish.jpg',['class' => 'featured-campaign-image']) ?>
        <p class="featured-campaign-title">Jellyfish</p>
        <p class="campaign-fund-progress">50% FUNDED</p>
    </div>

    <div class="featured-campaign-container2">
        <p class="featured-campaign-text-right">NEW</p>
        <div class="featured-campaign-image-container">
            <?= Html::img('@web/images/uploads/Chrysanthemum.jpg',['class' => 'featured-campaign-image-right']) ?>
        </div>
        <div class="featured-campaign-title-container">
            <p class="featured-campaign-title-right">Chrysanthemum</p>
            <p class="campaign-fund-progress-right">70% funded</p>
        </div>
        <br />
        <br />

        <div class="featured-campaign-image-container">
            <?= Html::img('@web/images/uploads/Tulips.jpg',['class' => 'featured-campaign-image-right']) ?>
        </div>
        <div class="featured-campaign-title-container">
            <p class="featured-campaign-title-right">Tulips</p>
            <p class="campaign-fund-progress-right">20% funded</p>
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