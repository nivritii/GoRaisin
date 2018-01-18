<?php
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Url;
use yii\helpers\Html;

frontend\assets\HomePageAsset::register($this);
/*$imagePath = '/'.Yii::$app->user->identity->image;*/
?>

<!-- Header -  Logo and Menu area -->
<div id="Top_bar"> 
  <div class="container">
    <div class="column one">
      <div class="top_bar_left clearfix" style="width: 1120px;">
        <!-- Logo-->
        <div class="logo">
          <a id="logo" href="<?=Url::to(['/site/index'])?>" title="BeBlogger 2 - BeTheme">
            <p><?= Html::img('@web/images/blogger2.png', ['alt'=>'GoRaisin', 'class'=>'logo-main scale-with-grid']);?></p>
            <p><?= Html::img('@web/images/blogger2.png', ['alt'=>'GoRaisin', 'class'=>'logo-sticky scale-with-grid']);?></p>
            <p><?= Html::img('@web/images/blogger2.png', ['alt'=>'GoRaisin', 'class'=>'logo-mobile scale-with-grid']);?></p>
          </a>
        </div>
        <!-- Main menu-->
        <div class="menu_wrapper">
          <nav id="menu" class="menu-main-menu-container">
            <ul id="menu-main-menu" class="menu">
              <li>
                <a href="<?=Url::to(['/site/index'])?>"><span>Explore</span></a>
              </li>
              
              <li>
                <a target="_blank" href="<?=Url::to(['/campaign/create'])?>"><span><span style="padding: 0; color: #d30000;">Start Campaign</span></span></a>
              </li>
              <?php if(Yii::$app->user->isGuest){ ?>
              <li>
                <a href="<?=Url::to(['/site/login'])?>"><span>Login</span></a>
              </li>
              <li>
                <a href="<?=Url::to(['/site/signup'])?>"><span>Register</span></a>
              </li>
              <?php } else { ?>
              <li>
                <a href="user/index">
                  <img class="user-image" src="<?php $imagePath = '/'.Yii::$app->user->identity->image;
                  echo Yii::$app->request->baseUrl.$imagePath?>">
                </a>
              </li>
              <?php } ?>
            </ul>
            </nav><a class="responsive-menu-toggle" href="#"><i class="icon-menu"></i></a>
          </div>
          <!-- Secondary menu area - only for certain pages -->
          <div class="secondary_menu_wrapper"></div>
          <!-- Banner area - only for certain pages-->
          <div class="banner_wrapper"></div>
          <!-- Header Searchform area-->
          <div class="search_wrapper">
            <form method="get" id="searchform" action="#">
              <i class="icon_search icon-search"></i><a href="#" class="icon_close"><i class="icon-cancel"></i></a>
              <input type="text" class="field" name="s" id="s" placeholder="Enter your search" />
              <input type="submit" class="submit" value="" style="display:none;" />
          </form>
        </div>
      </div>
    </div>
  </div>
</div>