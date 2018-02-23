<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use frontend\models\Update;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\RoadmapSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

//$this->title = 'Roadmaps';
$this->params['breadcrumbs'][] = $this->title;
frontend\assets\AppAsset::register($this);
frontend\assets\RoadmapAsset::register($this);
$user_update = new Update();
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>


<div class="roadmap-index">
    <button class="btn btn-info" data-toggle="modal" data-target="#squarespaceModal"
            style="display: block; margin: 0 auto;width: 40%">Post an Update
    </button>
    <section id="cd-timeline" class="cd-container">
        <?php foreach ($updates as $update) { ?>
            <div class="cd-timeline-block">
                <div class="cd-timeline-img <?= $update->image->r_background_color ?>">
                    <?= Html::img('@web/images/roadmap/' . $update->image->r_image) ?>
                </div> <!-- cd-timeline-img -->

                <div class="cd-timeline-content">
                    <h2><?= $update->title ?></h2>
                    <p><?= $update->content ?></p>
                    <a href="<?= Url::to('campaign/view', ['updateId' => $update->id]) ?>" class="cd-read-more">Read
                        more</a>
                    <span class="cd-date"><?= $update->timestamp ?></span>
                </div> <!-- cd-timeline-content -->
            </div> <!-- cd-timeline-block -->
        <?php } ?>
    </section>
</div>

<!-- line modal -->
<div class="modal fade" id="squarespaceModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span
                            class="sr-only">Close</span></button>
                <h3 class="modal-title" id="lineModalLabel">Post an Update</h3>
            </div>
            <div class="container col-xs-12" style="height: 400px;">

                <!-- content goes here -->
                <form>
                    <div>
                        <?php
                        echo \artkost\yii2\trumbowyg\Trumbowyg::widget([
                            'name' => 'cLDesc',
                            'settings' => [
                                'lang' => 'en'
                            ]
                        ]);
                        ?>
                    </div>
                </form>

            </div>
            <div class="modal-footer">
                <div class="btn-group btn-group-justified" role="group" aria-label="group button">
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-default" data-dismiss="modal" role="button">Close</button>
                    </div>
                    <div class="btn-group btn-delete hidden" role="group">
                        <button type="button" id="delImage" class="btn btn-default btn-hover-red" data-dismiss="modal"
                                role="button">Delete
                        </button>
                    </div>
                    <div class="btn-group" role="group">
                        <button type="button" id="saveImage" class="btn btn-default btn-hover-green" data-action="save"
                                role="button">Save
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>