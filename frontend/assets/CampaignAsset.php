<?php
/**
 * Created by PhpStorm.
 * User: cherry
 * Date: 23/01/2018
 * Time: 12:01 PM
 */
namespace frontend\assets;

use yii\web\AssetBundle;

class CampaignAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/campaign/style.css',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css',
    ];
    public $js = [
    ];
    public $depends = [
        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapAsset',
    ];
}