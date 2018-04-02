<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use frontend\models\Category;
use frontend\assets\HomePageAsset;
use frontend\models\Fund;

/*HomePageAsset::register($this);*/

/* @var $this yii\web\View */
/* @var $model frontend\models\Campaign */

$this->title = 'All Campaigns - GoRaisin';
$this->params['breadcrumbs'][] = ['label' => 'Campaigns', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

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
                                <li class="categories">
                                    <a class="open" href="#"
                                       style="text-decoration: none;font-weight: 500;font-size: 17px;color: #878787"><i
                                                class="glyphicon glyphicon-filter"></i> Categories</a>
                                </li>
                                <li class="reset">
                                    <a class="close" data-rel="*"
                                       href="<?= Url::to(['campaign/show', 'id' => 'NULL']) ?>"
                                       style="font-size: 17px;color: #616161;font-weight: 500"><i
                                                class="glyphicon glyphicon-th-large"></i>&nbsp;Show all</a>
                                </li>
                            </ul>
                            <div class="filters_wrapper">
                                <ul class="categories">
                                    <li class="reset-inner">
                                        <a data-rel="*" href="<?= Url::to(['campaign/show', 'id' => 'NULL']) ?>">All</a>
                                    </li>
                                    <?php foreach ($categories as $category) { ?>
                                        <li>
                                            <a data-rel=".category-hot-news"
                                               href="<?= Url::to(['campaign/show', 'id' => $category->id]) ?>"><?= $category->name ?></a>
                                        </li>
                                    <?php } ?>
                                    <li class="close">
                                        <a href="#" style="width: 10%"><i class="glyphicon glyphicon-remove"
                                                                          style="font-size: 15px;padding: 2%"></i></a>
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
                                        $backed = Fund::find()->where(['fund_c_id' => $campaign->c_id])->sum('fund_amt');
                                        $progress = 0;
                                        if ($backed != 0) {
                                            $progress = floor(($backed / $campaign->c_goal) * 100);
                                        }
                                        ?>
                                        <div class="post-item isotope-item clearfix post-2277 post  format-standard has-post-thumbnail  category-lifestyle  tag-video">
                                            <div class="date_label">
                                                <?= $campaign->c_created_at ?>
                                            </div>
                                            <div class="image_frame post-photo-wrapper scale-with-grid">
                                                <div class="image_wrapper">
                                                    <a href="<?= Url::to(['campaign/view', 'id' => $campaign->c_id]) ?>">
                                                        <div class="mask"></div>
                                                        <?= Html::img(Url::to('@web/images/uploads/campaign/' . $campaign->c_image), ['class' => 'scale-with-grid wp-post-image'], ['alt' => 'Image'], ['align' => 'left'], ['width' => '1200'], ['height' => '480']) ?>
                                                    </a>
                                                    <div class="image_links single">
                                                        <a href="<?= Url::to(['campaign/view', 'id' => $campaign->c_id]) ?>"
                                                           class="zoom"><i class="glyphicon glyphicon-eye-open"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="post-desc-wrapper">
                                                <div class="post-desc">
                                                    <div class="post-head">
                                                        <div class="post-meta clearfix">
                                                            <div class="author-date">
                                                                <span class="vcard author post-author"><span
                                                                            class="label"
                                                                            style="color: #adadad;font-size: 12px">Published by </span>&nbsp&nbsp<i
                                                                            class="glyphicon glyphicon-user"></i>&nbsp;<span
                                                                            class="fn"><?= Html::a($campaign->cAuthor->username, ['myintroduction', 'id' => $campaign->c_id], ['target' => '_blank']) ?></span></span><span
                                                                        class="date"><span class="label">at </span><i
                                                                            class="glyphicon glyphicon-time"></i> <span
                                                                            class="post-date updated"><?= $campaign->c_created_at ?></span></span>
                                                            </div>
                                                            <div class="category">
                                                                <p style="color: #337ab7;font-weight: 500"><i
                                                                            class="glyphicon glyphicon-tag"
                                                                            style="color: #337ab7"></i>&nbsp<?= $campaign->cCat->name ?>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="post-title">
                                                        <h2 class="entry-title" itemprop="headline"><a
                                                                    href="<?= Url::to(['campaign/view', 'id' => $campaign->c_id]) ?>"><?= $campaign->c_title ?></a>
                                                        </h2>
                                                    </div>
                                                    <div class="post-excerpt">
                                                        <p class="big"><?= $campaign->c_description ?>
                                                        </p>
                                                    </div>
                                                    <div class="post-footer">
                                                        <div class="progress">
                                                            <div class="progress-bar" role="progressbar"
                                                                 aria-valuemin="0" aria-valuemax="100"
                                                                 style="width:<?= $progress ?>%; background-color:#7d109152; color: black"><b><?= $progress ?>%</b>
                                                            </div>
                                                        </div>
                                                        <div class="post-links">
                                                            <i class="glyphicon glyphicon-link"
                                                               style="color: #337ab7"></i>&nbsp<a
                                                                    href="<?= Url::to(['campaign/view', 'id' => $campaign->c_id]) ?>"
                                                                    class="post-more">Read more</a>
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
                                            <a href="blog.html" class="page active">1</a><a href="#"
                                                                                            class="page">2</a><a
                                                    href="#" class="page">3</a>
                                        </div>
                                        <a class="next_page" href="#">Next page<i class="icon-right-open"></i></a>
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
    jQuery(window).load(function () {
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