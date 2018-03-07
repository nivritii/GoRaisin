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
                        <p class="item-title">Leave a comment</p>
                        <div class="form-group">
                            <div style="display: inline-block;float: left;width: 100%;class="textEditor">
                            <textarea rows="3" type="text" style="width: 100%;" name="comment" id="comment"></textarea>
                        </div>
                        <hr style="no-line">
                        <p><u>Be respectful and considerate.</u></p>
                        <button class="btn btn-info">Comment</button>
                </div>


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
                </ol>
            </div>
        </div>
    </div>
</div>
</div><!-- _form -->
