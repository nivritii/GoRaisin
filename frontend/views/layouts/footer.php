<?php
use yii\helpers\Url;
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
                            <h4>Useful links</h4>
                            <ul>
                                <li>
                                    <a href="content/blogger2/wp-login.html">Log in</a>
                                </li>
                                <li>
                                    <a href="#">Entries <abbr title="Really Simple Syndication">RSS</abbr></a>
                                </li>
                                <li>
                                    <a href="content/blogger2/comments/#">Comments <abbr title="Really Simple Syndication">RSS</abbr></a>
                                </li>
                                <li>
                                    <a href="https://wordpress.org/" title="Powered by WordPress, state-of-the-art semantic personal publishing platform.">WordPress.org</a>
                                </li>
                            </ul>
                        </aside>
                    </div>
                    <!-- One Fourth (1/4) Column -->
                    <div class="column one-fourth">
                        <!-- Recent Comments Area -->
                        <aside class="widget widget_mfn_recent_comments">
                            <h4>Latest comments</h4>
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
                    </div>
                    <!-- One Fourth (1/4) Column -->
                    <div class="column one-fourth">
                        <!-- Text Area -->
                        <aside class="widget widget_text">
                            <h4>About us</h4>
                            <div class="textwidget">
                                <h6>Nulla risus ante, luctus et placerat quis, efficitur nec nisl. Cras iaculis tristique.</h6>
                                <p>
                                    Etiam at nibh turpis! Vestibulum mattis risus eget dolor finibus, ut luctus est congue. Ut sit amet interdum erat; quis malesuada lacus. Sed mauris diam, sodales a imperdiet ut.
                                </p>
                            </div>
                        </aside>
                    </div>
                    <!-- One Fourth (1/4) Column -->
                    <div class="column one-fourth">
                        <!--Tag Cloud -->
                        <aside class="widget widget_tag_cloud">
                            <h4>Tags</h4>
                            <div class="tagcloud">
                                <a href='content/blogger2/tag-page.html' class='tag-link-7' title='2 topics' style='font-size: 8pt;'>Design</a><a href='content/blogger2/tag-page.html' class='tag-link-3' title='3 topics' style='font-size: 13.6pt;'>Framework</a><a href='content/blogger2/tag-page.html' class='tag-link-8' title='3 topics' style='font-size: 13.6pt;'>Motion</a><a href='content/blogger2/tag-page.html' class='tag-link-5' title='4 topics' style='font-size: 18.266666666667pt;'>Themeforest</a><a href='content/blogger2/tag-page.html' class='tag-link-9' title='3 topics' style='font-size: 13.6pt;'>Video</a><a href='content/blogger2/tag-page.html' class='tag-link-6' title='5 topics' style='font-size: 22pt;'>Wordpress</a>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
            <!-- Footer copyright-->
            <div class="footer_copy">
                <div class="container">
                    <div class="column one">

                        <div class="copyright">
                            &copy; 2017 BeBlogger 2 - BeTheme. Muffin group - HTML by <a target="_blank" rel="nofollow" href="http://bit.ly/1M6lijQ">BeantownThemes</a>
                        </div>
                        <!--Social info area-->
                        <ul class="social"></ul>
                    </div>
                </div>
            </div>
        </footer>

<!--<footer>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <ul class="list-inline text-center">
              <li class="list-inline-item">
                <a href="#">
                    <li class="nav-item">
                        <a class="nav-link" href="<?=Url::to(['/site/contact'])?>">Support</a>
                    </li>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                    <li class="nav-item">
                        <a class="nav-link" href="<?=Url::to(['/site/about'])?>">About</a>
                    </li>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                    <li class="nav-item">
                        <a class="nav-link" href="<?=Url::to(['#'])?>">Terms of Use</a>
                    </li>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                    <li class="nav-item">
                        <a class="nav-link" href="<?=Url::to(['#'])?>">Whitepaper</a>
                    </li>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                    <li class="nav-item">
                        <a class="nav-link" href="<?=Url::to(['#'])?>">Team</a>
                    </li>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>
            </ul>
            <p class="copyright text-muted">Copyright &copy; Webpuppies 2017</p>
          </div>
        </div>
      </div>
    </footer>-->