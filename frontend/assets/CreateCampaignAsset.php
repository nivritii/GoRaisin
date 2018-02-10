<?php
namespace frontend\assets;

use yii\web\AssetBundle;

class CreateCampaignAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [

    ];

    public $js = [
        'js/createCampaign/gen_validatorv4.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapAsset',
    ];
}

