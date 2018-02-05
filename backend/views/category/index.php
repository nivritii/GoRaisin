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

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        /*'filterModel' => $searchModel,*/
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'class',
            'featured_campaign_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
