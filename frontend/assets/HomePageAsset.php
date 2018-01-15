<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class HomePageAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'http://fonts.googleapis.com/css?family=Roboto:100,300,400,400italic,700',
        'http://fonts.googleapis.com/css?family=Patua+One:100,300,400,400italic,700',
        'http://fonts.googleapis.com/css?family=Lato:300,400,400italic,700,700italic',
        'http://fonts.googleapis.com/css?family=Raleway:300,400,400italic,700,700italic',
        'homepage/css/global.css',
        'homepage/css/structure.css',
        'homepage/css/blogger2.css',
        'homepage/css/custom.css',
    ];
    public $js = [
        'homepage/js/jquery-2.1.4.min.js',
        'homepage/js/mfn.menu.js',
        'homepage/js/jquery.plugins.js',
        'homepage/js/jquery.jplayer.min.js',
        'homepage/js/animations.js',
        'homepage/js/scripts.js',
    ];
    public $depends = [
//        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapAsset',
    ];
}
