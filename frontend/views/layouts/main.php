<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\HomePageAsset;
use common\widgets\Alert;

HomePageAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>

</head>
<?php  $this->beginBody() ?>
<body class="archive category layout-full-width nice-scroll-on mobile-tb-left button-flat header-classic minimalist-header sticky-header sticky-white ab-hide subheader-both-left menu-line-below-80-1 menuo-right menuo-no-borders footer-copy-center">
<div id="Wrapper">
    <?=$this->render('header')?>
    <div id="main">
    <?php /*= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ])*/ ?>
    <?= Alert::widget() ?>


    <?=$content?>
    </div>


    <?=$this->render('footer')?>

    </div>
</body>
<?php $this->endBody() ?>
</html>
<?php $this->endPage() ?>
