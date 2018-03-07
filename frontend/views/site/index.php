<?php

/* @var $this yii\web\View */

use frontend\assets\HomePageAsset;
use yii\helpers\Html;
use yii\helpers\Url;
use frontend\models\Category;
use frontend\models\Campaign;

HomePageAsset::register($this);
$this->title = 'GoRaisin';
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
                                    <?php foreach ($categories as $category) { ?>
                                        <li class="<?= $category->class ?>"><a data-toggle="tab"
                                                                               href="#<?= $category->id ?>"><?= $category->name ?></a>
                                        </li>
                                    <?php } ?>
                                </ul>


                                <div class="tab-content" style="height:640px;">
                                    <?php foreach ($categories as $category) { ?>
                                        <div id="<?= $category->id ?>" class="tab-pane fade in <?= $category->class ?>">
                                            <div class="featured-campaign-container1"
                                                 style="display: inline-block;width: 60%;height: 480px;vertical-align: top;">
                                                <h2 class="featured-campaign-text"><?= $category->name ?></h2>
                                                <h6>FEATURED CAMPAIGN</h6>
                                                <?php $featured_campaign = Campaign::find()->where(['c_id' => $category->featured_campaign_id, 'c_status'=>'published'])->one();
                                                $new_campaigns = Campaign::find()->where(['c_cat_id' => $category->id, 'c_new_tag' => 1,'c_status'=>'published'])->limit(4)->all(); ?>
                                                <a class="featured-campaign-image" style="width: 700px;"
                                                   href="<?= Url::to(['campaign/view', 'id' => $featured_campaign->c_id]) ?>"><?= Html::img('@web/images/uploads/campaign/' . $featured_campaign->c_image) ?></a>
                                                <a href="<?= Url::to(['campaign/view', 'id' => $featured_campaign->c_id]) ?>">
                                                    <p style="margin-top: 1%; font-size: 17px; color: #2c2c2c;"><?= $featured_campaign->c_title ?></p>
                                                </a>
                                                <p class="campaign-fund-progress"
                                                   style="color: #858585;font-size: 15px;">90% FUNDED</p>
                                            </div>

                                            <div class="featured-campaign-container2"
                                                 style="display: inline-block; width: 35%; height: 480px; vertical-align: top; padding-left:30px">
                                                <p class="featured-campaign-text-right"
                                                   style="margin-left: 4%;color: #2c2c2c;font-size: 17px;margin-top: 52px">
                                                    NEW</p>
                                                <?php foreach ($new_campaigns as $new) { ?>
                                                    <div class="featured-campaign-image-container"
                                                         style="display: inline-block;width: 40%;height: 20%;margin-left: 4%;vertical-align: top;">
                                                        <a href="<?= Url::to(['campaign/view', 'id' => $new->c_id]) ?>"><?= Html::img('@web/images/uploads/campaign/' . $new->c_image, ['class' => 'featured-campaign-image-right']) ?></a>
                                                    </div>
                                                    <div class="featured-campaign-title-container"
                                                         style="display: inline-block;margin-left: 5%;vertical-align: top;width:49%">
                                                        <a href="<?= Url::to(['campaign/view', 'id' => $new->c_id]) ?>">
                                                            <p class="featured-campaign-title-right"
                                                               style="font-size: 15px;color: #2c2c2c;"><?= $new->c_title ?></p>
                                                        </a>
                                                        <p class="campaign-fund-progress-right"
                                                           style="color: #858585;font-size: 12px;">30% funded</p>
                                                    </div>
                                                    <br/>
                                                    <br/>
                                                <?php } ?>
                                                <div style="padding-left: 20px">
                                                    <a href="<?= Url::to(['campaign/show', 'id' => 'NULL']) ?>">View All
                                                        <i class="fa fa-long-arrow-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>

                            <!--Recommended Campaigns-->
                            <div class="wrap mcb-wrap one clearfix">
                                <!-- One Full Row-->
                                <div class="column mcb-column one column_column column-margin-20px">
                                    <div class="column_attr">
                                        <div style="background: url(images/home_blogger2_sep.png) no-repeat left top; height: 3px;"></div>
                                        <hr class="no_line" style="margin: 0 auto 30px;"/>
                                        <h4>Recommended projects</h4>
                                    </div>
                                </div>
                                <!-- One Full Row-->
                                <div class="column mcb-column one column_blog_slider ">
                                    <div class="blog_slider clearfix hide-more flat">
                                        <div class="blog_slider_header">
                                            <a class="button button_js slider_prev" href="#"><span
                                                        class="button_icon"><i
                                                            class="icon-left-open-big"></i></span></a><a
                                                    class="button button_js slider_next" href="#"><span
                                                        class="button_icon"><i
                                                            class="icon-right-open-big"></i></span></a>
                                        </div>
                                        <ul class="blog_slider_ul">
                                            <?php foreach ($category1 as $campaign_1) { ?>
                                                <li class="post-2295 post  format-standard has-post-thumbnail  tag-motion tag-video"
                                                    style="width: 398px;">
                                                    <div class="item_wrapper">
                                                        <div class="image_frame scale-with-grid">
                                                            <div class="image_wrapper">
                                                                <a href="<?= Url::to(['campaign/view', 'id' => $campaign_1->c_id]) ?>">
                                                                    <?= Html::img(Url::to('@web/images/uploads/campaign/' . $campaign_1->c_image), ['class' => 'scale-with-grid wp-post-image'], ['alt' => 'Image'], ['align' => 'left'], ['width' => '1200'], ['height' => '480']) ?>
                                                                    <!--                                                                    <img width="1200" height="800" src="content/blogger2/images/home_blogger2_news2.jpg" class="scale-with-grid wp-post-image" alt="home_blogger2_news2" />-->
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="date_label">
                                                            <?= $campaign_1->c_created_at ?>
                                                        </div>
                                                        <div class="desc">
                                                            <h4>
                                                                <a href="<?= Url::to(['campaign/view', 'id' => $campaign_1->c_id]) ?>"><?= $campaign_1->c_title ?></a>
                                                            </h4>
                                                            <hr class="hr_color"/>
                                                            <a href="<?= Url::to(['campaign/view', 'id' => $campaign_1->c_id]) ?>"
                                                               class="button button_left button_js"><span
                                                                        class="button_icon"><i class="icon-layout"></i></span><span
                                                                        class="button_label">Read more</span></a>
                                                        </div>
                                                    </div>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                        <div class="slider_pagination"></div>
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


<script>
    $(window).load(function () {
        var retina = window.devicePixelRatio > 1 ? true : false;
        if (retina) {
            var retinaEl = jQuery("#logo img.logo-main");
            var retinaLogoW = retinaEl.width();
            var retinaLogoH = retinaEl.height();
            retinaEl.attr("src", "content/blogger2/images/retina-blogger2.png").width(retinaLogoW).height(retinaLogoH);
            var stickyEl = jQuery("#logo img.logo-sticky");
            var stickyLogoW = stickyEl.width();
            var stickyLogoH = stickyEl.height();
            stickyEl.attr("src", "content/blogger2/images/retina-blogger2.png").width(stickyLogoW).height(stickyLogoH);
            var mobileEl = jQuery("#logo img.logo-mobile");
            var mobileLogoW = mobileEl.width();
            var mobileLogoH = mobileEl.height();
            mobileEl.attr("src", "content/blogger2/images/retina-blogger2.png").width(mobileLogoW).height(mobileLogoH);
        }
    });
</script>

