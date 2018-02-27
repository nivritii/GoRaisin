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
                                            <h2 class="tabpage-title">Create your Bitshares wallet</h2>
                                            <br/>
                                            <br/>
<!--                                            <div style="padding-top: 30px;padding-bottom: 30px; width: 100%">-->
<!--                                                <input class="btn btn-md btn-info" type="submit" id="submit"-->
<!--                                                       value="Generate brain key of the wallet" id="submit"-->
<!--                                                       disabled>-->
<!--                                            </div>-->
                                            <div style="width: 100%; float: left;">
                                                <div style="display: inline-block;padding-top: 10px; margin-right: 3%">
                                                    <div class="item-title">Username:</div>
                                                </div>
                                                <div style="display: inline-block; padding-left: 5%;width: 58%">
                                                    <input type="text" style="width: 100%" name="username" value="<?=$response?>">
                                                </div>
                                            </div>
<!--                                            <div style="width: 100%;float: left;">-->
<!--                                                <div style="display: inline-block;padding-top: 10px">-->
<!--                                                    <div class="item-title">Generated Brain key:</div>-->
<!--                                                </div>-->
<!--                                                <div style="display: inline-block; padding-left: 2%;width: 55%">-->
<!--                                                    <input type="text" style="width: 100%" name="#">-->
<!--                                                </div>-->
<!--                                            </div>-->
                                            <div style="padding-top: 30px;padding-bottom: 30px; width: 100%; float: left">
                                                <input class="btn btn-md btn-info" type="submit" id="submit"
                                                       value="Create your wallet" id="submit">
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
