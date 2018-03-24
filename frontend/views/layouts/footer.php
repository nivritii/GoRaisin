<?php

use yii\helpers\Url;
use yii\helpers\Html;
use frontend\assets\HomePageAsset;

HomePageAsset::register($this);
?>

<!-- Footer-->
<footer id="Footer" class="clearfix">
    <div class="widgets_wrapper" style="padding:60px 0 30px;">
        <div class="container">
            <!-- One Fourth (1/4) Column -->
            <div class="column one-fourth">
                <!-- Meta Links Area -->
                <aside id="meta-2" class="widget widget_meta">
                    <h4>ABOUT</h4>
                    <ul>
                        <li>
                            <a href="content/blogger2/wp-login.html">About us</a>
                        </li>
                        <li>
                            <a href="#">Entries</a>
                        </li>
                        <li>
                            <a href="content/blogger2/comments/#">Comments</a>
                        </li>
                        <li>
                            <a href="https://wordpress.org/"
                               title="Powered by WordPress, state-of-the-art semantic personal publishing platform.">WordPress.org</a>
                        </li>
                    </ul>
                </aside>
            </div>
            <!-- One Fourth (1/4) Column -->
            <div class="column one-fourth">
                <!-- Meta Links Area -->
                <aside id="meta-2" class="widget widget_meta">
                    <h4>HELP</h4>
                    <ul>
                        <li>
                            <a href="content/blogger2/wp-login.html">Help Center</a>
                        </li>
                        <li>
                            <a href="#">Support</a>
                        </li>
                    </ul>
                </aside>
            </div>
            <!--<div class="column one-fourth">
                <aside class="widget widget_mfn_recent_comments">
                    <h4>HELP</h4>
                    <div class="Recent_comments">
                        <ul>
                            <li>
                                <span class="date_label">November 17, 2014</span>
                                <p>
                                    <i class="icon-user"></i><strong>admin</strong> commented on <a href="content/blogger2/item-1.html#comment-5" title="admin | Aenean ligula mol stie viverra quae melesua porta">Aenean ligula mol stie viverra quae melesua porta</a>
                                </p>
                            </li>
                            <li>
                                <span class="date_label">November 17, 2014</span>
                                <p>
                                    <i class="icon-user"></i><strong>admin</strong> commented on <a href="content/blogger2/item-1.html#comment-4" title="admin | Aenean ligula mol stie viverra quae melesua porta">Aenean ligula mol stie viverra quae melesua porta</a>
                                </p>
                            </li>
                        </ul>
                    </div>
                </aside>
            </div>-->
            <!-- One Fourth (1/4) Column -->
            <div class="column one-fourth">
                <!-- Meta Links Area -->
                <aside id="meta-2" class="widget widget_meta">
                    <h4>HELLO</h4>
                    <ul>
                        <li>
                            <?= Html::a('Our Website', ['site/redirect', 'website' => 'webpuppies.com.sg'], ['target' => '_blank']) ?>
                        </li>
                        <li>
                            <a href="#">Entries</a>
                        </li>
                        <li>
                            <a href="content/blogger2/comments/#">Newsletter</a>
                        </li>
                    </ul>
                </aside>
            </div>
            <!-- One Fourth (1/4) Column -->
            <!--<div class="column one-fourth">
                <aside class="widget widget_tag_cloud">
                    <h4>Tags</h4>
                    <div class="tagcloud">
                        <a href='content/blogger2/tag-page.html' class='tag-link-7' title='2 topics' style='font-size: 8pt;'>Design</a><a href='content/blogger2/tag-page.html' class='tag-link-3' title='3 topics' style='font-size: 13.6pt;'>Framework</a><a href='content/blogger2/tag-page.html' class='tag-link-8' title='3 topics' style='font-size: 13.6pt;'>Motion</a><a href='content/blogger2/tag-page.html' class='tag-link-5' title='4 topics' style='font-size: 18.266666666667pt;'>Themeforest</a><a href='content/blogger2/tag-page.html' class='tag-link-9' title='3 topics' style='font-size: 13.6pt;'>Video</a><a href='content/blogger2/tag-page.html' class='tag-link-6' title='5 topics' style='font-size: 22pt;'>Wordpress</a>
                    </div>
                </aside>
            </div>-->
            <div class="column one-fourth">
                <!-- Meta Links Area -->
                <aside id="meta-2" class="widget widget_meta">
                    <h4>MORE</h4>
                    <ul>
                        <li>
                            <?= Html::a('Our Website', ['site/redirect', 'website' => 'webpuppies.com.sg'], ['target' => '_blank']) ?>
                        </li>
                        <li>
                            <a href="#">Entries</a>
                        </li>
                        <li>
                            <a href="content/blogger2/comments/#">Newsletter</a>
                        </li>
                    </ul>
                </aside>
            </div>
        </div>
    </div>
    <!-- Footer copyright-->
    <div class="footer_copy">
        <div class="container">
            <div class="column one">

                <div class="copyright">
                    &copy; 2017 GoRaisin.
                    <!-- <a target="_blank" rel="nofollow" href="http://bit.ly/1M6lijQ">BeantownThemes</a>-->
                </div>
                <!--Social info area-->
                <ul class="social"></ul>
            </div>
        </div>
    </div>
</footer>
