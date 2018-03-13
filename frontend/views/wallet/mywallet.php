<?php

use frontend\assets\HomePageAsset;
use frontend\assets\CampaignAsset;
use frontend\assests\WalletAsset;
use frontend\models\Campaign;
use yii\helpers\Html;
use yii\helpers\Url;
use kartik\tabs\TabsX;
use frontend\models\Category;
use kartik\date\DatePicker;

HomePageAsset::register($this);
CampaignAsset::register($this);
WalletAsset::register($this);

/* @var $this yii\web\View */
/* @var $model frontend\models\Campaign */
frontend\assets\RoadmapAsset::register($this);
$campaign_draft = new Campaign();
?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"
      xmlns="http://www.w3.org/1999/html">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>

<div class="container">
    <div class="row">
        <div class="col-xs-12 bhoechie-tab-container" style="margin-left: 0px">
            <div class="col-md-2 bhoechie-tab-menu">
                <div class="list-group">
                    <a href="#" class="list-group-item active text-center">
                        <h4 class="glyphicon glyphicon-tower"></h4><br/>Assests
                    </a>
                    <a href="#" class="list-group-item text-center">
                        <h4 class="glyphicon glyphicon-open-file"></h4><br/>Portfolio
                    </a>
                    <a href="#" class="list-group-item text-center">
                        <h4 class="glyphicon glyphicon-credit-card"></h4><br/>Transactions
                    </a>
                </div>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 bhoechie-tab">
                <!-- flight section -->
                <div class="bhoechie-tab-content active">
                    <form class="postFAQ" enctype="multipart/form-data" action="postfaq?id="
                          method="post" id="postFAQ" name="postFAQ">
                        <h1 class="tabpage-title" style="margin-bottom: 20px; text-align: center">New FAQ</h1>
                        <div style="width: 100%;">
                            <div style="display: inline-block;float: left;margin-left: 2%;width: 100%;margin-bottom: 20px">
                                <p><b>What's the question?</b></p>
                                <textarea rows="2" type="text" style="width: 100%" name="faqQn" id="faqQn"></textarea>
                            </div>
                        </div>
                        <div style="width: 100%;">
                            <div style="display: inline-block;float: left;margin-left: 2%;width: 100%; margin-bottom: 20px">
                                <p><b>What's the answer?</b></p>
                                <textarea rows="6" type="text" style="width: 100%" name="faqAns" id="faqAns" value=""></textarea>
                            </div>
                        </div>
                        <div style="clear:both; text-align: center; margin-bottom: 20px">
                        <input onclick="validate()" class="btn btn-md btn-info" type="submit" value="Save"
                               style="border: 0;width: 35%">
                        </div>
                </div>
                <!-- train section -->
                <div class="bhoechie-tab-content">
                    <div class="row margin-0 list-header hidden-sm hidden-xs">
                        <div class="col-md-3"><div class="header">Property</div></div>
                        <div class="col-md-2"><div class="header">Type</div></div>
                        <div class="col-md-2"><div class="header">Required</div></div>
                        <div class="col-md-5"><div class="header">Description</div></div>
                    </div>

                    <div class="row margin-0">
                        <div class="col-md-3">
                            <div class="cell">
                                <div class="propertyname">
                                    CurrencyCode  <span class="mobile-isrequired">[Required]</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="cell">
                                <div class="type">
                                    <code>String</code>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="cell">
                                <div class="isrequired">
                                    Yes
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="cell">
                                <div class="description">
                                    The standard ISO 4217 3-letter currency code
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br/>
    </form>
</div>

<script>
    $(document).ready(function () {
        $("div.bhoechie-tab-menu>div.list-group>a").click(function (e) {
            e.preventDefault();
            $(this).siblings('a.active').removeClass("active");
            $(this).addClass("active");
            var index = $(this).index();
            $("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
            $("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
        });
    });

    $(function() {
        $(".expand").on( "click", function() {
// $(this).next().slideToggle(200);
            $expand = $(this).find(">:first-child");

            if($expand.text() == "+") {
                $expand.text("-");
            } else {
                $expand.text("+");
            }
        });
    });
</script>


