<?php

use yii\helpers\Html;
use yii\grid\GridView;
use frontend\assets\HomePageAsset;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\WalletSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Create Wallet';
$this->params['breadcrumbs'][] = $this->title;
HomePageAsset::register($this);
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="site-index">
    <div id="Content">
        <div class="content_wrapper clearfix">
            <div class="sections_group">
                <div class="entry-content">
                    <div class="section mcb-section " style="padding-top:0px; padding-bottom:20px; ">
                        <div class="section_wrapper mcb-section-inner">
                            <div class="container" style="padding-left:0px">
                                <div class="col-xs-12">
                                    <div class="col-md-12 well text-center">
                                        <form name="basicform" id="basicform" method="post" action="index">
                                            <h2 class="tabpage-title">Create your e-wallet</h2>
                                            <br/>
                                            <br/>
                                            <div style="padding-top: 30px;padding-bottom: 30px; width: 100%; float: left">
                                                <input class="btn btn-md btn-info" type="submit" value="Proceed with wallet creation" id="submit">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
