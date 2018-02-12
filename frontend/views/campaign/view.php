<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use frontend\models\Category;
use frontend\assets\HomePageAsset;
use yii\widgets\ListView;
use kartik\tabs\TabsX;
use frontend\models\User;

/*HomePageAsset::register($this);*/

/* @var $this yii\web\View */
/* @var $model frontend\models\Campaign */

$this->title = $model->c_title.' - GoRaisin';
$this->params['breadcrumbs'][] = ['label' => 'Campaigns', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
/*frontend\assets\HomePageAsset::register($this);*/
frontend\assets\RoadmapAsset::register($this);
?>
<div class="campaign-view">
    <!-- Main Content -->
    <div id="Content" style="padding: 0px">
        <div class="content_wrapper clearfix">
            <!--<div class="sidebar sidebar-1 four columns" style="width: 0%;float: left; margin-left: 9%; border-right: .5px solid #f0f0f0; padding-top: 4%">
                <div style="padding-left: 20%">
                    <div style="width: 35px; height: 42px;margin-left: 10%">
                        <?/*= Html::img('@web/'.$model->cAuthor->image,['style' => 'margin-left:55%']) */?>
                        <?/*=Html::img(Url::to('@web/'.$model->cAuthor->image))*/?>
                    </div>
                    <p style="margin-left: 55%"><?/*=$model->cAuthor->username*/?></p>
                </div>
            </div>-->
            <div class="sections_group" style="width: 55%;float: left;margin-left: 10%">
                <div style="border-right: .5px solid #f0f0f0; padding-top: 2%">
                    <div class="column zero" style="width: 100%">
                        <div style="display: inline-block;vertical-align: middle">
                        <?= Html::img('@web/'.$model->cAuthor->image,['style' => 'height:35px;width:35px;border-radius:10px']) ?>
                        <p><?=$model->c_display_name?></p>
                        </div>
                        <div style="clear:both; display: inline-block;vertical-align: middle;margin-left: 10%;">
                        <h1 class="title" style="color: #6b0d7ce8"><?=$model->c_title?></h1>
                        <p class="" style="font-size: 18px;"><?=$model->c_description?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sections_group" style="width: 55%;float: left; margin-left: 10%; border-right: .5px solid #f0f0f0">
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
                                            <?=Html::img(Url::to('@web/images/uploads/campaign/'.$model->c_image),['class' => 'attachment-blog-navi size-blog-navi wp-post-image'],['alt'=>'Image'],['align'=>'left'],['width'=>'80'],['height'=>'80'])?>
                                        </a>
                                        <div class="image_links">
                                            <a href="<?= Url::to(['campaign/fund','id'=>$model->c_id])?>" class="link"><i class="glyphicon glyphicon-gift"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Post Header-->
                            <!-- One full width row-->
                            <div class="column one post-header">
                                <div class="title_wrapper">
                                    <div class="post-meta clearfix">
                                        <!--<div class="author-date">
                                            <span class="vcard author post-author"> Published by <i class="icon-user"></i> <span class="fn"><a href="#"><?/*=$model->cAuthor->username*/?></a></span> </span><span class="date"> at <i class="icon-clock"></i>
														<time class="entry-date" datetime="2014-03-12T09:15:13+00:00" itemprop="datePublished" pubdate>
															<?/*=$model->c_created_at*/?>
														</time> </span>
                                        </div>-->
                                        <div class="category meta-categories" style="width: 100%">
                                            <div style="display: inline-block;float: left;margin-left: 22%">
                                                <p style="font-size: 15px;color: #000000;"><i class="fa fa-location-arrow"></i><?php echo $model->c_location ?></p>
                                            </div>
                                            <div style="clear: both;display: inline-block;margin-left: 30%">
                                                <p style="font-size: 15px;color: #000000;"><i class="fa fa-anchor"></i><?php echo $model->cCat->name ?></p>
                                            </div>
                                            <!--<div class="cat-wrapper">
                                                <ul class="post-categories">
                                                    <?php /*foreach ($categories as $category) {*/?>
                                                        <li>
                                                            <a rel="category tag" href="<?/*= Url::to(['campaign/show', 'id'=>$category->id])*/?>"><?/*= $category->name*/?></a>
                                                        </li>
                                                    <?php /*}*/?>
                                                    <li>
                                                        <a rel="category tag" href="<?/*= Url::to(['campaign/show', 'id'=>'NULL'])*/?>">Show all</a>
                                                    </li>
                                                </ul>
                                            </div>-->
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
                                                'content'=>$this->render('campaign_update',['updates'=>$updates]),
                                                //'linkOptions'=>['data-url'=>\yii\helpers\Url::to(['/campaign/form'])]
                                            ],
                                            [
                                                'label'=>'<i class="glyphicon glyphicon-comment"></i> Comments',
                                                'content'=>$this->render('campaign_comments',['comments'=>$comments]),
                                            ],
                                            [
                                                'label'=>'<i class="glyphicon glyphicon-question-sign"></i> FAQ',
                                                'content'=>$this->render('campaign_faq',['model'=>$model]),
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
                <div class="widget-area clearfix" style="padding: 9px 0px 0px;">
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?=$progress?>%; background-color:#8f13a5f0"><?=$progress?>%
                        </div>
                    </div>
                    <h3 style="margin-top:25px; margin-bottom:0px;"><?=$backed?></h3>
                    <h3 class="title-price" style="margin-top:0px;"><small>pledged of U$S<?=$model->c_goal?> goal</small></h3>

                    <h3 style="margin-top:25px; margin-bottom:0px;">199</h3>
                    <h3 class="title-price" style="margin-top:0px;"><small>backers</small></h3>

                    <h3 style="margin-top:25px; margin-bottom:0px;">22</h3>
                    <h3 class="title-price" style="margin-top:0px;"><small>days to go</small></h3>

                    <div class="section" style="margin-top:25px; padding-bottom:20px;">
                        <a href="<?= Url::to(['campaign/fund','id'=>$model->c_id])?>">
                            <button class="btn btn-default" style="width:100%; background-color:#8f13a5f0; color: white"><h4><span style="margin-right:20px" class="glyphicon glyphicon-gift" aria-hidden="true"></span>Fund this Campaign</h4></button>
                        </a>
                    </div>
                    <div class="section" style="padding-bottom:20px;">
                        <h6><a href="#"><span class="glyphicon glyphicon-heart-empty" style="cursor:pointer;"></span> All or nothing. This project will only be funded if it reaches its goal by <?=$model->c_end_date?>.</a></h6>
                    </div>
                    <?php if (Yii::$app->user->identity->id == $model->c_author) { ?>
                    <div class="section" style="margin-top:25px; padding-bottom:20px;text-align: center">
                        <?= Html::a('Update',['campaign/update','id' => $model->c_id],['style' => 'font-size:15px;background-color:#940094;color:#ffffff;padding:3%;border-radius:10px;text-decoration:none']) ?>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
