<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\tabs\TabsX;
use backend\models\Campaign;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CampaignSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Campaigns - GoRaisin Backend';
$this->params['breadcrumbs'][] = $this->title;
$model = new Campaign();
?>
<div class="campaign-index">

    <div style="text-align: center">
        <h2>Campaign Review</h2>
    </div>
    <br />


    <?php
    $items = [
        [
            'label'=>' Moderation',
            'content'=>$this->render('viewModeration',['model' => $model]),
            'active'=>true
        ],
        [
            'label'=>' Publish',
            'content'=>$this->render('viewPublish',['model' => $model]),
        ],
        [
            'label'=>' Draft',
            'content'=>$this->render('viewDraft',['model' => $model]),
        ],
    ];

    echo TabsX::widget([
        'items'=>$items,
        'position'=>TabsX::POS_ABOVE,
        'encodeLabels'=>false
    ]);
    ?>

</div>
