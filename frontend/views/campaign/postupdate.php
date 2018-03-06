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
                        <h4 class="glyphicon glyphicon-bell"></h4><br/>Post a new Update
                    </a>
                    <a href="#" class="list-group-item text-center">
                        <h4 class="glyphicon glyphicon-eye-open"></h4><br/>View All Updates
                    </a>
                </div>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 bhoechie-tab">
                <!-- flight section -->
                <div class="bhoechie-tab-content active">
                    <form class="postUpdate" enctype="multipart/form-data" action="postupdate?id=<?= $model->c_id ?>"
                          method="post" id="tab_logic" name="campaignForm">
                        <h1 class="tabpage-title" style="margin-bottom: 20px; text-align: center">New Update</h1>
                        <div style="width: 100%;">
                            <div style="display: inline-block;float: left;margin-left: 2%;width: 100%">
                                <p><b>Post Title</b></p>
                                <input type="text" style="width: 100%" name="updateTitle" id="updateTitle" required>
                            </div>
                        </div>
                        <div style="width: 100%;">
                            <div style="display: inline-block;float: left;margin-left: 2%;width: 100%; margin-bottom: 20px">
                                <p><b>Timeline Image</b></p>
                                <select name="uImage" id="uImage"
                                        data-default-caption="Select Timeline Image "
                                        style="border-radius: 0px;width: 100%">
                                    <option selected >Select Timeline Image</option>
                                    <?php foreach ($imagesName as $image) { ?>
                                        <option value=<?= $image->id ?>><?=$image->r_image?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div style="clear:both; height: 400px; width: 100%">
                            <div style="display: inline-block;float: left;margin-left: 2%;width: 100%">
                                <p><b>Post Content</b></p>
                                <?php
                                echo \artkost\yii2\trumbowyg\Trumbowyg::widget([
                                    'name' => 'updateContent',
                                    'settings' => [
                                        'lang' => 'en'
                                    ]
                                ]);
                                ?>
                            </div>
                        </div>
                        <div style="clear:both; text-align: center; margin-bottom: 20px">
                        <input onclick="validate()" class="btn btn-md btn-info" type="submit" value="Post an Update"
                               style="border: 0;width: 35%">
                        </div>
                </div>
                <!-- train section -->
                <div class="bhoechie-tab-content">
                    <section id="cd-timeline" class="cd-container">
                        <?php foreach ($updates as $update) { ?>
                            <div class="cd-timeline-block">
                                <div class="cd-timeline-img <?= $update->image->r_background_color ?>">
                                    <?= Html::img('@web/images/roadmap/' . $update->image->r_image) ?>
                                </div> <!-- cd-timeline-img -->

                                <div class="cd-timeline-content">
                                    <h2><?= $update->title ?></h2>
                                    <p><?= $update->content ?></p>
                                    <a href="<?= Url::to('campaign/view', ['updateId' => $update->id]) ?>"
                                       class="cd-read-more">Read
                                        more</a>
                                    <span class="cd-date"><?= $update->timestamp ?></span>
                                </div> <!-- cd-timeline-content -->
                            </div> <!-- cd-timeline-block -->
                        <?php } ?>
                    </section>
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
</script>


