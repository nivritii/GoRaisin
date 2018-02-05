<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Category - GoRaisin Backend';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div style="text-align: center">
        <h2>Category Management</h2>
    </div>
    <br />

    <div style="width: 50%;text-align: center;margin-left: 25%">
    <p>
        <?= Html::a('Create Category', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    </div>
    <hr style=" height:1px;border:none;border-top:1px solid #185598;" />

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

            'id',
            'name',
            /*'class',*/
            'featured_campaign_id',

            /*['class' => 'yii\grid\ActionColumn'],*/

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
                        return Html::a('Update', $url, [
                            'title' => 'update',
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
