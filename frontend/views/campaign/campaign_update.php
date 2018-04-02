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

<form class="roadmap-index" enctype="multipart/form-data">
    <?php if (!Yii::$app->user->isGuest && Yii::$app->user->identity->id == $model->c_author) { ?>
        <div class="well text-center">
            <p style="padding-top: 10px"><b><u><a href=<?= Url::to(['campaign/postupdate', 'id' => $model->c_id]) ?>>Feel
                            free to add an update to your campaign.</a></u></b></p>
        </div>
    <?php } ?>
    <div class="section-timeline">
        <section id="cd-timeline" class="cd-container" id="step-1">
            <?php foreach ($updates as $update) {
                $small = substr($update->content, 0, 1000) ?>
                <div class="cd-timeline-block">
                    <div class="cd-timeline-img <?= $update->image->r_background_color ?>">
                        <?= Html::img('@web/images/roadmap/' . $update->image->r_image) ?>
                    </div> <!-- cd-timeline-img -->
                    <div class="cd-timeline-content">
                        <div><b><?= $update->title ?></b></div>
                        <small><?= $update->timestamp ?></small>
                        <p><?= $small ?></p>
                        <span class="cd-date"></span>
                        <a onclick="viewUpdate(<?= $update->id ?>)" class="cd-read-more">Read more</a>
                    </div> <!-- cd-timeline-content -->
                </div> <!-- cd-timeline-block -->
            <?php } ?>
        </section>
    </div>
</form>

<?php foreach ($updates as $update) { ?>
    <div class="ui-helper-hidden update-clear <?= $update->id ?>">
        <a onclick="viewAllUpdates()">View All Updates</a>
        <h2><?= $update->title ?></h2>
        <small><?= $update->timestamp ?></small>
        <p><?= $update->content ?></p>
    </div>
<?php } ?>


<script>
    function viewUpdate(id) {
        $('.section-timeline').hide();
        $('.update-clear').hide();
        $('.' + id).show();
    }

    function viewAllUpdates() {
        $('.section-timeline').show();
        $('.update-clear').hide();
    }
</script>
