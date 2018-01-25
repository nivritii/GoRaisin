<?php
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Url;
use yii\helpers\Html;

frontend\assets\HomePageAsset::register($this);
/*$imagePath = '/'.Yii::$app->user->identity->image;*/
?>
<body class="archive category layout-full-width nice-scroll-on mobile-tb-left button-flat header-classic minimalist-header sticky-header sticky-white ab-hide subheader-both-left menu-line-below-80-1 menuo-right menuo-no-borders footer-copy-center">
<!-- Main Theme Wrapper -->
<div id="Wrapper">
    <div id="Header_wrapper">
        <!-- Header -->
        <header id="Header">
            <div id="Top_bar">
                <div class="container" style="width:1600px; padding-left: 0px;">
<!--                    <div class="column one">-->
                            <div class="top_bar_left clearfix" style="width:1250px">
                            <!-- Logo-->
                            <div class="logo">
                                <a id="logo" href="<?=Url::to(['/site/index'])?>" title="BeBlogger 2 - BeTheme">
                                    <p><?= Html::img('@web/images/raisin_logo.png', ['alt'=>'GoRaisin', 'class'=>'logo-main scale-with-grid']);?></p>
                                    <p><?= Html::img('@web/images/raisin_logo.png', ['alt'=>'GoRaisin', 'class'=>'logo-sticky scale-with-grid']);?></p>
                                    <p><?= Html::img('@web/images/raisin_logo.png', ['alt'=>'GoRaisin', 'class'=>'logo-mobile scale-with-grid']);?></p>
                                </a>
                            </div>
                            <!-- Main menu-->
                            <div class="menu_wrapper">
                                <nav id="menu" class="menu-main-menu-container">
                                    <ul id="menu-main-menu" class="menu">
                                        <li>
                                            <a href="<?=Url::to(['/campaign/show','id'=>'NULL'])?>"><span>Explore</span></a>
                                        </li>

                                        <li>
                                            <a target="_blank" href="<?=Url::to(['/campaign/create'])?>"><span><span style="padding: 0; color: #d30000;"><!--<i class="fa fa-user-o"></i>-->Start Campaign</span></span></a>
                                        </li>
                                        <?php if(Yii::$app->user->isGuest){ ?>
                                            <li>
                                                <a href="<?=Url::to(['/site/login'])?>"><span>Login</span></a>
                                            </li>
                                            <li>
                                                <a href="<?=Url::to(['/site/signup'])?>"><span>Sign up</span></a>
                                            </li>
                                        <?php } else { ?>
                                            <li>
                                                <!--<a style="text-decoration: none">-->
                                                <!--<img class="user-image" src="<?php /*$imagePath = '/'.Yii::$app->user->identity->image;
                      echo Yii::$app->request->baseUrl.$imagePath*/?>">-->
                                                <div class="image-div">
                                                    <span><span>
                                                    <img class="user-image" src="<?php $imagePath = '/'.Yii::$app->user->identity->image;
                                                    echo Yii::$app->request->baseUrl.$imagePath?>">
                                                    <div class="image-div2">
                                                        <p class="user-name"><?php echo Yii::$app->user->identity->username?></p>
                                                        <hr />
                                                        <?php $userId = Yii::$app->user->identity->id; ?>
                                                        <?= Html::a('Profile',['user/update','id' => $userId],['class' => 'image-a'])?>
                                                        <!--<a class="image-a">Profile</a>-->
                                                        <a class="image-a">Campaign</a>
                                                        <a class="image-a">Wallet</a>
                                                        <hr />
                                                        <?= Html::a('Log out', ['/site/logout'], ['data-method' => 'post', 'class' => 'logout-a']) ?>
                                                    </div>
                                                    </span></span>
                                                </div>
                                                <!--</a>-->
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
<!--                    </div>-->
                </div>
            </div>
        </header>
    </div>


