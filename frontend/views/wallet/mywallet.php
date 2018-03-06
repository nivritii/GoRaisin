<?php

use frontend\assets\HomePageAsset;
use frontend\assets\CampaignAsset;
use frontend\models\Campaign;
use yii\helpers\Html;
use yii\helpers\Url;
use kartik\tabs\TabsX;
use frontend\models\Category;
use kartik\date\DatePicker;

HomePageAsset::register($this);
CampaignAsset::register($this);

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
                        <h4 class="glyphicon glyphicon-question-sign"></h4><br/>Add a FAQ
                    </a>
                    <a href="#" class="list-group-item text-center">
                        <h4 class="glyphicon glyphicon-eye-open"></h4><br/>View All FAQ
                    </a>
                </div>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 bhoechie-tab">
                <!-- flight section -->
                <div class="bhoechie-tab-content active">
                    <form class="postFAQ" enctype="multipart/form-data" action="postfaq?id=<?= $model->c_id ?>"
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
                                <textarea rows="6" type="text" style="width: 100%" name="faqAns" id="faqAns" value="<?=$response?>"></textarea>
                            </div>
                        </div>
                        <div style="clear:both; text-align: center; margin-bottom: 20px">
                        <input onclick="validate()" class="btn btn-md btn-info" type="submit" value="Save"
                               style="border: 0;width: 35%">
                        </div>
                </div>
                <!-- train section -->
                <div class="bhoechie-tab-content">
                    <div class="panel-group" id="accordion">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 data-toggle="collapse" data-parent="#accordion" href="#collapse1" class="panel-title expand">
                                        <div class="right-arrow pull-right">+</div>
                                        <a href="#"></a>
                                    </h4>
                                </div>
                                <div id="collapse1" class="panel-collapse collapse">
                                    <div class="panel-body"></div>
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


