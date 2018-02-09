<?php
/**
 * Created by PhpStorm.
 * User: rama
 * Date: 2/1/2018
 * Time: 3:56 PM
 */
use yii\helpers\Url;
use yii\helpers\Html;
use frontend\models\Fund;
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<!-- Main Content -->
<div class="site-index">
    <div id="Content">
        <div class="content_wrapper clearfix">
            <div class="sections_group">
                <div class="entry-content">
                    <div class="section mcb-section " style="padding-top:0px; padding-bottom:20px; ">
                        <div class="section_wrapper mcb-section-inner">
                            <div class="container" style="padding-left:0px">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a data-toggle="tab" href="#home">Activity</a></li>
                                    <li><a data-toggle="tab" href="#menu1">Created Projects</a></li>
                                    <li><a data-toggle="tab" href="#menu2">Backed Projects</a></li>
                                </ul>

                                <div class="tab-content">
                                    <div id="home" class="tab-pane fade in active">
                                        <h3>Activity</h3>
                                        <?php foreach ($activities as $activity){?>
                                        <div class="card">
                                            <div class="card-block">
                                                <h4 class="card-title"><?=$activity->fund_amt?></h4>
                                                <h6 class="card-subtitle mb-2 text-muted"><?=$activity->fund_created_on?></h6>
                                            </div>
                                        </div>
                                        <?php }?>
                                    </div>
                                    <div id="menu1" class="tab-pane fade">
                                        <h3>Created Projects</h3>
                                        <div class="posts_group lm_wrapper classic col-3">
                                            <?php foreach ($campaigns as $campaign) {
                                                $backed = Fund::find()->where(['fund_c_id'=>$campaign->c_id])->sum('fund_amt');
                                                $progress = ($backed/$campaign->c_goal)*100;
                                                ?>
                                                <div class="post-item isotope-item clearfix post-2277 post  format-standard has-post-thumbnail  category-lifestyle  tag-video">
                                                    <div class="date_label">
                                                        <?=$campaign->c_created_at?>
                                                    </div>
                                                    <div class="image_frame post-photo-wrapper scale-with-grid">
                                                        <div class="image_wrapper">
                                                            <a href="<?= Url::to(['campaign/view', 'id' => $campaign->c_id])?>">
                                                                <div class="mask"></div>
                                                                <?= Html::img(Url::to('@web/images/uploads/' . $campaign->c_image), ['class' => 'scale-with-grid wp-post-image'], ['alt' => 'Image'], ['align' => 'left'], ['width' => '1200'], ['height' => '480']) ?>
                                                                <!--                                                        <img width="960" height="750" src="images/home_blogger2_lifestyle1-960x750.jpg" class="scale-with-grid wp-post-image" alt="home_blogger2_lifestyle1" itemprop="image" />-->
                                                            </a>
                                                            <div class="image_links double">
                                                                <a href="images/home_blogger2_lifestyle1-1200x800.jpg" class="zoom" rel="prettyphoto"><i class="icon-search"></i></a><a href="item-8.html" class="link"><i class="icon-link"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="post-desc-wrapper">
                                                        <div class="post-desc">
                                                            <div class="post-head">
                                                                <div class="post-meta clearfix">
                                                                    <div class="author-date">
                                                                        <span class="vcard author post-author"><span class="label">Published by </span><i class="icon-user"></i> <span class="fn"><a href="#"><?= $campaign->cAuthor->username?></a></span></span><span class="date"><span class="label">at </span><i class="icon-clock"></i> <span class="post-date updated"><?= $campaign->c_created_at?></span></span>
                                                                    </div>
                                                                    <div class="category">
                                                                        <span class="cat-btn">Category<i class="icon-down-dir"></i></span>
                                                                        <div class="cat-wrapper">
                                                                            <ul class="post-categories">
                                                                                <li>
                                                                                    <a href="category-page.html" rel="category tag"><?= $campaign->cCat->name?></a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="post-title">
                                                                <h2 class="entry-title" itemprop="headline"><a href="<?= Url::to(['campaign/view', 'id' => $campaign->c_id])?>"><?= $campaign->c_title?></a></h2>
                                                            </div>
                                                            <div class="post-excerpt">
                                                                <p class="big"><?= $campaign->c_description?>
                                                                </p>
                                                            </div>
                                                            <div class="post-footer">
                                                                <div class="progress">
                                                                    <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:<?=$progress?>%"><?=$progress?>%
                                                                    </div>
                                                                </div>
                                                                <div class="post-links">
                                                                    <i class="icon-doc-text"></i><a href="<?= Url::to(['campaign/view', 'id' => $campaign->c_id])?>" class="post-more">Read more</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div id="menu2" class="tab-pane fade">
                                        <h3>Backed Projects</h3>
                                        <div class="card">
                                            <div class="card-block">
                                                <h4 class="card-title"></h4>
                                                <h6 class="card-subtitle mb-2 text-muted"></h6>
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
</div>
