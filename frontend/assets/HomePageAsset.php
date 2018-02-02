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
        'css/homepage/global.css',
        'css/homepage/structure.css',
        'css/homepage/blogger2.css',
        /*'css/homepage/custom.css',*/
    ];
    public $js = [
        'js/homepage/jquery-2.1.4.min.js',
        'js/homepage/mfn.menu.js',
        'js/homepage/jquery.plugins.js',
        'js/homepage/jquery.jplayer.min.js',
        'js/homepage/animations.js',
        'js/homepage/scripts.js',
        'js/homepage/jquery-ui.min',
        'js/homepage/jquery.ui.tabs',
    ];
    public $depends = [
        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapAsset',
    ];
}
