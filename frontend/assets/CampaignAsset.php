<?php
namespace frontend\assets;

use yii\web\AssetBundle;

class CampaignAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/campaign/tab_wizard.css',
        'css/campaign/style.css',
        'css/campaign/bootstrapValidator.css',
        'css/campaign/bootstrapValidator.min.css',
        'css/campaign/bootstrap.css',
        'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css',
        'https://fonts.googleapis.com/css?family=Damion|Muli:400,600',
        'https://cdn.quilljs.com/1.3.5/quill.snow.css',
        'http://cdn.jsdelivr.net/jquery.bootstrapvalidator/0.5.2/css/bootstrapValidator.min.css'
    ];
    public $js = [
        'https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js',
        'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js',
        'http://cdn.jsdelivr.net/jquery.bootstrapvalidator/0.5.2/js/bootstrapValidator.min.js',
        'js/campaign/script.js',
        'js/campaign/texteditor.js',
        'js/campaign/video.js',
        'js/campaign/bootstrapValidator.min.js',
        'js/campaign/bootstrapValidator.js',
        'js/campaign/bootstrap.js',
        'js/campaign/bootstrap.min.js',
        'js/campaign/jquery-1.10.2.min.js',
        'js/campaign/jquery-1.10.2.min.map.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}

