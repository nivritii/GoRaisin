<?php

/* @var $this yii\web\View */
/* @var $content string */
$imagePath = '/'.Yii::$app->user->identity->image;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Modal;
backend\assets\ProfileAsset::register($this);
$this->title = 'GoRaisin Backend';
?>

<div class="site-index">

</div>

