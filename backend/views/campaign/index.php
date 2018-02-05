<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CampaignSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Campaigns - GoRaisin Backend';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="campaign-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div style="width: 50%">
    <h3 style="color: black">Search</h3>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>
    </div>
    <hr style=" height:1px;border:none;border-top:1px solid #185598;" />


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        /*'filterModel' => $searchModel,*/
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'c_title',
            /*'c_image',*/
            'c_author',
            /*'c_description',*/
            /*'c_start_date',
            'c_end_date',*/
            //'c_goal',
            //'c_id',
            //'c_video',
            //'c_description_long',
            //'c_author',
            'c_created_at',
            //'c_display_name',
            //'c_email:email',
            //'c_location',
            //'c_biography:ntext',
            //'c_social_profile',
            'c_status',
            //'c_cat_id',
            //'c_new_tag',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
