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
<form action="comment?id=<?= $model->c_id ?>" method="post" role="form">
    <div class="form">
        <div class="section section-post-comments">
            <div class="section_wrapper clearfix">
                <!--         One full width row-->
                <div class="column one comments">
                    <?php if ($checkIfGuest) { ?>
                        <div class="well text-center">
                            <p style="padding-top: 10px">Only backers can post comments. <b><a
                                            href=<?= Url::to(['site/login']) ?>>Log In</a></b></p>
                        </div>
                    <?php } elseif ($checkIfBacker || ($model->c_author==Yii::$app->user->getId())) { ?>
                        <div class="text-left">
                        <textarea rows="3" type="text" style="width: 100%;" name="comment"
                                  id="comment" placeholder="Leave a comment"></textarea>
                            <p><u>Be respectful and considerate.</u></p>
                            <button class="btn btn-info" type="submit">Comment</button>
                        </div>
                    <?php } else { ?>
                        <div class="well text-center">
                            <p style="padding-top: 10px">Only backers can post comments.</p>
                        </div>
                    <?php } ?>
                    <div style="display: inline-block;float: left;width: 100%;class=" textEditor
                    ">

                    <hr class="no_line" style="margin: 0 auto 30px;"/>
                    <?php foreach ($comments as $comment) { ?>
                        <li class="comment byuser comment-author-admin bypostauthor odd alt thread-odd thread-alt depth-1"
                            id="comment-5" style="list-style-type:none;">
                            <div id="div-comment-5" class="well comment-body">
                                <div class="comment-author vcard">
                                    <img src="<?=Url::to('@web/'.$comment->commentUser->image)?>" style="width: 50px; height: 50px;">
                                    <cite class="fn"><?= $comment->commentUser->username ?></cite>
                                    <span class="says"> made a comment on: </span>
                                    <span><?= $comment->comment_datetime ?></span>
                                </div>
                                <br/>
                                <div class="post-description">
                                    <p><?= $comment->comment_content ?></p>
                                </div>
                            </div>
                        </li>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    </div><!-- _form -->
</form>