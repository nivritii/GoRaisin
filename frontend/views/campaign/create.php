<?php

use frontend\assets\HomePageAsset;
use frontend\assets\CampaignAsset;
use frontend\models\Campaign;
use yii\helpers\Html;
use yii\helpers\Url;
use kartik\tabs\TabsX;
use frontend\models\Category;
use kartik\date\DatePicker;
HomePageAsset::register($this);
CampaignAsset::register($this);

/* @var $this yii\web\View */
/* @var $model frontend\models\Campaign */
$campaign_draft = new Campaign();
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>

<div class="container" style="margin-top: 10px">
    <div class="row form-group">
        <div class="col-xs-9" style="padding-right: 0px">
            <ul class="nav nav-pills nav-justified thumbnail setup-panel" id="myNav">
                <li id="navStep1" class="li-nav active" step="#step-1">
                    <a>
                        <h4 class="list-group-item-heading">Basics</h4>
                        <p class="list-group-item-text">Introduce your project</p>
                    </a>
                </li>
                <li id="navStep2" class="li-nav active" step="#step-2">
                    <a>
                        <h4 class="list-group-item-heading">Rewards</h4>
                        <p class="list-group-item-text">Backers benefits</p>
                    </a>
                </li>
                <li id="navStep3" class="li-nav" step="#step-3">
                    <a>
                        <h4 class="list-group-item-heading">The Story</h4>
                        <p class="list-group-item-text">More about your project</p>
                    </a>
                </li>
                <li id="navStep4" class="li-nav" step="#step-4">
                    <a>
                        <h4 class="list-group-item-heading">Company</h4>
                        <p class="list-group-item-text">Share about your team</p>
                    </a>
                </li>
            </ul>
        </div>
        <div>
            <div class="col-xs-3" style="padding-left: 0px">
                <ul class="nav nav-pills nav-justified thumbnail setup-panel" id="myNav">
                    <li id="navStep5" class="li-nav" step="#step-5">
                        <a>
                            <h4 class="list-group-item-heading">Preview</h4>
                            <p class="list-group-item-text">Your project</p>
                        </a>
                    </li>
                    <li id="navStep6" class="li-nav" step="#step-6">
                        <a href="<?=\yii\helpers\Url::to(['campaign/create'])?>">
                            <h4 class="list-group-item-heading">Submit</h4>
                            <p class="list-group-item-text">For review</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>


    <div class="row form-group">
        <div class="col-xs-12">
            <div class="alert alert-success hide"></div>
        </div>
    </div>

    <form class="createCampaign" enctype="multipart/form-data" action="create" method="post" id="tab_logic" name="campaignForm">
<!--        <div class="container">-->
            <div class="row setup-content" id="step-1">
                <div class="col-xs-12">
                    <div class="col-md-12 well text-center">
                        <h1 class="tabpage-title">Basics</h1>
                        <div class="container col-xs-12">
                            <div class="container">
                                <br/>
                                <div class="form-group">
                                    <div style="width: 100%;height: 80px">
                                        <div style="float: left;display: inline-block;width: 20%">
                                            <p class="item-title">Campaign title</p>
                                        </div>
                                        <div style="display: inline-block;float: left;margin-left: 2%;width: 50%">
                                            <input type="text" style="width: 100%" name="cTitle" id="cTitle" required>
                                        </div>
                                    </div>
                                    <div style="clear:both;height: 80px">
                                        <div style="float: left;display: inline-block;width: 20%">
                                            <p class="item-title">Category</p>
                                        </div>
                                        <div style="display: inline-block;float: left;margin-left: 2%;width: 50%">
                                            <select name="cCategory" id="search_categories"
                                                    data-default-caption="Select Category"
                                                    style="border-radius: 10px;width: 100%">
                                                <option selected value=""><?=$model->cCat->name?></option>
                                                <?php foreach ($categories as $category) { ?>
                                                    <option value=<?= $category->id ?>><?= $category->name ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div style="clear:both;height: 460px">
                                        <div style="float: left;display: inline-block;width: 20%">
                                            <p class="item-title">Campaign image</p>
                                        </div>
                                        <div style="float: left;display: inline-block;width: 60%;margin-left: 2%">
                                            <div class="file-upload">
                                                <button class="file-upload-btn" type="button"
                                                        onclick="$('.file-upload-input').trigger( 'click' )">Add Image
                                                </button>
                                                <div class="image-upload-wrap">
                                                    <input class="file-upload-input" type='file' onchange="readURL(this);"
                                                           accept="image/*" name="cImage"/>
                                                    <div class="drag-text">
                                                        <h3>Drag and drop a file or select add Image</h3>
                                                    </div>
                                                </div>
                                                <br />
                                                <div class="file-upload-content">
                                                    <img class="file-upload-image" src="#" alt="your image"/>
                                                    <div class="image-title-wrap">

                                                        <button type="button" onclick="removeUpload()" class="remove-image">
                                                            Remove <span class="image-title">Uploaded Image</span></button>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div style="clear:both;height: 140px">
                                        <div style="float: left;display: inline-block;width: 20%">
                                            <p class="item-title">Short description</p>
                                        </div>
                                        <div style="display: inline-block;float: left;margin-left: 2%;width: 60%;class="textEditor">
                                        <textarea rows="2" type="text" style="width: 100%;" name="cDesc" id="cDesc"> </textarea>
                                    </div>
                                </div>

                                <div style="clear:both;height: 80px">
                                    <div style="float: left;display: inline-block;width: 20%">
                                        <p class="item-title">Start date</p>
                                    </div>
                                    <div style="float: left;display: inline-block;width: 20%;margin-left: 2%">
                                        <?php
                                        echo DatePicker::widget([
                                            'name' => 'cStartdate',
                                            'type' => DatePicker::TYPE_COMPONENT_PREPEND,
                                            'pluginOptions' => [
                                                'format' => 'yyyy-mm-dd',
                                                'autoclose' => true,
                                                'todayHighlight' => true,
                                            ],
                                        ]); ?>
                                    </div>
                                </div>

                                <div style="clear:both;height: 80px">
                                    <div style="float: left;display: inline-block;width: 20%">
                                        <p class="item-title">End date</p>
                                    </div>
                                    <div style="float: left;display: inline-block;width: 20%;margin-left: 2%">
                                        <?php
                                        echo DatePicker::widget([
                                            'name' => 'cEnddate',
                                            'type' => DatePicker::TYPE_COMPONENT_PREPEND,
                                            'pluginOptions' => [
                                                'format' => 'yyyy-mm-dd',
                                                'autoclose' => true,
                                                'todayHighlight' => true,
                                            ],
                                        ]); ?>
                                    </div>
                                </div>

                                <div style="clear:both;height: 80px">
                                    <div style="float: left;display: inline-block;width: 20%">
                                        <p class="item-title">Target</p>
                                    </div>
                                    <div style="display: inline-block;float: left;margin-left: 2%;width: 50%">
                                        <div style="display: inline-block;float: left;text-align: center;padding-top: 1%">
                                            <i class="fa fa-bitcoin fa-2x" style="float: left;"></i>
                                        </div>
                                        <div style="display: inline-block;width: 40%;float: left">
                                            <input type="text" style="width: 40%;float: left" name="cGoal" id="cGoal">
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                    <input onclick="step1Next()" class="btn btn-md btn-info" value="Next" style="color: #ffffff;background-color: #940094;border: 0;width: 10%">
                    <!-- </form> -->
                </div>
            </div>
<!--        </div>-->
</div>
<!--<div class="container">-->
    <div class="row setup-content" id="step-2">
        <div class="col-xs-12">
            <div class="col-md-12 well text-center">
                <h1 class="tabpage-title">Rewards</h1>

                <!--<form>-->
                <div class="container col-xs-12">
                    <br/>
                    <div class="row clearfix">
                        <div class="col-md-12 column">
                            <table class="table table-bordered table-hover" id="rewardTab">
                                <thead>
                                <tr>
                                    <th class="text-center">
                                        #
                                    </th>
                                    <th class="text-center">
                                        Title
                                    </th>
                                    <th class="text-center">
                                        Pledge Amount
                                    </th>
                                    <th class="text-center">
                                        Description
                                    </th>
                                    <th class="text-center">
                                        Limit
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr id='addr0'>
                                    <td>
                                        1
                                    </td>
                                    <td>
                                        <input type="text" name='rTitle[]'  id='rTitle' class="form-control"/>
                                    </td>
                                    <td>
                                        <input type="text" name='rAmt[]' class="form-control"/>
                                    </td>
                                    <td>
                                        <input type="text" name='rDesc[]' class="form-control"/>
                                    </td>
                                    <td>
                                        <input type="text" name='rLimit[]' class="form-control"/>
                                    </td>
                                </tr>
                                <tr id='addr1'></tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <a id="add_row" class="btn btn-success pull-left">Add Reward</a><a id='delete_row'
                                                                                       class="btn btn-danger pull-right">Remove
                        Reward</a>
                    <br/><br/><br/>
                </div>
                <!--</form> -->
                <hr>

                <input onclick="prevStep()" class="btn btn-md btn-info" value="Prev" style="color: #ffffff;background-color: #940094;border: 0;width: 10%">
                <input onclick="step2Next()" class="btn btn-md btn-info" value="Next" style="color: #ffffff;background-color: #940094;border: 0;width: 10%">

            </div>
        </div>
    </div>
<!--</div>-->
<!--<div class="container">-->
    <div class="row setup-content" id="step-3">
        <div class="col-xs-12">
            <div class="col-md-12 well text-center">
                <h1 class="tabpage-title">The Story</h1>

                <!--<form>-->
                <div class="container col-xs-12">
                    <div class="container">
                        <br/>
                        <div class="form-group">
                            <div style="clear:both;height: 150px">
                                <div style="float: left;display: inline-block;width: 20%">
                                    <p class="item-title">Campaign video</p>
                                </div>
                                <div style="display: inline-block;float: left;margin-left: 2%;width: 50%">
                                    <input type="text" style="width: 100%" name="cVideo">
                                    <p align="left">Please upload your video to YouTube and paste the link here.
                                        Projects with a video have a much higher chance of success.</p>
                                </div>
                            </div>

                            <div style="clear:both;height: 500px">
                                <div style="float: left;display: inline-block;width: 20%;">
                                    <p class="item-title">Main Description</p>
                                </div>
                                <div style="display: inline-block;float: left;margin-left: 2%;width: 50%;height: 400px">
                                    <?php
                                    echo \artkost\yii2\trumbowyg\Trumbowyg::widget([
                                        'name' => 'cLDesc',
                                        'settings' => [
                                            'lang' => 'en'
                                        ]
                                    ]);
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--</form> -->

                <input onclick="prevStep()" class="btn btn-md btn-info" value="Prev" style="color: #ffffff;background-color: #940094;border: 0;width: 10%">
                <input onclick="step3Next()" class="btn btn-md btn-info" value="Next" style="color: #ffffff;background-color: #940094;border: 0;width: 10%">

            </div>
        </div>
    </div>
<!--</div>-->
<!--<div class="container">-->
    <div class="row setup-content" id="step-4">
        <div class="col-xs-12">
            <div class="col-md-12 well text-center">
                <h1 class="tabpage-title">Company</h1>

                <div class="container col-xs-12">
                    <div class="container">
                        <br />
                        <div class="form-group">
                            <div style="width: 100%;height: 80px">
                                <div style="float: left;display: inline-block;width: 20%">
                                    <p class="item-title">Author name</p>
                                </div>
                                <div style="display: inline-block;float: left;margin-left: 2%;width: 50%">
                                    <input type="text" style="width: 100%" name="cName">
                                </div>
                            </div>

                            <div style="clear:both;height: 80px">
                                <div style="float: left;display: inline-block;width: 20%">
                                    <p class="item-title">Email</p>
                                </div>
                                <div style="display: inline-block;float: left;margin-left: 2%;width: 50%">
                                    <?php /*echo Yii::$app->user->identity->email */?><!--
                                        <?php /*if (!empty(Yii::$app->user->identity->email)) {
                                            $email = Yii::$app->user->identity->email*/?>
                                        <input type="text" style="width: 100%" name="cEmail" value=<?php /*$email */?>>
                                        --><?php /*}else { */?>
                                    <input type="text" style="width: 100%" name="cEmail">
                                    <?php /*}*/?>
                                </div>
                            </div>

                            <div style="clear:both;height: 180px;">
                                <div style="float: left;display: inline-block;width: 20%">
                                    <p class="item-title">Company biography</p>
                                </div>
                                <div style="display: inline-block;float: left;margin-left: 2%;width: 50%">
                                    <textarea rows="5" type="text" style="width: 100%" name="cBio"> </textarea>
                                    <p align="left">Simply introduce your company can help backers learn about your campaign better!</p>
                                </div>
                            </div>

                            <div style="clear:both;height: 80px;">
                                <div style="float: left;display: inline-block;width: 20%">
                                    <p class="item-title">Company location</p>
                                </div>
                                <div style="display: inline-block;float: left;margin-left: 2%;width: 50%">
                                    <input type="text" style="width: 100%" name="cLocation">
                                </div>
                            </div>

                            <div style="clear:both;height: 80px;">
                                <div style="float: left;display: inline-block;width: 20%">
                                    <p class="item-title">Company website</p>
                                </div>
                                <div style="display: inline-block;float: left;margin-left: 2%;width: 50%">
                                    <input type="text" style="width: 100%" name="cProfile">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!--</form> -->

                <input onclick="prevStep()" class="btn btn-md btn-info" value="Prev" style="color: #ffffff;background-color: #940094;border: 0;width: 10%">
                <input class="btn btn-md btn-info" type="submit" value="Submit" id="submit" style="color: #ffffff;background-color: #940094;border: 0;width: 10%">

                <div class="form-group">
                </div>
            </div>
        </div>
    </div>
<!--Step 5-->
<div class="row setup-content" id="step-5">
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
                    <div style="border-right: .5px solid #f0f0f0; padding-top: 3%">
                        <div class="column zero" style="width: 100%">
                            <div style="display: inline-block;vertical-align: middle;padding-top:5%">
                                <?= Html::img('@web/'.$model->cAuthor->image,['style' => 'height:40px;width:40px;border-radius:10px;margin-bottom:10%']) ?>
                                <br />
                                <?=
                                Html::a('View',['viewcompany','id' => $model->c_id],[
                                    'id' => 'view-company',
                                    'class' => 'view-author',
                                    'data-toggle' => 'modal',
                                    'data-target' => '#view-author',
                                    'style' => 'text-decoration:none;color:#ffffff;background-color:#940094;padding:3px;border-radius:5px;font-size:15px;'
                                ])
                                ?>
                            </div>
                            <div style="clear:both; display: inline-block;vertical-align: middle;margin-left: 10%;width: 75%;">
                                <h1 class="title" style="color: #6b0d7ce8" value="cName"></h1>
                                <p class="" style="font-size: 13px;"><?=$model->c_description?></p>
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
                                                <div style="display: inline-block;float: right;margin-right: 3%">
                                                    <p style="font-size: 15px;color: #000000;"><i class="glyphicon glyphicon-map-marker"></i>&nbsp;<?php echo $model->c_location ?></p>
                                                </div>
                                                <div style="clear: both;display: inline-block;margin-left: 60%">
                                                    <p style="font-size: 15px;color: #000000;"><i class="glyphicon glyphicon-tag"></i>&nbsp;<?php echo $model->cCat->name ?></p>
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
                                                    'content'=> Html::getAttributeName("cDesc"),
                                                    'active'=>true
                                                ],
                                                [
                                                    'label'=>'<i class="glyphicon glyphicon-bell"></i> Updates',
                                                    'content'=>"",
                                                    'disabled'=>true
                                                ],
                                                [
                                                    'label'=>'<i class="glyphicon glyphicon-comment"></i> Comments',
                                                    'content'=>"",
                                                    'disabled'=>true
                                                ],
                                                [
                                                    'label'=>'<i class="glyphicon glyphicon-question-sign"></i> FAQ',
                                                    'content'=>"",
                                                    'disabled'=>true
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
                            <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:0%; background-color:#8f13a5f0;color: black;">0%
                            </div>
                        </div>
                        <h3 style="margin-top:25px; margin-bottom:0px;">0</h3>
                        <h3 class="title-price" style="margin-top:0px;"><small>pledged of U$S<div value="cGoal"></div> goal</small></h3>

                        <h3 style="margin-top:25px; margin-bottom:0px;">199</h3>
                        <h3 class="title-price" style="margin-top:0px;"><small>backers</small></h3>

                        <h3 style="margin-top:25px; margin-bottom:0px;" id="endDate"><?=$model->c_end_date?></h3>
                        <h3 class="title-price" style="margin-top:0px;"><small>days to go</small></h3>

                        <?php if (Yii::$app->user->isGuest || Yii::$app->user->identity->id != $model->c_author) { ?>
                            <div class="section" style="margin-top:25px; padding-bottom:20px;">
                                <a href="<?= Url::to(['campaign/fund','id'=>$model->c_id])?>">
                                    <button class="btn btn-default" style="width:100%; background-color:#8f13a5f0; color: white"><h4><span style="margin-right:20px" class="glyphicon glyphicon-gift" aria-hidden="true"></span>Fund this Campaign</h4></button>
                                </a>
                            </div>
                        <?php }elseif(Yii::$app->user->id == $model->c_author && $model->c_status == 'publish') { ?>
                            <div class="section" style="margin-top:25px; padding-bottom:20px;">
                                <a href="<?= Url::to(['campaign/update','id'=>$model->c_id])?>">
                                    <button class="btn btn-default" style="width:100%; background-color:#8f13a5f0; color: white"><h4><span style="margin-right:20px" class="glyphicon glyphicon-edit" aria-hidden="true"></span>Edit</h4></button>
                                </a>
                            </div>
                        <?php }elseif (Yii::$app->user->id == $model->c_author && $model->c_status == 'draft'){ ?>
                            <a href="<?= Url::to(['campaign/update','id'=>$model->c_id])?>">
                                <button class="btn btn-default" style="width:100%; background-color:#8f13a5f0; color: white"><h4><span style="margin-right:20px" class="glyphicon glyphicon-edit" aria-hidden="true"></span>Edit</h4></button>
                            </a>
                            <br /><br />

                            <a href="<?= Url::to(['campaign/review','id'=>$model->c_id])?>" style="margin-left: 32%;text-decoration: none">
                                <?= Html::submitButton('Submit for Review',['class' => 'btn btn-default','value' => 'moderation','name' => 'moderation','style' => 'background-color:#add8e6;color:#ffffff;border-radius: 10px']) ?>
                            </a>
                            <br /><br />
                            <a href="<?= Url::to(['campaign/delete','id'=>$model->c_id])?>">
                                <p><span class="glyphicon glyphicon-trash"></span> Delete Project</p>
                            </a>
                        <?php }elseif (Yii::$app->user->id == $model->c_author && $model->c_status == 'moderation') { ?>
                            <a href="<?= Url::to(['campaign/view','id'=>$model->c_id])?>">
                                <button disabled class="btn btn-default" style="width:100%; background-color:#8f13a5f0; color: white"><h4><span style="margin-right:20px" class="glyphicon glyphicon-edit" aria-hidden="true"></span>Under Review</h4></button>
                            </a>
                            <br /><br />
                            <a href="<?= Url::to(['campaign/delete','id'=>$model->c_id])?>">
                                <p><span class="glyphicon glyphicon-trash"></span> Delete Project</p>
                            </a>
                        <?php } ?>
                        <div class="section" style="padding-bottom:20px;">
                            <h6><span class="glyphicon glyphicon-heart-empty" style="cursor:pointer;"></span> All or nothing. This project will only be funded if it reaches its goal by <?=$model->c_end_date?>.</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--</div>-->
</form>

<script>
    var currentStep = 1;
    var cTitle = document.campaignForm.cTitle;
    var cCategory = document.campaignForm.cCategory;
    var cDesc = document.campaignForm.cDesc;
    var cGoal = document.campaignForm.cGoal;
    var error_message='';

    function validateStep1() {
        if(cTitle.value == ""){
            cTitle.focus();
            error_message+="Please enter Campaign Title";
        }
        if(cCategory.value == ""){
            cCategory.focus();
            error_message+="<br>Please select Category";
        }
        if(cDesc.value == ""){
            cDesc.focus();
            error_message+="<br>Please give Short Description";
        }
        if(cGoal.value == ""){
            cGoal.focus();
            error_message+="<br>Set your Target";
        }
        if(error_message){
            $('.alert-success').removeClass('hide').html(error_message);
            error_message='';
            return false;
        }else{
            error_message='';
            return true;
        }
    }

    $(document).ready(function () {
        $('.li-nav').click(function () {
            var $targetStep = $($(this).attr('step'));
            currentStep = parseInt($(this).attr('id').substr(7));
            if (!$(this).hasClass('disabled')) {
                $('.li-nav.active').removeClass('active');
                $(this).addClass('active');
                $('.setup-content').hide();
                $targetStep.show();
            }
        });
        $('#navStep1').click();
    });

    function step1Next() {
        //You can make only one function for next, and inside you can check the current step
        if (true) {//Insert here your validation of the first step
            if(validateStep1()){
                currentStep += 1;
                //$('#navStep' + currentStep).removeClass('disabled');
                $('#navStep' + currentStep).click();
            }
        }
    }
    function prevStep() {
        //Notice that the btn prev not exist in the first step
        currentStep -= 1;
        $('#navStep' + currentStep).click();
    }
    function step2Next() {
        if (true) {
            //$('#navStep3').removeClass('disabled');
            $('#navStep3').click();
        }
    }
    function step3Next() {
        if (true) {
            //$('#navStep4').removeClass('disabled');
            $('#navStep4').click();
        }
    }

    // Add , Delete row dynamically

    $(document).ready(function () {
        var i = 1;

        $("#add_row").click(function () {

            i++;
            $('#addr' + (i - 1)).html("<td>" + (i) + "</td><td><input name='rTitle[]' id='rTitle' type='text' placeholder='Title' class='form-control input-md'  /> </td><td><input  name='rAmt[]' type='text' placeholder='Pledge Amount'  class='form-control input-md'></td><td><input  name='rDesc[]' type='text' placeholder='Description'  class='form-control input-md'></td><td><input  name='rLimit[]' type='text' placeholder='Limit'  class='form-control input-md'></td>");
            $('#rewardTab').append('<tr id="addr' + i + '"></tr>');
        });


        $("#delete_row").click(function () {
            if (i > 1) {
                $("#addr" + (i - 1)).html('');
                i--;
            }
        });

        $("#submit").click(function () {

            $.ajax({
                method: "POST",
                data: $("#tab_logic").serialize(),
                success: function (data) {
                    alert(data);
                    $("#tab_logic")[0].reset();
                }
            })
        });
    });
</script>
