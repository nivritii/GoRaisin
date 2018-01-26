<?php

/* @var $this yii\web\View */
use frontend\assets\HomePageAsset;
use yii\helpers\Html;
use yii\helpers\Url;
use frontend\models\Category;
use frontend\models\Campaign;

HomePageAsset::register($this);
$this->title = 'GoRaisin';
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
                            <div class="container">

  <ul class="nav nav-tabs">
      <?php foreach($categories as $category){?>
    <li class="<?=$category->class?>"><a data-toggle="tab" href="#<?=$category->id?>"><?=$category->name?></a></li>
      <?php }?>
  </ul>

<div class="tab-content">
    <?php foreach($categories as $category){?>
    <div id="<?=$category->id?>" class="tab-pane fade in <?=$category->class?>">
        <div class="featured-campaign-container1" style="display: inline-block;width: 60%;height: 480px;vertical-align: top;">
        <h2 class="featured-campaign-text"><?=$category->name?></h2>
            <h6>FEATURED CAMPAIGN</h6>
                <?php $featured_campaign = Campaign::find()->where(['c_id'=>$category->featured_campaign_id])->one();
                      $new_campaigns = Campaign::find()->where(['c_cat_id'=>$category->id])->limit(3)->all();?>
            <p class="featured-campaign-image" style="width: 700px;"><?= Html::img('@web/images/uploads/'.$featured_campaign->c_image)?></p>
                <p style="margin-top: 1%; font-size: 17px; color: #2c2c2c;"><?=$featured_campaign->c_title?></p>
                <p class="campaign-fund-progress" style="color: #858585;font-size: 15px;">90% FUNDED</p>
        </div>

        <div class="featured-campaign-container2" style="display: inline-block; width: 30%; height: 480px; vertical-align: top;">
            <p class="featured-campaign-text-right" style="margin-left: 4%;color: #2c2c2c;font-size: 17px;margin-top: 52px">NEW</p>
            <?php foreach($new_campaigns as $new) {?>
                <div class="featured-campaign-image-container" style="display: inline-block;width: 40%;height: 20%;margin-left: 4%;vertical-align: top;">
                    <?= Html::img('@web/images/uploads/'.$new->c_image,['class' => 'featured-campaign-image-right']) ?>
                </div>
                <div class="featured-campaign-title-container" style="display: inline-block;margin-left: 5%;margin-top: 5%;vertical-align: top;">
                    <p class="featured-campaign-title-right" style="font-size: 15px;color: #2c2c2c;"><?=$new->c_title?></p>
                    <p class="campaign-fund-progress-right" style="color: #858585;font-size: 12px;">30% funded</p>
                </div>
                <br />
                <br />
            <?php }?>
        </div>
    </div>
    <?php }?>
</div>
</div>

                            



                            <!-- Template category. Does it must be direct to a certain page? -->
                            <!--<div class="section section-filters">
                                <div class="section_wrapper clearfix">
                                    <div id="Filters" class="column one ">
                                        <div class="filters_wrapper">
                                            <ul>
                                                <li class="reset-inner">
                                                    <a data-rel="*" href="<?/*= Url::to(['campaign/show', 'id'=>'NULL'])*/?>">All</a>
                                                </li>
                                                <?php /*foreach ($categories as $category) {*/?>
                                                    <li>
                                                        <a data-rel=".category-hot-news" href="<?/*= Url::to(['campaign/show', 'id'=>$category->id])*/?>"><?/*=$category->name*/?></a>
                                                    </li>
                                                <?php /*}*/?>
                                                <li class="close">
                                                    <a href="#"><i class="icon-cancel"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                </div>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


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

