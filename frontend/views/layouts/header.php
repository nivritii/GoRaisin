<?php
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Url;
use yii\helpers\Html;

frontend\assets\HomePageAsset::register($this);
/*$imagePath = '/'.Yii::$app->user->identity->image;*/
?>

<!-- Header -  Logo and Menu area -->
<header>
                <div id="Top_bar"> 
<!--                    class="is-sticky" style="top: 0px;"-->
                    <div class="container">
                        <div class="column one">
                            <div class="top_bar_left clearfix" style="width: 1120px;">
                                <!-- Logo-->
                                <div class="logo">
                                    <a id="logo" href="<?=Url::to(['/site/index'])?>" title="BeBlogger 2 - BeTheme">
                                        <p><?= Html::img('@web/images/blogger2.png', ['alt'=>'GoRaisin', 'class'=>'logo-main scale-with-grid']);?></p>
                                        <p><?= Html::img('@web/images/blogger2.png', ['alt'=>'GoRaisin', 'class'=>'logo-sticky scale-with-grid']);?></p>
                                        <p><?= Html::img('@web/images/blogger2.png', ['alt'=>'GoRaisin', 'class'=>'logo-mobile scale-with-grid']);?></p>
<!--                                        <img class="logo-main scale-with-grid" src="@web/images/blogger2.png" alt="BeBlogger 2 - BeTheme" /><img class="logo-sticky scale-with-grid" src="content/blogger2/images/blogger2.png" alt=""><img class="logo-mobile scale-with-grid" src="content/blogger2/images/blogger2.png" alt="">-->
                                    </a>
                                </div>
                                <!-- Main menu-->
                                <div class="menu_wrapper">
                                    <nav id="menu" class="menu-main-menu-container">
                                        <ul id="menu-main-menu" class="menu">
                                            <li class="current_page_item">
                                                <a href="<?=Url::to(['/site/index'])?>"><span>Home</span></a>
                                            </li>
                                            <li>
                                                <a href="<?=Url::to(['/campaign/show','id'=>'NULL'])?>"><span>Explore</span></a>
                                            </li>
                                            <?php if(Yii::$app->user->isGuest){ ?>
                                            <li>
                                                <a target="_blank" href="<?=Url::to(['/campaign/create'])?>"><span><span style="padding: 0; color: #d30000;">Start Campaign</span></span></a>
<!--                                                <a target="_blank" href="'.Url::to(['/campaign/create']).'"><span><span style="padding: 0; color: #d30000;">Buy now</span></span></a>-->
                                            </li>
                                            <li>
                                                <a href="<?=Url::to(['/site/login'])?>"><span>Login</span></a>
                                            </li>
                                            <li>
                                                <a href="<?=Url::to(['/site/signup'])?>"><span>Register</span></a>
                                            </li>
                                            <?php } else {
                                                echo'<li><a target="_blank" href="'.Url::to(['/campaign/create']).'"><span><span style="padding: 0; color: #d30000;">Start a campaign</span></span></a>';
                                            ?>
                                            <nav class="menu-main-menu-container">
                                            <ul class="menu">
                      <li><a>
                          <p><?=Html::img(Url::to('@web/uploads/user/'.Yii::$app->user->identity->image),['class' => 'mg-circle'],['width'=>'40'],['height'=>'40'])?></p>
                          </a>
                          <ul class="sub-menu">
                              <img src="<?php /*echo Yii::$app->request->baseUrl.$imagePath*/?>" width="30" height="30" class="img-circle" align="center"/>
                              <li><?= Html::a('Profile', ['user/index'])?></li>
                              <li><?= Html::a('My Campaigns', ['campaign/portfolio'])?></li>
                              <li><?= Html::a('Campaign', ['campaign/index'])?></li>
                              <li><?= Html::a('My Wallet',['wallet/index'])?></li>

                              <li><?= Html::a(
                                      'Logout',
                                      ['/site/logout'],
                                      ['data-method' => 'post', 'class' => 'btn btn-default btn-danger']
                                  ) ?></li>
                          </ul>
                      </li>
                  </ul>
              </nav>
<!--                                            <li>
                                                <a target="_blank" href="'.Url::to(['/campaign/create']).'"><span><span style="padding: 0; color: #d30000;">Buy now</span></span></a>
                                            </li>-->
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
            </header>