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

<div class="container">
    <div class="row form-group">
        <div class="col-xs-12" hidden>
            <ul class="nav nav-pills nav-justified thumbnail setup-panel" id="myNav">
                <li id="navStep1" class="li-nav active" step="#step-1">
                    <a>
                        <h4 class="list-group-item-heading">Step 1</h4>
                        <p class="list-group-item-text">First step description</p>
                    </a>
                </li>
                <li id="navStep2" class="li-nav disabled" step="#step-2">
                    <a>
                        <h4 class="list-group-item-heading">Step 2</h4>
                        <p class="list-group-item-text">Second step description</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>

<form class="roadmap-index" enctype="multipart/form-data">
    <?php if (!Yii::$app->user->isGuest && Yii::$app->user->identity->id == $model->c_author) { ?>
        <div class="well text-center">
            <p style="padding-top: 10px"><b><u><a href=<?= Url::to(['campaign/postupdate', 'id' => $model->c_id]) ?>>Feel
                            free to add an update to your campaign.</a></u></b></p>
        </div>
    <?php } ?>
    <section id="cd-timeline" class="cd-container" id="step-1">
        <?php foreach ($updates as $update) {
            $small = substr($update->content, 0, 1000) ?>
            <div class="cd-timeline-block">

                <div class="cd-timeline-img <?= $update->image->r_background_color ?>">
                    <?= Html::img('@web/images/roadmap/' . $update->image->r_image) ?>
                </div> <!-- cd-timeline-img -->

                <div class="cd-timeline-content">
                    <h2><?= $update->title ?></h2>
                    <p><?= $small ?></p>
                    <span class="cd-date" style="padding-left:10px"><?= $update->timestamp ?></span>
                    <a onclick="step1Next()" class="cd-read-more"
                    style="text-align: right">Read more</a>
                    <input onclick="step1Next()" class="btn btn-md btn-info" value="Next">
                </div> <!-- cd-timeline-content -->

            </div> <!-- cd-timeline-block -->
        <?php } ?>

    </section>
</form>

<form class="roadmap-index" id="step-2">

    <?php foreach ($updates

    as $update) {
    $small = substr($update->content, 0, 1000); ?>
    <h2><?= $update->title ?></h2>
    <p><?= $small ?></p>
    <button onclick="prevStep()" class="btn btn-md btn-info" value="Prev">
        <span class="cd-date"><?= $update->timestamp ?></span>
        <?php } ?>

</form>

<script>
    var currentStep = 1;

    $(document).ready(function () {

        $('.li-nav').click(function () {

            var $targetStep = $($(this).attr('step'));
            currentStep = parseInt($(this).attr('id').substr(7));

            if (!$(this).hasClass('disabled')) {
                $('.li-nav.active').removeClass('active');
                $(this).addClass('active');
                $('.setup-content').hide();
                $targetStep.show();
            }
        });

        $('#navStep1').click();

    });

    function step1Next() {
        //You can make only one function for next, and inside you can check the current step
        if (true) {//Insert here your validation of the first step
            currentStep += 1;
            $('#navStep' + currentStep).removeClass('disabled');
            $('#navStep' + currentStep).click();
        }
    }

    function prevStep() {
        //Notice that the btn prev not exist in the first step
        currentStep -= 1;
        $('#navStep' + currentStep).click();
    }
</script>
