<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use frontend\models\Category;
use frontend\assets\HomePageAsset;
use yii\widgets\ListView;
use kartik\tabs\TabsX;
use frontend\models\User;
use yii\bootstrap\Modal;

/*HomePageAsset::register($this);*/

/* @var $this yii\web\View */
/* @var $model frontend\models\Campaign */

$this->title = $model->c_title . 'GoRaisin';
$this->params['breadcrumbs'][] = ['label' => 'Campaigns', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
/*frontend\assets\HomePageAsset::register($this);*/
frontend\assets\RoadmapAsset::register($this);
?>
<div class="campaign-view">
    <!-- Main Content -->
    <div id="Content" style="padding: 0px">
        <div class="content_wrapper clearfix">
            <div class="sections_group" style="width: 55%;float: left;margin-left: 10%">
                <div style="border-right: .5px solid #f0f0f0; padding-top: 3%">
                    <div class="column zero" style="width: 100%">
                        <div class="col-xs-1" style="display: block; margin: 0 auto;padding-top:5%">
                            <?= Html::img('@web/' . $model->cAuthor->image, ['style' => 'height:40px;width:40px;border-radius:10px;margin-bottom:10%']) ?>
                            <br/>

                            <?=
                            Html::a($model->cAuthor->username, ['viewcompany', 'id' => $model->c_id], [
                                'id' => 'view-company',
                                'class' => 'view-author',
                                'data-toggle' => 'modal',
                                'data-target' => '#view-author',
                                'style' => 'color:#494949;padding:3px;border-radius:5px;font-size:15px;'
                            ])
                            ?>
                        </div>
                        <div style="clear:both; display: inline-block;vertical-align: middle;margin-left: 10%;width: 80%;">
                            <h1 class="title" style="color: #6b0d7ce8"><?= $model->c_title ?></h1>
                            <p class="" style="font-size: 13px;"><?= $model->c_description ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sections_group"
                 style="width: 55%;float: left; margin-left: 10%; border-right: .5px solid #f0f0f0">
                <div id=" " class="no-title no-share  post  format-standard has-post-thumbnail  category-hot-news   ">
                    <div class="section section-post-header">
                        <div class="section_wrapper clearfix">
                            <!-- Post Featured Element (image / video / gallery)-->
                            <!-- One full width row-->
                            <div class="column one single-photo-wrapper image"
                                 style="margin-top: 0px; margin-right: 0%; margin-bottom: 0px; margin-left: 0%">
                                <div class="image_frame scale-with-grid" style="width: 100%">
                                    <div class="image_wrapper">
                                        <?php
                                        $video = $model->c_video;
                                        $width = '800px';
                                        $height = '450px';
                                        ?>
                                        <iframe id="ytplayer" type="text/html" width="<?= $width ?>"
                                                height="<?= $height ?>"
                                                src="https://www.youtube.com/embed/<?= $video ?>?rel=0&showinfo=0&color=white&iv_load_policy=3"
                                                frameborder="0" allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>
                            <!-- Post Header-->
                            <!-- One full width row-->
                            <div class="column one post-header">
                                <div class="title_wrapper">
                                    <div class="post-meta clearfix">
                                        <div class="category meta-categories" style="width: 100%">
                                            <div style="display: inline-block;float: right;margin-right: 3%">
                                                <p style="font-size: 15px;color: #000000;"><i
                                                            class="glyphicon glyphicon-map-marker"></i>&nbsp;<?php echo $model->cLocation->country ?>
                                                </p>
                                            </div>
                                            <div style="clear: both;display: inline-block;margin-left: 60%">
                                                <p style="font-size: 15px;color: #000000;"><i
                                                            class="glyphicon glyphicon-tag"></i>&nbsp;<?php echo $model->cCat->name ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Post Content-->
                    <div class="post-wrapper-content">
                        <div class="section the_content has_content">
                            <div class="section_wrapper">
                                <div class="the_content_wrapper">
                                    <div class="mcb-column one-second column_tabs ">
                                        <?php
                                        $items = [
                                            [
                                                'label' => '<i class="glyphicon glyphicon-picture"></i> Story',
                                                'content' => $this->render('campaign_content', ['model' => $model]),
                                                'active' => true
                                            ],
                                            [
                                                'label' => '<i class="glyphicon glyphicon-bell"></i> Updates',
                                                'content' => $this->render('campaign_update', ['model' => $model, 'updates' => $updates, 'user_update' => new \frontend\models\Update()]),
                                                //'linkOptions'=>['data-url'=>\yii\helpers\Url::to(['/campaign/form'])]
                                            ],
                                            [
                                                'label' => '<i class="glyphicon glyphicon-comment"></i> Comments',
                                                'content' => $this->render('campaign_comments', ['comments' => $comments, 'model' => $model, 'checkIfBacker' => $checkIfBacker, 'checkIfGuest' => $checkIfGuest]),
                                            ],
                                            [
                                                'label' => '<i class="glyphicon glyphicon-question-sign"></i> FAQ',
                                                'content' => $this->render('campaign_faq', ['model' => $model, 'faqs' => $faqs]),
                                            ],
                                        ];

                                        // Tab Below Centered
                                        echo TabsX::widget([
                                            'items' => $items,
                                            'position' => TabsX::POS_ABOVE,
                                            'align' => TabsX::ALIGN_CENTER,
                                            'bordered' => false,
                                            'encodeLabels' => false
                                        ]);

                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sidebar area-->
            <div class="sidebar sidebar-1 four columns" style="width: 25%;float: left; margin-right: 8%;">
                <div class="widget-area clearfix" style="padding: 9px 0px 0px;">
                    <p>Target achieved:</p>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar"
                             aria-valuemin="0" aria-valuemax="100"
                             style="width:<?= $progress ?>%; background-color:#7d109152; color: black">
                            <b><?= $progress ?>%</b>
                        </div>
                    </div>
                    <h3 style="margin-top:25px; margin-bottom:0px;">US$<?= floor($backed) ?></h3>
                    <?php
                    if ($model->c_goal != 0) {
                        ?>
                        <h3 class="title-price" style="margin-top:0px;">
                            <small>Target U$S<?= $model->c_goal ?></small>
                        </h3>
                        <?php
                    } else {
                        ?>
                        <h3 class="title-price" style="margin-top:0px;">
                            <small>pledged of U$S N.A goal</small>
                        </h3>
                    <?php } ?>

                    <h3 style="margin-top:25px; margin-bottom:0px;"><?= $noOfBackers ?></h3>
                    <h3 class="title-price" style="margin-top:0px;">
                        <small>Number of backers</small>
                    </h3>

                    <?php
                    $currentDate = date('Y-m-d');
                    if ($model->c_start_date == null || $model->c_end_date == null) {
                        $days = 'N.A';
                    } else {
                        $diff = strtotime($model->c_start_date) - strtotime($currentDate);
                        $days = ceil($diff / 86400);

                        $diffEndDate = strtotime($model->c_end_date) - strtotime($currentDate);
                        $tillDays = ceil($diffEndDate / 86400);
                    }
                    if ($days > 0) {
                        ?>
                        <h3 class="title-price" style="margin-top:25px;">
                            <small>Begins in</small>
                        </h3>
                        <h3 style="margin-top:0px; margin-bottom:0px;" id="startDate"><?= $days; ?>
                            <small> days</small>
                        </h3>
                        <!--                    <h3 class="title-price" style="margin-top:0px;"><small>more days to go</small></h3>-->
                    <?php }
                    if ($days <= 0 && $tillDays > 0) {
                        ?>
                        <h3 class="title-price" style="margin-top:25px;">
                            <small>Ends in</small>
                        </h3>
                        <h3 style="margin-top:0px; margin-bottom:0px;" id="endDate"><?= $tillDays; ?>
                            <small> days</small>
                        </h3>
                    <?php }
                    if ($days <= 0 && $tillDays <= 0) {
                        ?>
                        <h3 class="title-price" style="margin-top:25px;">
                            <small>Ended as of</small>
                        </h3>
                        <h3 style="margin-top:0px; margin-bottom:0px;" id="endDate"><?= $model->c_end_date?>
                        </h3>
                    <?php } ?>
                    <?php if ((Yii::$app->user->isGuest || Yii::$app->user->identity->id != $model->c_author) /*&& $model->c_status == 'published'*/) { ?>
                        <div class="section" style="margin-top:25px; padding-bottom:20px;">
                            <a href="<?= Url::to(['campaign/fund', 'id' => $model->c_id]) ?>">
                                <button class="btn btn-default"
                                        style="width:100%; background-color:#8f13a5f0; color: white"><h4><span
                                                style="margin-right:20px" class="glyphicon glyphicon-gift"
                                                aria-hidden="true"></span>Fund this Campaign</h4></button>
                            </a>
                        </div>
                    <?php } elseif (Yii::$app->user->id == $model->c_author && $model->c_status == 'published') { ?>
                        <div class="section" style="margin-top:25px; padding-bottom:20px;">
                            <a href="<?= Url::to(['campaign/edit', 'id' => $model->c_id]) ?>">
                                <button class="btn btn-default"
                                        style="width:100%; background-color:#8f13a5f0; color: white"><h4><span
                                                style="margin-right:20px" class="glyphicon glyphicon-edit"
                                                aria-hidden="true"></span>Edit</h4></button>
                            </a>
                        </div>
                    <?php } elseif (Yii::$app->user->id == $model->c_author && $model->c_status == 'draft') { ?>
                        <a href="<?= Url::to(['campaign/edit', 'id' => $model->c_id]) ?>">
                            <button class="btn btn-default"
                                    style="width:100%; background-color:#8f13a5f0; color: white;border-radius: 10px">
                                <h4><span style="margin-right:15px" class="glyphicon glyphicon-edit"
                                          aria-hidden="true"></span>Edit</h4></button>
                        </a>
                        <br/><br/>

                        <?/*=Html::a('<span class="glyphicon glyphicon-cloud-upload"></span>Submit for Review',['campaign/review','id'=>$model->c_id],['style' => 'text-decoration: none;width: 100%;border-radius:10px','class' => 'btn btn-info']) */?>
                        <!--<a href="<?/*= Url::to(['campaign/review','id'=>$model->c_id])*/?>" style="text-decoration: none">
                            <?/*= Html::submitButton('<span class="glyphicon glyphicon-cloud-upload"></span> Submit for Review',['class' => 'btn btn-info','value' => 'moderation','name' => 'moderation','style' => 'width: 100%;border-radius:10px']) */?>
                        </a>-->
                        <br/><br/>
                        <div style="text-align: center">
                            <?= Html::a('<span class="glyphicon glyphicon-remove"></span>Delete Campaign', ['campaign/delete', 'id' => $model->c_id], ['style' => 'font-size:15px;color:#000000']) ?>
                        </div>
                    <?php } elseif (Yii::$app->user->id == $model->c_author && $model->c_status == 'moderation') { ?>
                        <a href="<?= Url::to(['campaign/view', 'id' => $model->c_id]) ?>">
                            <button disabled class="btn btn-default"
                                    style="width:100%; background-color:#8f13a5f0; color: white"><h4><span
                                            style="margin-right:20px" class="glyphicon glyphicon-edit"
                                            aria-hidden="true"></span>Under Review</h4></button>
                        </a>
                        <br/><br/>
                        <div style="text-align: center">
                            <?= Html::a('<span class="glyphicon glyphicon-remove"></span>Delete Campaign', ['campaign/delete', 'id' => $model->c_id], ['style' => 'font-size:15px;color:#000000']) ?>
                        </div>
                    <?php } ?>
                    <div class="section" style="padding-bottom:20px;">
                        <h6><span class="glyphicon glyphicon-heart-empty" style="cursor:pointer;"></span> All or
                            nothing. This project will only be funded if it reaches its goal
                            by <?= $model->c_end_date ?>.</h6>
                    </div>
                </div>
                <!--<hr class="style4" style="margin-top: 20%">
                <h3 style="margin-top: 15%">Rewards</h3>
                <br />-->
                <!--<form enctype="multipart/form-data" style="margin-top: 3%" action="fund?id=<? /*=$model->c_id*/ ?>" method="post">
                    <div class="panel-group" id="faqAccordion" style="width: 100%">
                        <div class="panel panel-default panel-faq">
                            <div class="panel-heading" style="background-color: #ffffff">
                                <a data-toggle="collapse" data-parent="#accordion-cat-1" href="#noReward" style="text-decoration: none;">
                                    <h4 class="panel-title" style="font-size: 20px">
                                        Pledge an amount and be entitled to a discount
                                    </h4>
                                </a>
                            </div>
                            <div id="noReward" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <div class="form-group">
                                        <div style="alignment:center">
                                            <div style="display: inline-block;width: 35%;">
                                                <p class="item-title">Pledge Amount:</p>
                                            </div>
                                            <div style="display: inline-block;margin-left: 1%;width: 45%">
                                                <input type="text" style="width: 100%" name="reward">
                                            </div>
                                        </div>
                                        <input class="btn btn-md btn-info" type="submit" value="Pledge" id="submit" style="color: #ffffff;width: 25%;background-color: #940094;border: none;float: left;margin-left: 38%">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php /*foreach ($rewards as $reward) {*/ ?>
                            <div class="panel panel-default panel-faq">
                                <div class="panel-heading" style="background-color: #ffffff">
                                    <a  data-toggle="collapse" data-parent="#accordion-cat-1" href="#<? /*=$reward->r_id*/ ?>" style="text-decoration: none">
                                        <h4 class="panel-title" style="font-size: 20px">
                                            <input type="radio" name="reward" value="<? /*=$reward->r_pledge_amt*/ ?>" hidden>
                                            <? /*=$reward->r_description*/ ?>
                                        </h4>
                                    </a>
                                </div>
                                <div id="<? /*=$reward->r_id*/ ?>" class="panel-collapse collapse">
                                    <div id="fund-div">
                                        <table>
                                            <tr>
                                                <td style="width: 1%"><input type="radio" name="reward" value="<? /*=$reward->r_pledge_amt*/ ?>"></td>
                                                <td style="width: 95%">
                                                    <div class="form-group">
                                                        <div style="text-align: left">
                                                            <div>
                                                                <p style="font-size: 15px"><? /*=$reward->r_description*/ ?></p>
                                                            </div>
                                                        </div>
                                                        <br/>
                                                        <div style="alignment:center;text-align: left">
                                                            <div style="display: inline-block;">
                                                                <p class="item-title">Pledge Amount: </p>
                                                            </div>
                                                            <div style="display: inline-block;margin-left: 2%;width: 47%">
                                                                <input type="text" disabled value="<? /*=$reward->r_pledge_amt*/ ?>" style="width: 100%">
                                                            </div>
                                                        </div>
                                                        <br/>
                                                        <div style="alignment:center;text-align: left">
                                                            <input class="btn btn-md btn-info" type="submit" id="submit" value="Pledge" style="color: #ffffff;width: 25%;background-color: #940094;border: none;float: left;margin-left: 36%">
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        <?php /*}*/ ?>
                    </div>
                </form>-->
            </div>
        </div>
    </div>
</div>

<?php
Modal::begin([
    'id' => 'view-author',
    'header' => '<h4 class="modal-title">About the author</h4>',
]);

$campaignId = $model->c_id;
$requestCreateUrl = Url::toRoute('viewcompany');
$js = <<<JS
$('#view-author').on('click', function () {
    $('.modal-title').html('About the author');
    $.get('{$requestCreateUrl}',{id: $model->c_id},
        function (data) {
            $('.modal-body').html(data);
        }  
    );
});
JS;
$this->registerJs($js);
Modal::end();
?>

