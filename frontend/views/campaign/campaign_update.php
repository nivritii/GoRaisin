<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use frontend\models\Update;
use artkost\yii2\trumbowyg\Trumbowyg;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\RoadmapSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

//$this->title = 'Roadmaps';
$this->params['breadcrumbs'][] = $this->title;
frontend\assets\AppAsset::register($this);
frontend\assets\RoadmapAsset::register($this);
$user_update = new Update();
?>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>


<div class="roadmap-index">
    <button class="btn btn-info" id="toggle-visibility" data-target="#post-update" style="display: block; margin: 0 auto;width: 40%; class: btn btn-info">Post an Update
    </button>

    <div id="post-update">
        <?php $form = ActiveForm::begin(); ?>
            <div>
                <?php
                echo $form->field($user_update, 'content')->widget(Trumbowyg::className(), [
                    'settings' => [
                        'lang' => 'ru'
                    ]
                ]);
                ?>
            </div>
        <?php $form = ActiveForm::end(); ?>
    </div>

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

<script>
    $(document).ready(function(){

        /* Button which shows and hides div with a id of "post-details" */
        $( "#toggle-visibility" ).click(function() {

            var target_selector = $(this).attr('data-target');
            var $target = $( target_selector );

            if ($target.is(':hidden'))
            {
                $target.show( "slow" );
            }
            else
            {
                $target.hide( "slow" );
            }

            console.log($target.is(':visible'));


        });
    });
</script>
