<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\Comment;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model frontend\models\Campaign */
/* @var $form ActiveForm */
$userComment = new Comment();
?>
<div class="form">
    <div class="section section-post-comments">
        <div class="section_wrapper clearfix">
            <!--         One full width row-->
            <div class="column one comments">
                <div id="comments">
                    <form action="comment?id=<?=$model->c_id?>" method="post" role="form">
                        <div class="form-group">
                            <div style="display: inline-block;float: left;width: 100%;class="textEditor">
                            <textarea rows="3" type="text" style="width: 100%;" name="comment" id="comment"></textarea>
                        </div>
                </div>

                <button class="btn btn-info" style="background-color: #940094;color: #ffffff;margin-top: 3%">Comment</button>
                </form>
                <br />
                <hr class="no_line" style="margin: 0 auto 30px;" />
                <ol class="commentlist">
                    <?php foreach($comments as $comment){?>
                        <li class="comment byuser comment-author-admin bypostauthor odd alt thread-odd thread-alt depth-1" id="comment-5">
                            <div id="div-comment-5" class="comment-body">
                                <div class="comment-author vcard">
                                    <p class="avatar avatar-64 photo"><?=Html::img(Url::to('@web/'.$comment->commentUser->image))?></p><cite class="fn"><?=$comment->commentUser->username?></cite><span class="says"> says:</span>
                                </div>
                                <div class="comment-meta commentmetadata">
                                    <a href="item-1.html#comment-5"><?=$comment->comment_datetime?></a>
                                </div>
                                <p>
                                    <?=$comment->comment_content?>
                                </p>
                            </div>
                        </li>
                    <?php }?>
                    <!--                    <li class="comment byuser comment-author-admin bypostauthor even thread-even depth-1 parent" id="comment-2">-->
                    <!--                        <div id="div-comment-2" class="comment-body">-->
                    <!--                            <div class="comment-author vcard">-->
                    <!--                                <img alt='' src='http://0.gravatar.com/avatar/057e2eb392b95a2ecfc9d32d554e3917?s=64&amp;d=mm&amp;r=g' class='avatar avatar-64 photo' height='64' width='64' /><cite class="fn">admin</cite><span class="says">says:</span>-->
                    <!--                            </div>-->
                    <!--                            <div class="comment-meta commentmetadata">-->
                    <!--                                <a href="item-1.html#comment-2"> November 17, 2014 at 11:23 am</a>-->
                    <!--                            </div>-->
                    <!--                            <p>-->
                    <!--                                Donec vestibulum justo a diam ultricies pellentesque. Quisque mattis diam vel lacus tincidunt eleme ntum. Sed vitae adipiscing turpis. Aenean ligula nibh, molestie id viverrra.-->
                    <!--                            </p>-->
                    <!--                        </div>-->
                    <!--                        <ul class="children">-->
                    <!--                            <li class="comment byuser comment-author-admin bypostauthor odd alt depth-2 parent" id="comment-3">-->
                    <!--                                <div id="div-comment-3" class="comment-body">-->
                    <!--                                    <div class="comment-author vcard">-->
                    <!--                                        <img alt='' src='http://0.gravatar.com/avatar/057e2eb392b95a2ecfc9d32d554e3917?s=64&amp;d=mm&amp;r=g' class='avatar avatar-64 photo' height='64' width='64' /><cite class="fn">admin</cite><span class="says">says:</span>-->
                    <!--                                    </div>-->
                    <!--                                    <div class="comment-meta commentmetadata">-->
                    <!--                                        <a href="item-1.html#comment-3"> November 17, 2014 at 11:24 am</a>-->
                    <!--                                    </div>-->
                    <!--                                    <p>-->
                    <!--                                        Vitae adipiscing turpis. Aenean ligula nibh, molestie id viverra a, dapibus at dolor. In iaculis viverra neque, ac ele molestie id viverra aifend ante lobortis id. In viverra ipsum stie id viverra a.-->
                    <!--                                    </p>-->
                    <!--                                </div>-->
                    <!--                                <ul class="children">-->
                    <!--                                    <li class="comment byuser comment-author-admin bypostauthor even depth-3" id="comment-4">-->
                    <!--                                        <div id="div-comment-4" class="comment-body">-->
                    <!--                                            <div class="comment-author vcard">-->
                    <!--                                                <img alt='' src='http://0.gravatar.com/avatar/057e2eb392b95a2ecfc9d32d554e3917?s=64&amp;d=mm&amp;r=g' class='avatar avatar-64 photo' height='64' width='64' /><cite class="fn">admin</cite><span class="says">says:</span>-->
                    <!--                                            </div>-->
                    <!--                                            <div class="comment-meta commentmetadata">-->
                    <!--                                                <a href="item-1.html#comment-4"> November 17, 2014 at 11:24 am</a>-->
                    <!--                                            </div>-->
                    <!--                                            <p>-->
                    <!--                                                Donec vestibulum justo a diam ultricies pellentesque. Quisque mattis diam vel lacus tincidunt eleme ntum. Sed vitae adipiscing turpis. Aenean ligula nibh, molestie id viverrra.-->
                    <!--                                            </p>-->
                    <!--                                        </div>-->
                    <!--                                    </li>-->
                    <!--                                </ul>-->
                    <!--                            </li>-->
                    <!--                        </ul>-->
                    <!--                    </li>-->
                </ol>
            </div>
        </div>
    </div>
</div>
</div><!-- _form -->
