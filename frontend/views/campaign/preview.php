<?php

use yii\helpers\Html;
use yii\helpers\Url;
use kartik\tabs\TabsX;

/* @var $this yii\web\View */
/* @var $model frontend\models\Campaign */

$this->title = $model->c_title . ' - GoRaisin';
$this->params['breadcrumbs'][] = ['label' => 'Campaigns', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
frontend\assets\HomePageAsset::register($this);
?>
<div class="campaign-review">
    <!-- Main Content -->
    <div id="Content" style="padding: 0px">
        <div class="content_wrapper clearfix">
            <div class="sections_group" style="width: 55%;float: left;margin-left: 10%">
                <div style="border-right: .5px solid #f0f0f0; padding-top: 3%">
                    <div class="column zero" style="width: 100%">
                        <div style="display: inline-block;vertical-align: middle;padding-top:5%">
                            <?= Html::img('@web/' . $model->cAuthor->image, ['style' => 'height:40px;width:40px;border-radius:10px;margin-bottom:10%']) ?>
                            <br/>
                            <p style="color:#494949;padding:3px;border-radius:5px;font-size:15px;"><?php echo $model->cAuthor->username ?></p>
                        </div>
                        <div style="clear:both; display: inline-block;vertical-align: middle;margin-left: 10%;width: 75%;">
                            <h1 class="title" style="color: #6b0d7ce8;font-size: 35px"><?= $model->c_title ?></h1>
                            <p class="" style="font-size: 13px;"><?= $model->c_description ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sections_group"
                 style="width: 55%;float: left; margin-left: 10%; border-right: .5px solid #f0f0f0">
                <div id=" " class="no-title no-share  post  format-standard has-post-thumbnail  category-hot-news   ">
                    <div class="section section-post-header">
                        <div class="section_wrapper clearfix">
                            <!-- Post Featured Element (image / video / gallery)-->
                            <!-- One full width row-->
                            <div class="column one single-photo-wrapper image"
                                 style="margin-top: 0px; margin-right: 0%; margin-bottom: 0px; margin-left: 0%">
                                <div class="image_frame scale-with-grid" style="width: 100%">
                                    <div class="image_wrapper">
                                        <?php
                                        $video = $model->c_video;
                                        $width = '800px';
                                        $height = '450px';
                                        ?>
                                        <iframe id="ytplayer" type="text/html" width="<?= $width ?>"
                                                height="<?= $height ?>"
                                                src="https://www.youtube.com/embed/<?= $video ?>?rel=0&showinfo=0&color=white&iv_load_policy=3"
                                                frameborder="0" allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>
                            <!-- Post Header-->
                            <!-- One full width row-->
                            <div class="column one post-header">
                                <div class="title_wrapper">
                                    <div class="post-meta clearfix">
                                        <div class="category meta-categories" style="width: 100%">
                                            <div style="display: inline-block;float: right;margin-right: 3%">
                                                <p style="font-size: 15px;color: #000000;"><i
                                                            class="glyphicon glyphicon-map-marker"></i>&nbsp;<?php echo $model->cLocation->country ?>
                                                </p>
                                            </div>
                                            <div style="clear: both;display: inline-block;margin-left: 60%">
                                                <p style="font-size: 15px;color: #000000;"><i
                                                            class="glyphicon glyphicon-tag"></i>&nbsp;<?php echo $model->cCat->name ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Post Content-->
                    <div class="post-wrapper-content">
                        <div class="section the_content has_content">
                            <div class="section_wrapper">
                                <div class="the_content_wrapper">
                                    <div class="mcb-column one-second column_tabs "><?= $this->render('campaign_content', ['model' => $model]) ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sidebar area-->
            <div class="sidebar sidebar-1 four columns" style="width: 25%;float: left; margin-right: 8%;">
                <div class="widget-area clearfix" style="padding: 9px 0px 0px;">
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0"
                             aria-valuemax="100" style="width:0%; background-color:#8f13a5f0;color: black;">0%
                        </div>
                    </div>
                    <?php
                    if ($model->c_goal != 0) {
                        ?>
                        <div style="margin-top:0px;">
                            <small>pledged of U$S<?= $model->c_goal ?> goal</small>
                        </div>
                        <?php
                    } else {
                        ?>
                        <div style="margin-top:0px;">
                            <small>pledged of U$S N.A goal</small>
                        </div>
                    <?php } ?>

                    <div style="margin-top:25px; margin-bottom:0px;">0</div>
                    <div style="margin-top:0px;">
                        <small>backers</small>
                    </div>

                    <?php
                    $currectDate = date('Y-m-d');
                    if ($model->c_start_date == null || $model->c_end_date == null) {
                        $days = 'N.A';
                    } else {
                        $diff = strtotime($model->c_end_date) - strtotime($currectDate);
                        $days = ceil($diff / 86400);
                    }
                    ?>
                    <div style="margin-top:25px; margin-bottom:0px;" id="endDate"><?php echo $days; ?></div>
                    <div style="margin-top:0px;">
                        <small>days to go</small>
                    </div>
                    <a href="<?= Url::to(['campaign/edit', 'id' => $model->c_id]) ?>">
                        <button class="btn btn-default" style="width:100%; background-color:#8f13a5f0; color: white">
                            <span style="margin-right:20px" class="glyphicon glyphicon-edit" aria-hidden="true"></span>Edit
                        </button>
                    </a>
                    <br/><br/>
                    <div class="section" style="padding-bottom:20px;">
                        <h6><span class="glyphicon glyphicon-heart-empty" style="cursor:pointer;"></span> All or
                            nothing. This project will only be funded if it reaches its goal
                            by <?= $model->c_end_date ?>.</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
