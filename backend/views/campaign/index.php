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

    <div style="text-align: center">
        <h2>Campaign Publish Review</h2>
    </div>
    <br />

    <div style="width: 50%;text-align: center;margin-left: 25%">
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

            ['class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete}',
                'buttons' => [
                    'view' => function ($url) {
                        return Html::a('View', $url, [
                            'title' => 'view',
                            'style' => 'background-color: #7348b3; color: #ffffff; padding:2%;border-radius:5px',
                        ]);
                    },
                    'update' => function ($url) {
                        return Html::a('Review', $url, [
                            'title' => 'view',
                            'style' => 'background-color: #00a65a; color: #ffffff; padding:2%;border-radius:5px',
                        ]);
                    },
                    'delete' => function ($url) {
                        return Html::a('Delete', $url, [
                            'title' => 'delete',
                            'style' => 'background-color: #ff1414; color: #ffffff; padding:2%;border-radius:5px',
                            'data' => [
                                'confirm' => 'Confirm Delete?',
                                'method' => 'post',
                            ],
                        ]);
                    },
                ],
            ],
        ],
    ]); ?>
</div>
