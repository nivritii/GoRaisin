<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use frontend\models\Category;
use frontend\assets\HomePageAsset;
use yii\widgets\ListView;
use kartik\tabs\TabsX;

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
        <div style="margin-right: 8%; margin-left: 8%; border-right: .5px solid #f0f0f0; padding-bottom: 0%; padding-top: 0%">
            <div class="column zero">
                <h1 class="title"><?=$model->c_title?></h1>
                <h4 class="title"><?=$model->c_description?></h4>
            </div>
        </div>
        <div class="content_wrapper clearfix">
            <div class="sections_group" style="width: 55%;float: left; margin-left: 8%; border-right: .5px solid #f0f0f0">
                <div id=" " class="no-title no-share  post  format-standard has-post-thumbnail  category-hot-news   ">
                    <div class="section section-post-header">
                        <div class="section_wrapper clearfix">
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
                                                        <li>
                                                            <a rel="category tag" href="<?= Url::to(['campaign/show', 'id'=>'NULL'])?>">Show all</a>
                                                        </li>
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
                                    <div class="mcb-column one-second column_tabs ">
<?php
$items = [
    [
        'label'=>'<i class="glyphicon glyphicon-picture"></i> Story',
        'content'=>$this->render('campaign_content',['model' => $model]),
        'active'=>true
    ],
    [
        'label'=>'<i class="glyphicon glyphicon-bell"></i> Updates',
        'content'=>"Roadmap!",
        //'linkOptions'=>['data-url'=>\yii\helpers\Url::to(['/campaign/form'])]
    ],
    [
        'label'=>'<i class="glyphicon glyphicon-comment"></i> Comments',
        'content'=>$this->render('campaign_comments'),
    ],
    [
        'label'=>'<i class="glyphicon glyphicon-user"></i> Community',
        'content'=>"No of backers",
    ],
    [
        'label'=>'<i class="glyphicon glyphicon-question-sign"></i> FAQ',
        'content'=>"Questions",
    ],
];

// Tab Below Centered
echo TabsX::widget([
    'items'=>$items,
    'position'=>TabsX::POS_ABOVE,
    'align'=>TabsX::ALIGN_CENTER,
    'bordered'=>false,
    'encodeLabels'=>false
]);
                                        
?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sidebar area-->
            <div class="sidebar sidebar-1 four columns" style="width: 25%;float: left; margin-right: 8%;">
                <div class="widget-area clearfix ">
                    <!-- Search form-->
                    <aside id="search-2" class="widget widget_search">
                        <h3>Search</h3>
<!--                        <form method="get" id="searchform" action="#">
                            <i class="icon_search icon-search"></i><a href="#" class="icon_close"><i class="icon-cancel"></i></a>
                            <input type="text" class="field" name="s" id="s" placeholder="Enter your search" />
                            <input type="submit" class="submit" value="" style="display:none;" />
                        </form>-->
                    </aside>
                    <!-- Text Area -->
                    <!--                        <aside class="widget widget_text">
                                                <h3>About us</h3>
                                                <div class="textwidget">
                                                    Mauris imperdiet, urna mi, gravida sod ales. <span class="tooltip tooltip-txt" data-tooltip="Donec nisl ac turpis">Vivamus hendrerit</span> nulla erat ornare tortor in vestibulum id.
                                                </div>
                                            </aside>-->
                    <!-- Categories Area -->
<!--                    <aside id="categories-2" class="widget widget_categories">
                        <h3>Categories</h3>
                        <ul>
                            <?php foreach ($categories as $category) {?>
                                <li class="cat-item cat-item-4">
                                    <a href="<?= Url::to(['campaign/show', 'id'=>$category->id])?>"><?=$category->name?></a>
                                </li>
                            <?php }?>
                                                            <li class="cat-item cat-item-11">
                                                                <a href="category-page.html">Lifestyle</a>
                                                            </li>
                                                            <li class="cat-item cat-item-13">
                                                                <a href="category-page.html">News</a>
                                                            </li>
                                                            <li class="cat-item cat-item-14">
                                                                <a href="category-page.html">Places</a>
                                                            </li>
                        </ul>
                    </aside>-->
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
<!--                    <aside class="widget widget_mfn_recent_posts">
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
                    </aside>-->
                </div>
            </div>
        </div>
    </div>
</div>
</body>
