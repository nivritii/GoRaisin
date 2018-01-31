<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\CampaignSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Campaigns';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="campaign-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Campaign', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'c_title',
            'c_image',
            /*'c_description',*/
            /*'c_start_date',
            'c_end_date',*/
            //'c_goal',
            //'c_id',
            /*'c_video',*/
            /*'c_description_long:ntext',*/
            //'c_author',
            //'c_created_at',
            /*'c_display_name',*/
            /*'c_email:email',*/
            //'c_location',
            /*'c_biography:ntext',*/
            //'c_social_profile',
            //'c_status',
            'c_cat_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
