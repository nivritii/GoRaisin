<?php
/**
 * Created by PhpStorm.
 * User: cherry
 * Date: 04/01/2018
 * Time: 2:18 PM
 */
namespace frontend\assets;

use yii\web\AssetBundle;

class RoadmapAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/roadmap/reset.css',
        'css/roadmap/style.css',
        'http://fonts.googleapis.com/css?family=Droid+Serif|Open+Sans:400,700',
    ];

    public $js = [
        'js/roadmap/main.js',
        'js/roadmap/modernizr.js',
        'http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}