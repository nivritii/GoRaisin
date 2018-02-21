<?php
/**
 * Created by PhpStorm.
 * User: rama
 * Date: 2/1/2018
 * Time: 3:56 PM
 */
use yii\helpers\Url;
use yii\helpers\Html;
use frontend\models\Fund;
use yii2mod\alert;
use frontend\models\Campaign;
use yii\helpers\Console;

$this->title = 'My Campaign - GoRaisin';
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
                                <ul class="nav nav-tabs">
                                    <li class="active"><a data-toggle="tab" href="#home" style="font-size: 18px">Activity</a></li>
                                    <li><a data-toggle="tab" href="#menu1" style="font-size: 18px">Created Projects</a></li>
                                    <li><a data-toggle="tab" href="#menu2" style="font-size: 18px">Backed Projects</a></li>
                                </ul>

                                <div class="tab-content">
                                    <div id="home" class="tab-pane fade in active">
                                        <div style="margin-top: 2%;margin-left: 1.5%">
                                            <div>
                                                <div class="col-xs-2" style="display: inline-block; align-content: center">
                                                    <h4>Fund Campaign</h4>
                                                </div>
                                                <div style="clear: both;display: inline-block;width: 12%">
                                                    <h4>Fund Amount</h4>
                                                </div>
                                                <div style="clear: both;display: inline-block;width: 15%">
                                                    <h4>Done on</h4>
                                                </div>
                                            </div>
                                        </div>
                                        <!--<h3>Activity</h3>-->
                                        <?php foreach ($activities as $activity){?>
                                            <div style="margin-top: 2%;margin-left: 1.5%">
                                                <div>
                                                    <div style="clear: both;display: inline-block;margin-left: 2%;width: 15%">
                                                        <p style="font-size: 15px"><?=$activity->fundC->c_title?></p>
                                                    </div>
                                                    <div style="clear: both;display: inline-block;width: 5%">
                                                        <p><?=$activity->fund_amt?></p>
                                                    </div>
                                                    <div style="clear: both;display: inline-block;width: 20%">
                                                        <p><?=$activity->fund_created_on?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr style=" height:1px;border:none;border-top:1px solid #f9f9f9;" />
                                        <!--<div class="card">
                                            <div class="card-block">
                                                <h4 class="card-title">Campaign <?php /*echo $activity->fundC->c_title*/?>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspFund Amount <?/*=$activity->fund_amt*/?></h4>
                                                <h6 class="card-subtitle mb-2 text-muted"><?/*=$activity->fund_created_on*/?></h6>
                                            </div>
                                        </div>-->
                                        <?php }?>
                                    </div>
                                    <div id="menu1" class="tab-pane fade">
                                        <!--<h3>Created Projects</h3>-->
                                        <br /><br />
                                        <div class="posts_group lm_wrapper classic col-3">
                                            <?php foreach ($campaigns as $campaign) {
                                                $backed = Fund::find()->where(['fund_c_id'=>$campaign->c_id])->sum('fund_amt');

                                                if($backed!=0){
                                                    $progress = ($backed/$campaign->c_goal)*100;
                                                }else{
                                                    $progress=0;
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
                                                                <!--<img width="960" height="750" src="images/home_blogger2_lifestyle1-960x750.jpg" class="scale-with-grid wp-post-image" alt="home_blogger2_lifestyle1" itemprop="image" />-->
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
                                                                    <i class="glyphicon glyphicon-link" style="color: #337ab7"></i>&nbsp&nbsp;<a href="<?= Url::to(['campaign/view', 'id' => $campaign->c_id])?>" class="post-more" style="text-decoration: none">Continue Editing</a>
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
                                            <!--<h2><bold>Backed Projects</bold></h2>-->
                                            <br /><br />
                                        <p>A place to keep track of all your backed projects</p>
                                            <h3>Live Projects</h3>
                                            <p>Tracks both live and dropped projects</p>
                                            <br/>
                                            <table class="table table-hover">
                                                <thead>
                                                <tr>
                                                    <th>Backed Projects</th>
                                                    <th>Pledged Amount</th>
                                                    <th>Reward</th>
                                                    <th>Ends on</th>
                                                    <th>Drop a Message</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php foreach ($fundedCampaigns as $fundCampaign){
                                                  $fundamt = Fund::find()->where(['fund_c_id'=>$fundCampaign->c_id,'fund_user_id'=>Yii::$app->user->getId()])->sum('fund_amt');
                                                    ?>
                                                <tr>
                                                    <td><?=$fundCampaign->c_title?></td>
                                                    <td><?=$fundamt?></td>
                                                    <td>Null</td>
                                                    <td><?=$fundCampaign->c_end_date?></td>
                                                    <td><a href="#">New Message</a></td>
                                                </tr>
                                                <?php }?>
                                                </tbody>
                                            </table>
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
