<?php
/**
 * Created by PhpStorm.
 * User: cherry
 * Date: 22/01/2018
 * Time: 2:04 PM
 */
namespace frontend\assets;

use yii\web\AssetBundle;

class LoginAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/login/style.css',
        'css/login/fontawesome.min.css',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css',
    ];
    public $js = [
    ];
    public $depends = [
        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapAsset',
    ];
}