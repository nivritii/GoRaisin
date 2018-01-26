<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\RoadmapSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Roadmaps';
$this->params['breadcrumbs'][] = $this->title;
frontend\assets\AppAsset::register($this);
frontend\assets\RoadmapAsset::register($this);
?>
<div class="roadmap-index">

<section id="cd-timeline" class="cd-container">
    <?php foreach ($roadmap as $update) {?>
        <div class="cd-timeline-block">
            <div class="cd-timeline-img <?=$update->image->r_background_color?>">
                <?= Html::img('@web/images/roadmap/'.$update->image->r_image)?>
            </div> <!-- cd-timeline-img -->

            <div class="cd-timeline-content">
                <h2><?=$update->title?></h2>
                <p><?=$update->content?></p>
                <a href="<?=Url::to('campaign/view',['updateId'=>$update->id])?>" class="cd-read-more">Read more</a>
                <span class="cd-date"><?=$update->timestamp?></span>
            </div> <!-- cd-timeline-content -->
        </div> <!-- cd-timeline-block -->
    <?php }?>
    </section>
</div>