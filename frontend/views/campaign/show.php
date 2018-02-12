<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use frontend\models\Category;
use frontend\assets\HomePageAsset;
use frontend\models\Fund;

HomePageAsset::register($this);

/* @var $this yii\web\View */
/* @var $model frontend\models\Campaign */

$this->title = 'All Campaigns';
$this->params['breadcrumbs'][] = ['label' => 'Campaigns', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
    <!-- Main Theme Wrapper -->
    <div class="campaign-show">
        <!-- Main Content -->
        <div id="Content" style="padding: 0px">
            <div class="content_wrapper clearfix">
                <div class="sections_group">
                    <div class="extra_content">
                        <div class="section the_content no_content">
                            <div class="section_wrapper">
                                <div class="the_content_wrapper"></div>
                            </div>
                        </div>
                    </div>
                    <!-- Portfolio filters -->
                    <div class="section section-filters">
                        <div class="section_wrapper clearfix">
                            <!--  Filter Area -->
                            <div id="Filters" class="column one ">
                                <ul class="filters_buttons">
                                    <li class="label">
                                        Filter by
                                    </li>
                                    <li class="categories">
                                        <a class="open" href="#"><i class="icon-docs"></i>Categories<i class="icon-down-dir"></i></a>
                                    </li>
                                    <li class="reset">
                                        <a class="close" data-rel="*" href="<?= Url::to(['campaign/show', 'id'=>'NULL'])?>"><i class="icon-cancel"></i>Show all</a>
                                    </li>
                                </ul>
                                <div class="filters_wrapper">
                                    <ul class="categories">
                                        <li class="reset-inner">
                                            <a data-rel="*" href="<?= Url::to(['campaign/show', 'id'=>'NULL'])?>">All</a>
                                        </li>
                                        <?php foreach ($categories as $category) {?>
                                        <li>
                                            <a data-rel=".category-hot-news" href="<?= Url::to(['campaign/show', 'id'=>$category->id])?>"><?=$category->name?></a>
                                        </li>
                                        <?php }?>
                                        <li class="close">
                                            <a href="#"><i class="icon-cancel"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="section">
                        <div class="section_wrapper clearfix">
                            <!-- One full width row-->
                            <div class="column one column_blog">
                                <div class="blog_wrapper isotope_wrapper">
                                    <div class="posts_group lm_wrapper classic col-3">
                                        <?php foreach ($model as $campaign) {
                                            $backed = Fund::find()->where(['fund_c_id'=>$campaign->c_id])->sum('fund_amt');
                                            $progress = 0;
                                            if($backed!=0){
                                                $progress = ($backed/$campaign->c_goal)*100;
                                            }
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
                                                            <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?=$progress?>%; background-color:#8f13a5f0"><?=$progress?>%
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
                                    <!-- One full width row-->
                                    <div class="column one pager_wrapper">
                                        <!-- Navigation Area -->
                                        <div class="pager">
                                            <div class="pages">
                                                <a href="blog.html" class="page active">1</a><a href="#" class="page">2</a><a href="#" class="page">3</a>
                                            </div><a class="next_page" href="#">Next page<i class="icon-right-open"></i></a>
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
    
    <!-- JS -->
    <script src="../../js/jquery-2.1.4.min.js"></script>

    <script src="../../js/mfn.menu.js"></script>
    <script src="../../js/jquery.plugins.js"></script>
    <script src="../../js/jquery.jplayer.min.js"></script>
    <script src="../../js/animations/animations.js"></script>
    <script src="../../js/translate3d.js"></script>
    <script src="../../js/scripts.js"></script>

    <script>
        jQuery(window).load(function() {
            var retina = window.devicePixelRatio > 1 ? true : false;
            if (retina) {
                var retinaEl = jQuery("#logo img.logo-main");
                var retinaLogoW = retinaEl.width();
                var retinaLogoH = retinaEl.height();
                retinaEl.attr("src", "images/retina-blogger2.png").width(retinaLogoW).height(retinaLogoH);
                var stickyEl = jQuery("#logo img.logo-sticky");
                var stickyLogoW = stickyEl.width();
                var stickyLogoH = stickyEl.height();
                stickyEl.attr("src", "images/retina-blogger2.png").width(stickyLogoW).height(stickyLogoH);
                var mobileEl = jQuery("#logo img.logo-mobile");
                var mobileLogoW = mobileEl.width();
                var mobileLogoH = mobileEl.height();
                mobileEl.attr("src", "images/retina-blogger2.png").width(mobileLogoW).height(mobileLogoH);
            }
        });
    </script>

</html>
    </body>