<?php
/**
 * Created by PhpStorm.
 * User: cherry
 * Date: 18/01/2018
 * Time: 3:21 PM
 */
namespace frontend\assets;

use yii\web\AssetBundle;

class UserAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700',
        'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css',
        'https://bootswatch.com/cosmo/bootstrap.min.css',
        'css/user/reset.css',
        'css/user/style.css',
    ];
    public $js = [
        /*'js/user/jquery-2.1.4.js',
        'js/user/main.js',
        'js/user/modernizr.js',*/
    ];
    public $depends = [
        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapAsset',
    ];
}