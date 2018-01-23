<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use frontend\models\Category;
use frontend\assets\HomePageAsset;

HomePageAsset::register($this);

/* @var $this yii\web\View */
/* @var $model frontend\models\Campaign */

$this->title = $model->c_id;
$this->params['breadcrumbs'][] = ['label' => 'Campaigns', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
frontend\assets\HomePageAsset::register($this);
?>
<div class="campaign-view">
    <!-- Main Content -->
    <div id="Content">
        <div class="content_wrapper clearfix">
            <div class="sections_group" style="width: 63%;float: left; margin-left: 8.5%">
                <div id=" " class="no-title no-share  post  format-standard has-post-thumbnail  category-hot-news   ">
                    <div class="section section-post-header">
                        <div class="section_wrapper clearfix">
                            <!-- Posts Navigation -->
                            <!-- One full width row-->
                            <div class="column one post-nav">
                                <a class="list-nav" href="<?= Url::to(['campaign/show','id'=>'NULL'])?>"><i class="icon-layout"></i>Show all</a>
                            </div>
                            <!-- Post Header-->
                            <!-- One full width row-->
                            <div class="column one post-header">
                                <div class="button-love">
                                    <a href="#" class="mfn-love " data-id="2269"><span class="icons-wrapper"><i class="icon-heart-empty-fa"></i><i class="icon-heart-fa"></i></span><span class="label">138</span></a>
                                </div>
                                <div class="title_wrapper">
                                    <div class="post-meta clearfix">
                                        <div class="author-date">
                                            <span class="vcard author post-author"> Published by <i class="icon-user"></i> <span class="fn"><a href="#"><?=$model->cAuthor->username?></a></span> </span><span class="date"> at <i class="icon-clock"></i>
														<time class="entry-date" datetime="2014-03-12T09:15:13+00:00" itemprop="datePublished" pubdate>
															<?=$model->c_created_at?>
														</time> </span>
                                        </div>
                                        <div class="category meta-categories">
                                            <span class="cat-btn">Categories <i class="icon-down-dir"></i></span>
                                            <div class="cat-wrapper">
                                                <ul class="post-categories">
                                                    <?php foreach ($categories as $category) {?>
                                                        <li>
                                                            <a rel="category tag" href="<?= Url::to(['campaign/show', 'id'=>$category->id])?>"><?= $category->name?></a>
                                                        </li>
                                                    <?php }?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Post Featured Element (image / video / gallery)-->
                            <!-- One full width row-->
                            <div class="column one single-photo-wrapper image">
                                <div class="image_frame scale-with-grid ">
                                    <div class="image_wrapper">
                                        <a href="#" rel="prettyphoto">
                                            <div class="mask"></div>
                                            <?=Html::img(Url::to('@web/images/uploads/'.$model->c_image),['class' => 'attachment-blog-navi size-blog-navi wp-post-image'],['alt'=>'Image'],['align'=>'left'],['width'=>'80'],['height'=>'80'])?>
                                            <!--                                                <img width="1200" height="480" src="images/home_blogger2_hotnews-1200x480.jpg" class="scale-with-grid wp-post-image" alt="home_blogger2_hotnews" itemprop="image" />-->
                                        </a>
                                        <div class="image_links">
                                            <a href="<?= Url::to(['campaign/fund'])?>" class="link"><i class="icon-link"></i></a>
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
                                    <h5><?=$model->c_description?></h5>
                                    <hr class="no_line" style="margin: 0 auto 15px;" />
                                    <h3>Description</h3>
                                    <hr class="no_line" style="margin: 0 auto 15px;" />
                                    <p><?=$model->c_description_long?></p>
                                    <hr class="no_line" style="margin: 0 auto 15px;" />
                                    <div class="mcb-column one-second column_tabs ">
                                        <div class="jq-tabs tabs_wrapper tabs_horizontal ui-tabs ui-widget ui-widget-content ui-corner-all">
                                            <ul class ="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all" role="tablist">
                                                <li class="ui-state-default ui-corner-top ui-tabs-active ui-state-active" role="tab" tabindex="0" aria-controls="tab-5a5ff9210758e-1" aria-labelledby="ui-id-1" aria-selected="true" aria-expanded="true">
                                                    <a href="#-1v" class="ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-1">Commodo luctus</a>
                                                </li>
                                                <li class="ui-state-default ui-corner-top" role="tab">
                                                    <a href="#-2v">Eget lacina</a>
                                                </li>
                                                <li class="ui-state-default ui-corner-top" role="tab">
                                                    <a href="#-3v">Porta gravida</a>
                                                </li>
                                            </ul>
                                            <div id="-1v" class="ui-tabs-panel ui-widget-content ui-corner-bottom">
                                                <p>
                                                    <span class="big">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce velit tortor, dictum in gravida nec, aliquet non lorem. </span>
                                                </p>
                                                <p>
                                                    Donec vestibulum justo a diam ultricies pellentesque. Quisque mattis diam vel lacus tincidunt elementum. Sed vitae adipiscing turpis. Aenean ligula nibh, molestie id viverra a, dapibus at dolor. In iaculis viverra neque, ac eleifend ante lobortis id. In viverra ipsum ac eros tristique dignissim. Donec aliquam velit vitae mi dictum.
                                                </p>
                                            </div>
                                            <div id="-2v" class="ui-tabs-panel ui-widget-content ui-corner-bottom">
                                                <p>
                                                    <span class="big">Curabitur et ligula. Ut molestie a, ultricies porta urna. Vestibulum commodo volutpat a, convallis ac, laoreet enim. Phasellus fermentum in, dolor.</span>
                                                </p>
                                                <p>
                                                    Donec vestibulum justo a diam ultricies pellentesque. Quisque mattis diam vel lacus tincidunt elementum. Sed vitae adipiscing turpis. Aenean ligula nibh, molestie id viverra a, dapibus at dolor. In iaculis viverra neque, ac eleifend ante lobortis id.
                                                </p>
                                            </div>
                                            <div id="-3v" class="ui-tabs-panel ui-widget-content ui-corner-bottom">
                                                <p>
                                                    <span class="big">Lorem ipsum dolor sit amet enim. Etiam ullamcorper. Suspendisse a pellentesque dui, non felis. Maecenas malesuada elit lectus felis, malesuada ultricies.</span>
                                                </p>
                                                <p>
                                                    Donec vestibulum justo a diam ultricies pellentesque. Quisque mattis diam vel lacus tincidunt elementum. Sed vitae adipiscing turpis. Aenean ligula nibh, molestie id viverra a, dapibus at dolor. In iaculis viverra neque, ac eleifend ante lobortis id. In viverra ipsum ac eros tristique dignissim. Donec aliquam velit vitae mi dictum.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--                            <div class="mcb-column one-second column_tabs ">
                                                                <div class="jq-tabs tabs_wrapper tabs_horizontal ui-tabs ui-widget ui-widget-content ui-corner-all">
                                                                    <ul class ="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all" role="tablist">
                                                                        <li class="ui-state-default ui-corner-top ui-tabs-active ui-state-active" role="tab">
                                                                            <a href="#-1v">Commodo luctus</a>
                                                                        </li>
                                                                        <li class="ui-state-default ui-corner-top" role="tab">
                                                                            <a href="#-2v">Eget lacina</a>
                                                                        </li>
                                                                        <li class="ui-state-default ui-corner-top">
                                                                            <a href="#-3v">Porta gravida</a>
                                                                        </li>
                                                                    </ul>
                                                                    <div id="-1v">
                                                                        <p>
                                                                            <span class="big">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce velit tortor, dictum in gravida nec, aliquet non lorem. </span>
                                                                        </p>
                                                                        <p>
                                                                            Donec vestibulum justo a diam ultricies pellentesque. Quisque mattis diam vel lacus tincidunt elementum. Sed vitae adipiscing turpis. Aenean ligula nibh, molestie id viverra a, dapibus at dolor. In iaculis viverra neque, ac eleifend ante lobortis id. In viverra ipsum ac eros tristique dignissim. Donec aliquam velit vitae mi dictum.
                                                                        </p>
                                                                    </div>
                                                                    <div id="-2v">
                                                                        <p>
                                                                            <span class="big">Curabitur et ligula. Ut molestie a, ultricies porta urna. Vestibulum commodo volutpat a, convallis ac, laoreet enim. Phasellus fermentum in, dolor.</span>
                                                                        </p>
                                                                        <p>
                                                                            Donec vestibulum justo a diam ultricies pellentesque. Quisque mattis diam vel lacus tincidunt elementum. Sed vitae adipiscing turpis. Aenean ligula nibh, molestie id viverra a, dapibus at dolor. In iaculis viverra neque, ac eleifend ante lobortis id.
                                                                        </p>
                                                                    </div>
                                                                    <div id="-3v">
                                                                        <p>
                                                                            <span class="big">Lorem ipsum dolor sit amet enim. Etiam ullamcorper. Suspendisse a pellentesque dui, non felis. Maecenas malesuada elit lectus felis, malesuada ultricies.</span>
                                                                        </p>
                                                                        <p>
                                                                            Donec vestibulum justo a diam ultricies pellentesque. Quisque mattis diam vel lacus tincidunt elementum. Sed vitae adipiscing turpis. Aenean ligula nibh, molestie id viverra a, dapibus at dolor. In iaculis viverra neque, ac eleifend ante lobortis id. In viverra ipsum ac eros tristique dignissim. Donec aliquam velit vitae mi dictum.
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>-->
                        <!--                            <div class="section section-post-footer">
                                                        <div class="section_wrapper clearfix">
                                                             One full width row
                                                            <div class="column one post-pager">
                                                                 Navigation Area
                                                                <div class="pager-single">
                                                                    <span>1</span><a href="#"><span>2</span></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>-->
                        <!--                            Author Info Area
                                                    <div class="section section-post-about">
                                                        <div class="section_wrapper clearfix">
                                                             One full width row
                                                            <div class="column one author-box">
                                                                <div class="author-box-wrapper">
                                                                    <div class="avatar-wrapper">
                                                                        <img alt='Muffin Group' src='http://0.gravatar.com/avatar/057e2eb392b95a2ecfc9d32d554e3917?s=64&amp;d=mm&amp;r=g' class='avatar avatar-64 photo' height='64' width='64' />
                                                                    </div>
                                                                    <div class="desc-wrapper">
                                                                        <h5><a href="#">Muffin Group</a></h5>
                                                                        <div class="desc">
                                                                            Praesent ligula ipsum, bibendum in quam ac, pellentesque ornare elit. Cras egestas lectus enim, et rutrum nunc tempor vulputate. Curabitur massa nunc. Aenean a nunc id justo tempor.
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>-->
                    </div>
                    <!-- Related posts area-->
                    <!--                        <div class="section section-post-related">
                                                <div class="section_wrapper clearfix"></div>
                                            </div>-->
                    <!-- Comments area-->
                    <!--                        <div class="section section-post-comments">
                                                <div class="section_wrapper clearfix">
                                                     One full width row
                                                    <div class="column one comments">
                                                        <div id="comments">
                                                            <h4 id="comments-title"> 4 Comments</h4>
                                                            <ol class="commentlist">
                                                                <li class="comment byuser comment-author-admin bypostauthor even thread-even depth-1 parent" id="comment-2">
                                                                    <div id="div-comment-2" class="comment-body">
                                                                        <div class="comment-author vcard">
                                                                            <img alt='' src='http://0.gravatar.com/avatar/057e2eb392b95a2ecfc9d32d554e3917?s=64&amp;d=mm&amp;r=g' class='avatar avatar-64 photo' height='64' width='64' /><cite class="fn">admin</cite><span class="says">says:</span>
                                                                        </div>
                                                                        <div class="comment-meta commentmetadata">
                                                                            <a href="item-1.html#comment-2"> November 17, 2014 at 11:23 am</a>
                                                                        </div>
                                                                        <p>
                                                                            Donec vestibulum justo a diam ultricies pellentesque. Quisque mattis diam vel lacus tincidunt eleme ntum. Sed vitae adipiscing turpis. Aenean ligula nibh, molestie id viverrra.
                                                                        </p>
                                                                    </div>
                                                                    <ul class="children">
                                                                        <li class="comment byuser comment-author-admin bypostauthor odd alt depth-2 parent" id="comment-3">
                                                                            <div id="div-comment-3" class="comment-body">
                                                                                <div class="comment-author vcard">
                                                                                    <img alt='' src='http://0.gravatar.com/avatar/057e2eb392b95a2ecfc9d32d554e3917?s=64&amp;d=mm&amp;r=g' class='avatar avatar-64 photo' height='64' width='64' /><cite class="fn">admin</cite><span class="says">says:</span>
                                                                                </div>
                                                                                <div class="comment-meta commentmetadata">
                                                                                    <a href="item-1.html#comment-3"> November 17, 2014 at 11:24 am</a>
                                                                                </div>
                                                                                <p>
                                                                                    Vitae adipiscing turpis. Aenean ligula nibh, molestie id viverra a, dapibus at dolor. In iaculis viverra neque, ac ele molestie id viverra aifend ante lobortis id. In viverra ipsum stie id viverra a.
                                                                                </p>
                                                                            </div>
                                                                            <ul class="children">
                                                                                <li class="comment byuser comment-author-admin bypostauthor even depth-3" id="comment-4">
                                                                                    <div id="div-comment-4" class="comment-body">
                                                                                        <div class="comment-author vcard">
                                                                                            <img alt='' src='http://0.gravatar.com/avatar/057e2eb392b95a2ecfc9d32d554e3917?s=64&amp;d=mm&amp;r=g' class='avatar avatar-64 photo' height='64' width='64' /><cite class="fn">admin</cite><span class="says">says:</span>
                                                                                        </div>
                                                                                        <div class="comment-meta commentmetadata">
                                                                                            <a href="item-1.html#comment-4"> November 17, 2014 at 11:24 am</a>
                                                                                        </div>
                                                                                        <p>
                                                                                            Donec vestibulum justo a diam ultricies pellentesque. Quisque mattis diam vel lacus tincidunt eleme ntum. Sed vitae adipiscing turpis. Aenean ligula nibh, molestie id viverrra.
                                                                                        </p>
                                                                                    </div>
                                                                                </li>
                                                                            </ul>
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                                <li class="comment byuser comment-author-admin bypostauthor odd alt thread-odd thread-alt depth-1" id="comment-5">
                                                                    <div id="div-comment-5" class="comment-body">
                                                                        <div class="comment-author vcard">
                                                                            <img alt='' src='http://0.gravatar.com/avatar/057e2eb392b95a2ecfc9d32d554e3917?s=64&amp;d=mm&amp;r=g' class='avatar avatar-64 photo' height='64' width='64' /><cite class="fn">admin</cite><span class="says">says:</span>
                                                                        </div>
                                                                        <div class="comment-meta commentmetadata">
                                                                            <a href="item-1.html#comment-5"> November 17, 2014 at 11:24 am</a>
                                                                        </div>
                                                                        <p>
                                                                            Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis. Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat.
                                                                        </p>
                                                                    </div>
                                                                </li>
                                                            </ol>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>-->
                </div>
            </div>
            <!-- Sidebar area-->
            <div class="sidebar sidebar-1 four columns" style="width: 24%;float: right">
                <div class="widget-area clearfix ">
                    <!-- Search form-->
                    <aside id="search-2" class="widget widget_search">
                        <h3>Search</h3>
                        <form method="get" id="searchform" action="#">
                            <i class="icon_search icon-search"></i><a href="#" class="icon_close"><i class="icon-cancel"></i></a>
                            <input type="text" class="field" name="s" id="s" placeholder="Enter your search" />
                            <input type="submit" class="submit" value="" style="display:none;" />
                        </form>
                    </aside>
                    <!-- Text Area -->
                    <!--                        <aside class="widget widget_text">
                                                <h3>About us</h3>
                                                <div class="textwidget">
                                                    Mauris imperdiet, urna mi, gravida sod ales. <span class="tooltip tooltip-txt" data-tooltip="Donec nisl ac turpis">Vivamus hendrerit</span> nulla erat ornare tortor in vestibulum id.
                                                </div>
                                            </aside>-->
                    <!-- Categories Area -->
                    <aside id="categories-2" class="widget widget_categories">
                        <h3>Categories</h3>
                        <ul>
                            <?php foreach ($categories as $category) {?>
                                <li class="cat-item cat-item-4">
                                    <a href="<?= Url::to(['campaign/show', 'id'=>$category->id])?>"><?=$category->name?></a>
                                </li>
                            <?php }?>
                            <!--                                <li class="cat-item cat-item-11">
                                                                <a href="category-page.html">Lifestyle</a>
                                                            </li>
                                                            <li class="cat-item cat-item-13">
                                                                <a href="category-page.html">News</a>
                                                            </li>
                                                            <li class="cat-item cat-item-14">
                                                                <a href="category-page.html">Places</a>
                                                            </li>-->
                        </ul>
                    </aside>
                    <!-- Archives Area -->
                    <!--                        <aside id="archives-2" class="widget widget_archive">
                                                <h3>Archives</h3>
                                                <label class="screen-reader-text" for="archives-dropdown-2">Archives</label>
                                                <select id="archives-dropdown-2" name="archive-dropdown" onchange='document.location.href=this.options[this.selectedIndex].value;'>
                                                    <option value="">Select Month</option>
                                                    <option value='#'> May 2014</option>
                                                    <option value='#'> April 2014</option>
                                                    <option value='#'> March 2014</option>
                                                </select>
                                            </aside>-->
                    <!-- Recent posts -->
                    <aside class="widget widget_mfn_recent_posts">
                        <h3>Latest posts</h3>
                        <div class="Recent_posts">
                            <ul>
                                <li class="post ">
                                    <a href="item-8.html">
                                        <div class="photo"><img width="80" height="80" src="images/home_blogger2_lifestyle1-80x80.jpg" class="scale-with-grid wp-post-image" alt="home_blogger2_lifestyle1" />
                                        </div>
                                        <div class="desc">
                                            <h6>Vestibulum commodo volutpat laoreet</h6><span class="date"><i class="icon-clock"></i>May 8, 2014</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="post ">
                                    <a href="item-9.html">
                                        <div class="photo"><img width="80" height="80" src="images/home_blogger2_lifestyle2-80x80.jpg" class="scale-with-grid wp-post-image" alt="home_blogger2_lifestyle2" />
                                        </div>
                                        <div class="desc">
                                            <h6>Quisque lorem tortor fringilla sed vesti</h6><span class="date"><i class="icon-clock"></i>May 7, 2014</span>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    jQuery(window).load(function() {
        jQuery(".jq-tabs").tabs();

        var retina = window.devicePixelRatio > 1 ? true : false;
        if (retina) {
            var retinaEl = jQuery("#logo img");
            var retinaLogoW = retinaEl.width();
            var retinaLogoH = retinaEl.height();
            retinaEl.attr("src", "images/logo-retina.png").width(retinaLogoW).height(retinaLogoH)
        }
    });
</script>

</body>
<!--<div class="campaign-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->c_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->c_id], [
    'class' => 'btn btn-danger',
    'data' => [
        'confirm' => 'Are you sure you want to delete this item?',
        'method' => 'post',
    ],
]) ?>
    </p>

    <?= DetailView::widget([
    'model' => $model,
    'attributes' => [
        'c_title',
        'c_image',
        'c_description',
        'c_start_date',
        'c_end_date',
        'c_goal',
        'c_id',
        'c_video:ntext',
        'c_description_long:ntext',
        'c_author',
        'c_created_at',
        'c_display_name',
        'c_email:email',
        'c_location',
        'c_biography:ntext',
        'c_social_profile',
        'c_status',
        'c_cat_id',
    ],
]) ?>
