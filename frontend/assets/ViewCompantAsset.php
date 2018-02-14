<?php
/**
 * Created by PhpStorm.
 * User: cherry
 * Date: 14/02/2018
 * Time: 2:38 PM
 */
namespace frontend\assets;

use yii\web\AssetBundle;

class ViewCompantAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700',
        'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css',
    ];
    public $js = [
    ];
    public $depends = [
        'yii\web\YiiAsset',
        /*'yii\bootstrap\BootstrapAsset',*/
    ];
}