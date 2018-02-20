<?php
/**
 * Created by PhpStorm.
 * User: cherry
 * Date: 14/02/2018
 * Time: 4:02 PM
 */
use yii\helpers\Url;
use yii\helpers\Html;
use frontend\models\Fund;
use frontend\models\Campaign;
use yii\helpers\Console;

$this->title = $model->cAuthor->username.' - GoRaisin';
$this->params['breadcrumbs'][] = ['label' => 'Campaigns', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
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
                                <div style="text-align: center;">
                                    <?php $imagePath = '/'.$model->cAuthor->image; ?>
                                    <?= Html::img(Yii::$app->request->baseUrl.$imagePath,['style' => 'height:70px;width:70px;border-radius:35px']) ?>
                                    <br /><br />
                                    <p style="font-size: 30px;font-weight: 400"><?php echo $model->cAuthor->username ?></p>
                                    <p style="color: #adadad;">Joined <?php echo $model->cAuthor->created_at ?></p>
                                    <p style="color: #adadad;">Located at <?php echo $model->cAuthor->location ?></p>
                                </div>
                                <ul class="nav nav-tabs">
                                    <li class="active"><a data-toggle="tab" href="#home" style="font-size: 18px">About</a></li>
                                    <li><a data-toggle="tab" href="#menu1" style="font-size: 18px">Created Projects</a></li>
                                    <li><a data-toggle="tab" href="#menu2" style="font-size: 18px">Backed Projects</a></li>
                                </ul>

                                <div class="tab-content">
                                    <div id="home" class="tab-pane fade in active">
                                        <div style="height: 300px">
                                            <div style="margin-left: 6%;margin-top: 2%;display: inline-block;width:10%">
                                                <p style="font-size: 20px;font-weight: 400">Biography</p>
                                            </div>
                                            <div style="clear: both;display: inline-block;margin-left: 10%;width: 50%;height: 300px">
                                                <?php if ($model->cAuthor->biography == null){ ?>
                                                    <p><i>The user has not leave biography.</i></p>
                                                <?php }else{ ?>
                                                <p><?php echo $model->cAuthor->biography ?></p>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div style="height: 100px">
                                            <div style="margin-left: 6%;margin-top: 2%;display: inline-block;width:10%">
                                                <p style="font-size: 20px;font-weight: 400">Website</p>
                                            </div>
                                            <div style="clear: both;display: inline-block;margin-left: 10%;width: 50%;height: 400px">
                                                <?= Html::a($model->cAuthor->website,['campaign/redirect','website' => $model->cAuthor->website],['target' => '_blank']) ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="menu1" class="tab-pane fade">
                                        <!--<h3>Created Projects</h3>-->
                                        <br /><br />
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
                                                                        <span class="vcard author post-author"><span class="label" style="color: #adadad;font-size: 12px">Published by </span>&nbsp&nbsp<i class="glyphicon glyphicon-user"></i>&nbsp;<span class="fn"><a href="#"><?= $campaign->cAuthor->username?></a href="#"></span></span><span class="date"><span class="label">at </span><i class="glyphicon glyphicon-time"></i> <span class="post-date updated"><?= $campaign->c_created_at?></span></span>
                                                                    </div>
                                                                    <div class="category">
                                                                        <p style="color: #337ab7;font-weight: 500"><i class="glyphicon glyphicon-tag" style="color: #337ab7"></i>&nbsp&nbsp;<?= $campaign->cCat->name?></p>
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
                                                                    <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:<?=$progress?>%;color: black"><?=$progress?>%
                                                                    </div>
                                                                </div>
                                                                <div class="post-links">
                                                                    <i class="glyphicon glyphicon-link" style="color: #337ab7"></i>&nbsp&nbsp;<a href="<?= Url::to(['campaign/view', 'id' => $campaign->c_id])?>" class="post-more" style="text-decoration: none">Read more</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div id="menu2" class="tab-pane fade">
                                        <div class="container">
                                            <div>
                                                <?php foreach ($fundedCampaigns as $fundCampaign){
                                                    $fundamt = Fund::find()->where(['fund_c_id'=>$fundCampaign->c_id,'fund_user_id'=>Yii::$app->user->getId()])->sum('fund_amt');
                                                    ?>
                                                    <div style="margin-left: 5%;margin-top: 3%;width: 300px;height: 400px;display: inline-block;border: 1px solid #d8d8d8">
                                                        <div>
                                                            <?= Html::img('@web/images/uploads/' . $fundCampaign->c_image) ?>
                                                            <br /><br />
                                                            <?= Html::a($fundCampaign->c_title,['campaign/view', 'id' => $fundCampaign->c_id],['target' => '_blank','style' => 'margin-left: 5%;padding-top:4%;font-size: 20px;font-weight: 300;color:#484848']) ?>
                                                            <br /><br/>
                                                            <p style="display: inline-block;margin-left: 5%;color: #2e2e2e">By</p><?= Html::a($fundCampaign->cAuthor->username,['campaign/myintroduction','id' => $fundCampaign->c_id],['target' => '_blank','style' => 'margin-left: 2%;padding-top:4%;font-size: 17px;font-weight: 300;color:#2e2e2e']) ?>
                                                        </div>
                                                    </div>
                                                <?php }?>
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