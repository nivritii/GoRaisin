<?php

/* @var $this yii\web\View */
use frontend\assets\HomePageAsset;
use yii\helpers\Html;
use yii\helpers\Url;
use frontend\models\Category;
use kartik\tabs\TabsX;

HomePageAsset::register($this);
$this->title = 'GoRaisin';
?>
        <!-- Main Content -->
<div class="site-index">
        <div id="Content">
            <div class="content_wrapper clearfix">
                <div class="sections_group">
                    <div class="entry-content">
                        <div class="section mcb-section " style="padding-top:50px; padding-bottom:20px; ">
                            <div class="section_wrapper mcb-section-inner">
                                <?php
                                $items = [
                                    [
                                        'label'=>'<i class="glyphicon glyphicon-home"></i> Home',
                                        'content'=>$this->render('/user/index',['model' => $model]),
                                        'active'=>true
                                    ],
                                    [
                                        'label'=>'<i class="glyphicon glyphicon-user"></i> Profile',
                                        'content'=>$this->render('/user/index',['model' => $model]),
                                        /*'linkOptions'=>['data-url'=>\yii\helpers\Url::to(['/site/tabs-data'])]*/
                                    ],
                                ];
                                echo TabsX::widget([
                                    'items'=>$items,
                                    'position'=>TabsX::POS_ABOVE,
                                    'encodeLabels'=>false
                                ]);
                                ?>
                                <div class="wrap mcb-wrap one clearfix">
                                    <!-- One Full Row-->
                                    <?php foreach ($model as $campaign) { ?>
                                    <div class="column mcb-column one column_blog ">
                                        <div class="column_filters">
                                            <div class="blog_wrapper isotope_wrapper clearfix">
                                                <div class="posts_group lm_wrapper col-3 photo">
                                                    <div class="post-item isotope-item clearfix  post  format-standard has-post-thumbnail  category-hot-news   ">
                                                        <div class="date_label">
                                                            March 12, 2014
                                                        </div>
                                                        <div class="image_frame post-photo-wrapper scale-with-grid">
                                                            <div class="image_wrapper">
                                                                <a href="<?= Url::to(['campaign/view', 'id' => $campaign->c_id])?>">
                                                                    <div class="mask"></div>
                                                                    <p><?= Html::img(Url::to('@web/images/uploads/' . $campaign->c_image), ['class' => 'img-fluid rounded mb-3 mb-md-0'], ['alt' => 'Image'], ['align' => 'left'], ['width' => '1200'], ['height' => '480']) ?></p>
<!--                                                                    <img width="1200" height="480" src="images/home_blogger2_hotnews-1200x480.jpg" class="scale-with-grid wp-post-image" alt="home_blogger2_hotnews" itemprop="image" />-->
                                                                </a>
                                                                <div class="image_links double">
                                                                    <a href="content/blogger2/images/home_blogger2_hotnews-1200x800.jpg" class="zoom" rel="prettyphoto"><i class="icon-search"></i></a><a href="<?= Url::to(['campaign/fund'])?>" class="link"><i class="icon-link"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="post-desc-wrapper">
                                                            <div class="post-desc">
                                                                <div class="post-head">
                                                                    <div class="post-meta clearfix">
                                                                        <div class="author-date">
                                                                            <span class="vcard author post-author"><span class="label">Published by </span><?= Html::a('<i class="icon-user"></i>')?><a><?= $campaign->cAuthor->username?></a></span></span><span class="date"><span class="label">at </span><i class="icon-clock"></i> <span class="post-date updated"><?= $campaign->c_created_at?></span></span>
                                                                        </div>
                                                                        <div class="category">
                                                                            <span class="cat-btn"><?= $campaign->cCat->name ?><i class="icon-down-dir"></i></span>
                                                                            <div class="cat-wrapper">
                                                                                <ul class="post-categories">
                                                                                    <?php foreach ($categories as $category) {?>
                                                                                    <li>
                                                                                        <a href="category-page.html" rel="category tag"><?= $category->name?></a>
                                                                                    </li>
                                                                                    <?php }?>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="post-footer">
                                                                        <div class="button-love">
                                                                            <span class="love-text">Do you like it?</span><a href="#" class="mfn-love " data-id="2269"><span class="icons-wrapper"><i class="icon-heart-empty-fa"></i><i class="icon-heart-fa"></i></span><span class="label">138</span></a>
                                                                        </div>
                                                                        <div class="post-links">
                                                                            <i class="icon-doc-text"></i><a href="<?= Url::to(['campaign/view', 'id' => $campaign->c_id])?>" class="post-more">Read more</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="post-title">
                                                                    <h2 class="entry-title" itemprop="headline"><a href="<?= Url::to(['campaign/view', 'id' => $campaign->c_id])?>"><?=$campaign->c_title?></a></h2>
                                                                </div>
                                                                <div class="post-excerpt">
                                                                    <?=$campaign->c_description?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                                <div class="wrap mcb-wrap one clearfix">
                                    <!-- One Full Row-->
                                    <div class="column mcb-column one column_column column-margin-20px">
                                        <div class="column_attr">
                                            <div style="background: url(images/home_blogger2_sep.png) no-repeat left top; height: 3px;"></div>
                                            <hr class="no_line" style="margin: 0 auto 30px;" />
                                            <?php $catName1=Category::find()->where(['id'=>11])->one()?>
                                            <h3><?=$catName1->name?></h3>
                                        </div>
                                    </div>
                                    <!-- One Full Row-->
                                    <div class="column mcb-column one column_blog_slider ">
                                        <div class="blog_slider clearfix hide-more flat">
                                            <div class="blog_slider_header">
                                                <a class="button button_js slider_prev" href="#"><span class="button_icon"><i class="icon-left-open-big"></i></span></a><a class="button button_js slider_next" href="#"><span class="button_icon"><i class="icon-right-open-big"></i></span></a>
                                            </div>
                                            <ul class="blog_slider_ul">
                                                <?php foreach ($category1 as $campaign_1) {?>
                                                <li class="post-2295 post  format-standard has-post-thumbnail  tag-motion tag-video" style="width: 398px;">
                                                    <div class="item_wrapper">
                                                        <div class="image_frame scale-with-grid">
                                                            <div class="image_wrapper">
                                                                <a href="<?= Url::to(['campaign/view', 'id' => $campaign_1->c_id])?>">
                                                                    <?= Html::img(Url::to('@web/images/uploads/' . $campaign_1->c_image), ['class' => 'scale-with-grid wp-post-image'], ['alt' => 'Image'], ['align' => 'left'], ['width' => '1200'], ['height' => '480']) ?>
<!--                                                                    <img width="1200" height="800" src="content/blogger2/images/home_blogger2_news2.jpg" class="scale-with-grid wp-post-image" alt="home_blogger2_news2" />-->
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="date_label">
                                                            <?=$campaign_1->c_created_at?>
                                                        </div>
                                                        <div class="desc">
                                                            <h4><a href="<?= Url::to(['campaign/view', 'id' => $campaign_1->c_id])?>"><?=$campaign_1->c_title?></a></h4>
                                                            <hr class="hr_color" />
                                                            <a href="<?= Url::to(['campaign/view', 'id' => $campaign_1->c_id])?>" class="button button_left button_js"><span class="button_icon"><i class="icon-layout"></i></span><span class="button_label">Read more</span></a>
                                                        </div>
                                                    </div>
                                                </li>
                                                <?php }?>
                                            </ul>
                                            <div class="slider_pagination"></div>
                                        </div>
                                    </div>
                                </div>
                                <!-- One Second (1/2) Column -->
                                <div class="wrap mcb-wrap one-second clearfix" style="padding:0 1% 0 0; ">
                                    <!-- One Full Row-->
                                    <div class="column mcb-column one column_column column-margin-20px">
                                        <div class="column_attr">
                                            <div style="background: url(images/home_blogger2_sep.png) no-repeat left top; height: 3px;"></div>
                                            <hr class="no_line" style="margin: 0 auto 30px;" />
                                            <?php $catName2=Category::find()->where(['id'=>10])->one()?>
                                            <h3><?=$catName2->name?></h3>
                                        </div>
                                    </div>
                                    <!-- One Full Row-->
                                    <div class="column mcb-column one column_blog_slider ">
                                        <div class="blog_slider clearfix hide-more flat">
                                            <div class="blog_slider_header">
                                                <a class="button button_js slider_prev" href="#"><span class="button_icon"><i class="icon-left-open-big"></i></span></a><a class="button button_js slider_next" href="#"><span class="button_icon"><i class="icon-right-open-big"></i></span></a>
                                            </div>
                                            <ul class="blog_slider_ul">
                                                <?php foreach ($category2 as $campaign_2) {?>
                                                <li class="post-2277 post  format-standard has-post-thumbnail  category-lifestyle  tag-video" style="width: 273px;">
                                                    <div class="item_wrapper">
                                                        <div class="image_frame scale-with-grid">
                                                            <div class="image_wrapper">
                                                                <a href="<?= Url::to(['campaign/view', 'id' => $campaign_2->c_id])?>">
                                                                    <?= Html::img(Url::to('@web/images/uploads/' . $campaign_2->c_image), ['class' => 'scale-with-grid wp-post-image'], ['alt' => 'Image'], ['align' => 'left'], ['width' => '1200'], ['height' => '480']) ?>
<!--                                                                    <img width="1200" height="800" src="content/blogger2/images/home_blogger2_lifestyle1.jpg" class="scale-with-grid wp-post-image" alt="home_blogger2_lifestyle1" />-->
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="date_label">
                                                            <?=$campaign_2->c_created_at?>
                                                        </div>
                                                        <div class="desc">
                                                            <h4><a href="<?= Url::to(['campaign/view', 'id' => $campaign_2->c_id])?>"><?=$campaign_2->c_title?></a></h4>
                                                            <hr class="hr_color" />
                                                            <a href="<?= Url::to(['campaign/view', 'id' => $campaign_2->c_id])?>" class="button button_left button_js"><span class="button_icon"><i class="icon-layout"></i></span><span class="button_label">Read more</span></a>
                                                        </div>
                                                    </div>
                                                </li>
                                                <?php }?>
                                            </ul>
                                            <div class="slider_pagination"></div>
                                        </div>
                                    </div>
                                </div>
                                <!-- One Second (1/2) Column -->
                                <div class="wrap mcb-wrap one-second clearfix" style="padding:0 0 0 1%; ">
                                    <!-- One Full Row-->
                                    <div class="column mcb-column one column_column column-margin-20px">
                                        <div class="column_attr">
                                            <div style="background: url(images/home_blogger2_sep.png) no-repeat left top; height: 3px;"></div>
                                            <hr class="no_line" style="margin: 0 auto 30px;" />
                                            <?php $catName3=Category::find()->where(['id'=>8])->one()?>
                                            <h3><?=$catName3->name?></h3>
                                        </div>
                                    </div>
                                    <!-- One Full Row-->
                                    <div class="column mcb-column one column_blog_slider ">
                                        <div class="blog_slider clearfix hide-more flat">
                                            <div class="blog_slider_header">
                                                <a class="button button_js slider_prev" href="#"><span class="button_icon"><i class="icon-left-open-big"></i></span></a><a class="button button_js slider_next" href="#"><span class="button_icon"><i class="icon-right-open-big"></i></span></a>
                                            </div>
                                            <ul class="blog_slider_ul">
                                                <?php foreach ($category3 as $campaign_3) {?>
                                                <li class="post-2285 post  format-standard has-post-thumbnail  category-places " style="width: 273px;">
                                                    <div class="item_wrapper">
                                                        <div class="image_frame scale-with-grid">
                                                            <div class="image_wrapper">
                                                                <a href="<?= Url::to(['campaign/view', 'id' => $campaign_3->c_id])?>">
                                                                    <?= Html::img(Url::to('@web/images/uploads/' . $campaign_3->c_image), ['class' => 'scale-with-grid wp-post-image'], ['alt' => 'Image'], ['align' => 'left'], ['width' => '1200'], ['height' => '480']) ?>
<!--                                                                    <img width="1200" height="800" src="content/blogger2/images/home_blogger2_places2.jpg" class="scale-with-grid wp-post-image" alt="home_blogger2_places2" />-->
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="date_label">
                                                            <?=$campaign_3->c_created_at?>
                                                        </div>
                                                        <div class="desc">
                                                            <h4><a href="<?= Url::to(['campaign/view', 'id' => $campaign_3->c_id])?>"><?=$campaign_3->c_title?></a></h4>
                                                            <hr class="hr_color" />
                                                            <a href="<?= Url::to(['campaign/view', 'id' => $campaign_3->c_id])?>" class="button button_left button_js"><span class="button_icon"><i class="icon-layout"></i></span><span class="button_label">Read more</span></a>
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
                        <div class="section the_content no_content">
                            <div class="section_wrapper">
                                <div class="the_content_wrapper"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>


    <script>
        jQuery(window).load(function() {
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

