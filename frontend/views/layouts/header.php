<?php

use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Url;
use yii\helpers\Html;
use kartik\social\Module;

//echo \kartik\social\GoogleAnalytics::widget();

frontend\assets\HomePageAsset::register($this);
/*$imagePath = '/'.Yii::$app->user->identity->image;*/
?>

<!-- Main Theme Wrapper -->

    <div id="Header_wrapper">
        <!-- Header -->
        <header id="Header">
            <div id="Top_bar" style="height: 80px">
                <div class="container" style="width:1200px; padding-left: 0px;">
                    <div class="column one">
                        <div class="top_bar_left clearfix" style="width:1250px">
                            <!-- Logo-->
                            <div class="logo">
                                <a id="logo" href="<?= Url::to(['/site/index']) ?>" title="GoRaisin">
                                    <p><?= Html::img('@web/images/raisin_logo.png', ['alt' => 'GoRaisin', 'class' => 'logo-main scale-with-grid']); ?></p>
                                    <p><?= Html::img('@web/images/raisin_logo.png', ['alt' => 'GoRaisin', 'class' => 'logo-sticky scale-with-grid']); ?></p>
                                    <p><?= Html::img('@web/images/raisin_logo.png', ['alt' => 'GoRaisin', 'class' => 'logo-mobile scale-with-grid']); ?></p>
                                </a>
                            </div>
                            <!-- Main menu-->
                            <div class="menu_wrapper">
                                <nav id="menu" class="menu-main-menu-container">
                                    <ul id="menu-main-menu" class="menu">
                                        <li>
                                            <a href="<?= Url::to(['/campaign/show', 'id' => 'NULL']) ?>"><span>Explore</span></a>
                                        </li>

                                        <li>
                                            <a target="_blank" href="<?= Url::to(['/campaign/create']) ?>"><span><span
                                                            style="padding: 0; color: #8f13a5f0;">Start Campaign</span></span></a>
                                        </li>
                                        <?php if (Yii::$app->user->isGuest) { ?>
                                            <li>
                                                <a href="<?= Url::to(['/site/login']) ?>"><span>Login</span></a>
                                            </li>
                                        <?php } else { ?>
                                            <li>
                                                <div class="image-div" style="padding-top: 20px">
                                                    <span><span>
                                                    <img class="user-image"
                                                         src="<?php $imagePath = '/' . Yii::$app->user->identity->image;
                                                         echo Yii::$app->request->baseUrl . $imagePath ?>">
                                                    <div class="image-div2">
                                                        <p class="user-name"><?php echo Yii::$app->user->identity->username ?></p>
                                                        <hr/>
                                                        <?php $userId = Yii::$app->user->identity->id; ?>
                                                        <?= Html::a('Profile', ['user/update', 'id' => $userId], ['class' => 'image-a']) ?>
                                                        <!--<a class="image-a">Profile</a>-->
                                                        <a class="image-a"
                                                           href="<?= Url::to(['/campaign/mycampaign']) ?>">My Projects</a>
                                                        <a class="image-a" href="<?= Url::to(['/wallet/index']) ?>">Wallet</a>
                                                        <hr/>
                                                        <?= Html::a('Log out', ['/site/logout'], ['data-method' => 'post', 'class' => 'logout-a']) ?>
                                                    </div>
                                                    </span></span>
                                                </div>
                                                <!--</a>-->
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </nav>
                                <a class="responsive-menu-toggle" href="#"><i class="icon-menu"></i></a>
                            </div>
                            <!-- Secondary menu area - only for certain pages -->
                            <div class="secondary_menu_wrapper"></div>
                            <!-- Banner area - only for certain pages-->
                            <div class="banner_wrapper"></div>
                            <!-- Header Searchform area-->
                            <div class="search_wrapper">
                                <form method="get" id="searchform" action="#">
                                    <i class="icon_search icon-search"></i><a href="#" class="icon_close"><i
                                                class="icon-cancel"></i></a>
                                    <input type="text" class="field" name="s" id="s" placeholder="Enter your search"/>
                                    <input type="submit" class="submit" value="" style="display:none;"/>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    </div>


