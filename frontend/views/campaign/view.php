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
frontend\assets\RoadmapAsset::register($this);
?>
<div class="campaign-view">
    <!-- Main Content -->
    <div id="Content" style="padding: 0px">
        <div class="content_wrapper clearfix">
            <div class="sidebar sidebar-1 four columns" style="width: 0%;float: left; margin-left: 8.9%; border-right: .5px solid #f0f0f0; padding-top: 4%">
                    <div class="image-div">
                        <div class="user-image" style="width: 35px; height: 42px">
                        <?=Html::img(Url::to('@web/'.$model->cAuthor->image))?>
                        </div>
                        <div class="image-div2">
                            <p class="user-name"><?=$model->cAuthor->username?></p>
                        </div>
                    </div>
            </div>
            <div class="sections_group" style="width: 85%;float: right; margin-right: 4%;">
            <div style="margin-right: 8%; margin-left: 8%; border-right: .5px solid #f0f0f0; padding-top: 2%">
                <div class="column zero">
                    <h1 class="title" style="color: #6b0d7ce8"><?=$model->c_title?></h1>
                    <p class="" style="font-size: 18px;"><?=$model->c_description?></p>
                </div>
            </div>
            </div>
            <div class="sections_group" style="width: 55%;float: left; margin-left: 8%; border-right: .5px solid #f0f0f0">
                <div id=" " class="no-title no-share  post  format-standard has-post-thumbnail  category-hot-news   ">
                    <div class="section section-post-header">
                        <div class="section_wrapper clearfix">
                            <!-- Post Featured Element (image / video / gallery)-->
                            <!-- One full width row-->
                            <div class="column one single-photo-wrapper image" style="margin-top: 0px; margin-right: 0%; margin-bottom: 0px; margin-left: 0%">
                                <div class="image_frame scale-with-grid ">
                                    <div class="image_wrapper">
                                        <a href="#" rel="prettyphoto">
                                            <div class="mask"></div>
                                            <?=Html::img(Url::to('@web/images/uploads/'.$model->c_image),['class' => 'attachment-blog-navi size-blog-navi wp-post-image'],['alt'=>'Image'],['align'=>'left'],['width'=>'80'],['height'=>'80'])?>
                                        </a>
                                        <div class="image_links">
                                            <a href="<?= Url::to(['campaign/fund'])?>" class="link"><i class="icon-link"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Post Header-->
                            <!-- One full width row-->
                            <div class="column one post-header">
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
        'content'=>$this->render('campaign_roadmap',['roadmap'=>$roadmap]),
        //'linkOptions'=>['data-url'=>\yii\helpers\Url::to(['/campaign/form'])]
    ],
    [
        'label'=>'<i class="glyphicon glyphicon-comment"></i> Comments',
        'content'=>$this->render('campaign_comments'),
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
            <div class="sidebar sidebar-1 four columns" style="width: 29%;float: left; margin-right: 4%;">
                <div class="widget-area clearfix" style="padding: 9px 0px 0px;">
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:70%; background-color:#6b0d7ce8">70%
                        </div>
                    </div>
                    <h3 style="margin-top:25px; margin-bottom:0px;">U$S 70</h3>
                    <h3 class="title-price" style="margin-top:0px;"><small>pledged of U$S<?=$model->c_goal?> goal</small></h3>
                    
                    <h3 style="margin-top:25px; margin-bottom:0px;">199</h3>
                    <h3 class="title-price" style="margin-top:0px;"><small>backers</small></h3>

                    <h3 style="margin-top:25px; margin-bottom:0px;">22</h3>
                    <h3 class="title-price" style="margin-top:0px;"><small>days to go</small></h3>
                    
                    <div class="section" style="margin-top:25px; padding-bottom:20px;">
                        <a href="<?= Url::to(['campaign/fund']) ?>">
                        <button class="btn btn-default" style="width:100%; background-color:#6b0d7ce8; color: white"><h4><span style="margin-right:20px" class="glyphicon glyphicon-gift" aria-hidden="true"></span>Fund this Campaign</h4></button>
                        </a>
                    </div>
                    <div class="section" style="padding-bottom:20px;">
                        <h6><a href="#"><span class="glyphicon glyphicon-heart-empty" style="cursor:pointer;"></span> All or nothing. This project will only be funded if it reaches its goal by <?=$model->c_end_date?>.</a></h6>
                    </div>                                         
<!--                </div>-->
                </div>
            </div>
        </div>
    </div>
</div>
</body>