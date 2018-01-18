<?php

/* @var $this yii\web\View */
use frontend\assets\HomePageAsset;
use yii\helpers\Html;
use yii\helpers\Url;

HomePageAsset::register($this);
$this->title = 'GoRaisin';
?>

<body class="home layout-full-width nice-scroll-on mobile-tb-left button-flat no-content-padding header-classic minimalist-header sticky-header sticky-white ab-hide subheader-both-left menu-line-below-80-1 menuo-right menuo-no-borders footer-copy-center">
    <!-- Main Theme Wrapper -->
    <div id="Wrapper">
        <!-- Header Wrapper -->
        <div id="Header_wrapper">
            <!-- Header -->       
        </div>
        <!-- Main Content -->
        <div id="Content">
            <div class="content_wrapper clearfix">
                <div class="sections_group">
                    <div class="entry-content">
                        <div class="section mcb-section " style="padding-top:50px; padding-bottom:20px; ">
                            <div class="section_wrapper mcb-section-inner">
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
                                                                    <a href="content/blogger2/images/home_blogger2_hotnews-1200x800.jpg" class="zoom" rel="prettyphoto"><i class="icon-search"></i></a><a href="content/blogger2/item-1.html" class="link"><i class="icon-link"></i></a>
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
                                                                                    <li>
                                                                                        <a href="content/blogger2/category-page.html" rel="category tag">Hot news</a>
                                                                                    </li>
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
                                            <h3>News</h3>
                                        </div>
                                    </div>
                                    <!-- One Full Row-->
                                    <div class="column mcb-column one column_blog_slider ">
                                        <div class="blog_slider clearfix hide-more flat">
                                            <div class="blog_slider_header">
                                                <a class="button button_js slider_prev" href="#"><span class="button_icon"><i class="icon-left-open-big"></i></span></a><a class="button button_js slider_next" href="#"><span class="button_icon"><i class="icon-right-open-big"></i></span></a>
                                            </div>
                                            <ul class="blog_slider_ul">
                                                <li class="post-2295 post  format-standard has-post-thumbnail  tag-motion tag-video" style="width: 398px;">
                                                    <div class="item_wrapper">
                                                        <div class="image_frame scale-with-grid">
                                                            <div class="image_wrapper">
                                                                <a href="content/blogger2/item-6.html">
                                                                    <?= Html::img('@web/images/home_blogger2_news2.jpg', ['alt'=>'GoRaisin', 'class'=>'scale-with-grid wp-post-image', 'width'=>'1200','height'=>'800']);?>
<!--                                                                    <img width="1200" height="800" src="content/blogger2/images/home_blogger2_news2.jpg" class="scale-with-grid wp-post-image" alt="home_blogger2_news2" />-->
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="date_label">
                                                            April 29, 2014
                                                        </div>
                                                        <div class="desc">
                                                            <h4><a href="content/blogger2/item-6.html">Proin sed quam hendrerit nonummy</a></h4>
                                                            <hr class="hr_color" />
                                                            <a href="content/blogger2/item-6.html" class="button button_left button_js"><span class="button_icon"><i class="icon-layout"></i></span><span class="button_label">Read more</span></a>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="post-2297 post  format-standard has-post-thumbnail" style="width: 398px;">
                                                    <div class="item_wrapper">
                                                        <div class="image_frame scale-with-grid">
                                                            <div class="image_wrapper">
                                                                <a href="content/blogger2/item-7.html">
                                                                    <?= Html::img('@web/images/home_blogger2_news1.jpg', ['alt'=>'GoRaisin', 'class'=>'scale-with-grid wp-post-image', 'width'=>'1200','height'=>'800']);?>
<!--                                                                <img width="1200" height="800" src="content/blogger2/images/home_blogger2_news1.jpg" class="scale-with-grid wp-post-image" alt="home_blogger2_news1" />-->
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="date_label">
                                                            April 28, 2014
                                                        </div>
                                                        <div class="desc">
                                                            <h4><a href="content/blogger2/item-7.html">Aliquam ultricies pretium</a></h4>
                                                            <hr class="hr_color" />
                                                            <a href="content/blogger2/item-7.html" class="button button_left button_js"><span class="button_icon"><i class="icon-layout"></i></span><span class="button_label">Read more</span></a>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="post-2354 post  format-standard has-post-thumbnail  " style="width: 398px;">
                                                    <div class="item_wrapper">
                                                        <div class="image_frame scale-with-grid">
                                                            <div class="image_wrapper">
                                                                <a href="content/blogger2/item-2.html">
                                                                    <?= Html::img('@web/images/home_blogger2_news3.jpg', ['alt'=>'GoRaisin', 'class'=>'scale-with-grid wp-post-image', 'width'=>'1200','height'=>'800']);?>
<!--                                                                    <img width="1200" height="800" src="content/blogger2/images/home_blogger2_news3.jpg" class="scale-with-grid wp-post-image" alt="home_blogger2_news3" />-->
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="date_label">
                                                            March 12, 2014
                                                        </div>
                                                        <div class="desc">
                                                            <h4><a href="content/blogger2/item-2.html">Nullam nec urna in sem lacinia malesuada sed mollis tortor</a></h4>
                                                            <hr class="hr_color" />
                                                            <a href="content/blogger2/item-2.html" class="button button_left button_js"><span class="button_icon"><i class="icon-layout"></i></span><span class="button_label">Read more</span></a>
                                                        </div>
                                                    </div>
                                                </li>
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
                                            <h3>Lifestyle</h3>
                                        </div>
                                    </div>
                                    <!-- One Full Row-->
                                    <div class="column mcb-column one column_blog_slider ">
                                        <div class="blog_slider clearfix hide-more flat">
                                            <div class="blog_slider_header">
                                                <a class="button button_js slider_prev" href="#"><span class="button_icon"><i class="icon-left-open-big"></i></span></a><a class="button button_js slider_next" href="#"><span class="button_icon"><i class="icon-right-open-big"></i></span></a>
                                            </div>
                                            <ul class="blog_slider_ul">
                                                <li class="post-2277 post  format-standard has-post-thumbnail  category-lifestyle  tag-video" style="width: 273px;">
                                                    <div class="item_wrapper">
                                                        <div class="image_frame scale-with-grid">
                                                            <div class="image_wrapper">
                                                                <a href="content/blogger2/item-8.html">
                                                                    <?= Html::img('@web/images/home_blogger2_lifestyle1-1200x800.jpg', ['alt'=>'GoRaisin', 'class'=>'scale-with-grid wp-post-image', 'width'=>'1200','height'=>'800']);?>
<!--                                                                    <img width="1200" height="800" src="content/blogger2/images/home_blogger2_lifestyle1.jpg" class="scale-with-grid wp-post-image" alt="home_blogger2_lifestyle1" />-->
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="date_label">
                                                            May 8, 2014
                                                        </div>
                                                        <div class="desc">
                                                            <h4><a href="content/blogger2/item-8.html">Vestibulum commodo volutpat laoreet</a></h4>
                                                            <hr class="hr_color" />
                                                            <a href="content/blogger2/item-8.html" class="button button_left button_js"><span class="button_icon"><i class="icon-layout"></i></span><span class="button_label">Read more</span></a>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="post-2279 post  format-standard has-post-thumbnail  category-lifestyle tag-motion tag-video" style="width: 273px;">
                                                    <div class="item_wrapper">
                                                        <div class="image_frame scale-with-grid">
                                                            <div class="image_wrapper">
                                                                <a href="content/blogger2/item-9.html">
                                                                    <?= Html::img('@web/images/home_blogger2_lifestyle2.jpg', ['alt'=>'GoRaisin', 'class'=>'scale-with-grid wp-post-image', 'width'=>'1200','height'=>'800']);?>
<!--                                                                    <img width="1200" height="800" src="content/blogger2/images/home_blogger2_lifestyle2.jpg" class="scale-with-grid wp-post-image" alt="home_blogger2_lifestyle2" />-->
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="date_label">
                                                            May 7, 2014
                                                        </div>
                                                        <div class="desc">
                                                            <h4><a href="content/blogger2/item-9.html">Quisque lorem tortor fringilla sed vesti</a></h4>
                                                            <hr class="hr_color" />
                                                            <a href="content/blogger2/item-9.html" class="button button_left button_js"><span class="button_icon"><i class="icon-layout"></i></span><span class="button_label">Read more</span></a>
                                                        </div>
                                                    </div>
                                                </li>
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
                                            <h3>Places</h3>
                                        </div>
                                    </div>
                                    <!-- One Full Row-->
                                    <div class="column mcb-column one column_blog_slider ">
                                        <div class="blog_slider clearfix hide-more flat">
                                            <div class="blog_slider_header">
                                                <a class="button button_js slider_prev" href="#"><span class="button_icon"><i class="icon-left-open-big"></i></span></a><a class="button button_js slider_next" href="#"><span class="button_icon"><i class="icon-right-open-big"></i></span></a>
                                            </div>
                                            <ul class="blog_slider_ul">
                                                <li class="post-2289 post  format-standard has-post-thumbnail  category-places  tag-design" style="width: 273px;">
                                                    <div class="item_wrapper">
                                                        <div class="image_frame scale-with-grid">
                                                            <div class="image_wrapper">
                                                                <a href="content/blogger2/item-4.html">
                                                                    <?= Html::img('@web/images/home_blogger2_places1.jpg', ['alt'=>'GoRaisin', 'class'=>'scale-with-grid wp-post-image', 'width'=>'1200','height'=>'800']);?>
<!--                                                                    <img width="1200" height="800" src="content/blogger2/images/home_blogger2_places1.jpg" class="scale-with-grid wp-post-image" alt="home_blogger2_places1" />-->
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="date_label">
                                                            May 4, 2014
                                                        </div>
                                                        <div class="desc">
                                                            <h4><a href="content/blogger2/item-4.html">Donec tempus urna risus</a></h4>
                                                            <hr class="hr_color" />
                                                            <a href="content/blogger2/item-4.html" class="button button_left button_js"><span class="button_icon"><i class="icon-layout"></i></span><span class="button_label">Read more</span></a>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="post-2285 post  format-standard has-post-thumbnail  category-places " style="width: 273px;">
                                                    <div class="item_wrapper">
                                                        <div class="image_frame scale-with-grid">
                                                            <div class="image_wrapper">
                                                                <a href="content/blogger2/item-11.html">
                                                                    <?= Html::img('@web/images/home_blogger2_places2.jpg', ['alt'=>'GoRaisin', 'class'=>'scale-with-grid wp-post-image', 'width'=>'1200','height'=>'800']);?>
<!--                                                                    <img width="1200" height="800" src="content/blogger2/images/home_blogger2_places2.jpg" class="scale-with-grid wp-post-image" alt="home_blogger2_places2" />-->
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="date_label">
                                                            May 4, 2014
                                                        </div>
                                                        <div class="desc">
                                                            <h4><a href="content/blogger2/item-11.html">Videamus animi partes quarum conspec</a></h4>
                                                            <hr class="hr_color" />
                                                            <a href="content/blogger2/item-11.html" class="button button_left button_js"><span class="button_icon"><i class="icon-layout"></i></span><span class="button_label">Read more</span></a>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                            <div class="slider_pagination"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="section mcb-section " style="padding-top:0px; padding-bottom:40px; ">
                            <div class="section_wrapper mcb-section-inner">
                                <!-- One Third (1/3) Column -->
                                <div class="wrap mcb-wrap one-third clearfix">
                                    <!-- One Full Row-->
                                    <div class="column mcb-column one column_column">
                                        <div class="column_attr">
                                            <div style="background: url(images/home_blogger2_sep.png) no-repeat left top; height: 3px;"></div>
                                            <hr class="no_line" style="margin: 0 auto 30px;" />
                                            <h3>Eiusmod tempor</h3>
                                        </div>
                                    </div>
                                    <!-- One Full Row-->
                                    <div class="column mcb-column one column_column">
                                        <div class="column_attr">
                                            <h4>Fusce faucibus, sapien ac posuere sodales</h4>
                                            <p class="big">
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, seddo eiusmod tempor incididunt ut labore.
                                            </p>
                                            <p>
                                                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium dolptatem.
                                            </p>
                                            <a class="button button_js" href="#"><span class="button_label">Read more</span></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="wrap mcb-wrap two-third clearfix">
                                    <!-- One Full Row-->
                                    <div class="column mcb-column one column_column">
                                        <div class="column_attr">
                                            <div style="background: url(images/home_blogger2_sep.png) no-repeat left top; height: 3px;"></div>
                                            <hr class="no_line" style="margin: 0 auto 30px;" />
                                            <h3>Vivamus purus neque</h3>
                                        </div>
                                    </div>
                                    <!-- One Sixth (1/6) Column -->
                                    <div class="column mcb-column one-sixth column_image ">
                                        <div class="image_frame image_item no_link scale-with-grid no_border">
                                            <div class="image_wrapper">
                                                <?= Html::img('@web/images/home_blogger2_staff1.jpg', ['alt'=>'GoRaisin', 'class'=>'scale-with-grid wp-post-image', 'width'=>'272','height'=>'281']);?>
<!--                                                <img class="scale-with-grid" src="content/blogger2/images/home_blogger2_staff1.jpg" alt="" width="272" height="281" />-->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- One Third (1/3) Column -->
                                    <div class="column mcb-column one-third column_column">
                                        <div class="column_attr">
                                            <h4>Sara Wright</h4>
                                            <p>
                                                Lorem ipsum dolor sit amet enim. Etiam ullamcorper. Suspendisse a pellentesque dui, non felis. Maecenas malesuada elit
                                            </p>
                                        </div>
                                    </div>
                                    <!-- One Sixth (1/6) Column -->
                                    <div class="column mcb-column one-sixth column_image ">
                                        <div class="image_frame image_item no_link scale-with-grid no_border">
                                            <div class="image_wrapper">
                                                <?= Html::img('@web/images/home_blogger2_staff1.jpg', ['alt'=>'GoRaisin', 'class'=>'scale-with-grid wp-post-image', 'width'=>'272','height'=>'281']);?>
<!--                                                <img class="scale-with-grid" src="content/blogger2/images/home_blogger2_staff2.jpg" alt="" width="272" height="281" />-->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- One Third (1/3) Column -->
                                    <div class="column mcb-column one-third column_column">
                                        <div class="column_attr">
                                            <h4>Kevin Perry</h4>
                                            <p>
                                                Lorem ipsum dolor sit amet enim. Etiam ullamcorper. Suspendisse a pellentesque dui, non felis. Maecenas malesuada elit
                                            </p>
                                        </div>
                                    </div>
                                    <!-- One Full Row-->
                                    <div class="column mcb-column one column_divider ">
                                        <hr class="no_line" />
                                    </div>
                                    <!-- One Sixth (1/6) Column -->
                                    <div class="column mcb-column one-sixth column_image ">
                                        <div class="image_frame image_item no_link scale-with-grid no_border">
                                            <div class="image_wrapper">
                                                <?= Html::img('@web/images/home_blogger2_staff1.jpg', ['alt'=>'GoRaisin', 'class'=>'scale-with-grid wp-post-image', 'width'=>'272','height'=>'281']);?>
<!--                                                <img class="scale-with-grid" src="content/blogger2/images/home_blogger2_staff3.jpg" alt="" width="272" height="281" />-->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- One Third (1/3) Column -->
                                    <div class="column mcb-column one-third column_column">
                                        <div class="column_attr">
                                            <h4>Brandon Ross</h4>
                                            <p>
                                                Lorem ipsum dolor sit amet enim. Etiam ullamcorper. Suspendisse a pellentesque dui, non felis. Maecenas malesuada elit
                                            </p>
                                        </div>
                                    </div>
                                    <!-- One Sixth (1/6) Column -->
                                    <div class="column mcb-column one-sixth column_image ">
                                        <div class="image_frame image_item no_link scale-with-grid no_border">
                                            <div class="image_wrapper">
                                                <?= Html::img('@web/images/home_blogger2_staff1.jpg', ['alt'=>'GoRaisin', 'class'=>'scale-with-grid wp-post-image', 'width'=>'272','height'=>'281']);?>
<!--                                                <img class="scale-with-grid" src="content/blogger2/images/home_blogger2_staff4.jpg" alt="" width="272" height="281" />-->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- One Third (1/3) Column -->
                                    <div class="column mcb-column one-third column_column">
                                        <div class="column_attr">
                                            <h4>Jennifer Lee</h4>
                                            <p>
                                                Lorem ipsum dolor sit amet enim. Etiam ullamcorper. Suspendisse a pellentesque dui, non felis. Maecenas malesuada elit
                                            </p>
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

    <!-- JS -->
    <script src="js/jquery-2.1.4.min.js"></script>

    <script src="js/mfn.menu.js"></script>
    <script src="js/jquery.plugins.js"></script>
    <script src="js/jquery.jplayer.min.js"></script>
    <script src="js/animations/animations.js"></script>
    <script src="js/scripts.js"></script>

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
</body>
