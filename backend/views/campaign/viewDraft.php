<?php
/**
 * Created by PhpStorm.
 * User: cherry
 * Date: 13/02/2018
 * Time: 3:50 PM
 */

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\CampaignSearch;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CampaignSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Publish Campaigns - GoRaisin Backend';
$this->params['breadcrumbs'][] = $this->title;
$searchModel = new CampaignSearch();
$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
?>
<div class="campaign-index">

    <div style="width: 50%;text-align: center;margin-left: 25%">
        <h3 style="color: black">Search</h3>
        <?php echo $this->render('_search', ['model' => $searchModel]); ?>
    </div>
    <hr style=" height:1px;border:none;border-top:1px solid #185598;" />



    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'c_title',
            'c_author',
            'c_created_at',
            'c_status',

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