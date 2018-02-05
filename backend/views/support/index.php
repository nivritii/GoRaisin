<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SupportSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Supports';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="support-index">

    <h3 style="color: black">Search</h3>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>
    <hr style=" height:1px;border:none;border-top:1px solid #185598;" />

    <h3 style="color: black">Support List</h3>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [

            'id',
            'email:email',
            'type',
            'content:ntext',

            /*['class' => 'yii\grid\ActionColumn'],*/
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {delete}',
                'header' => 'operate',
                'buttons' => [
                    'update' => function ($url, $model, $key) {
                        return Html::a("View", $url, [
                            'title' => 'view',
                            'class' => 'btn btn-default',
                            /*'data-toggle' => 'modal',
                            'data-target' => '#operate-modal',*/
                        ]);
                    },
                    'delete' => function ($url, $model, $key) {
                        return Html::a("Delete", $url, [
                            'title' => 'delete',
                            'class' => 'btn btn-danger',
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
