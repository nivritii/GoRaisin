<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\RoadmapSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Roadmaps';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="roadmap-index">

    <h3 style="color: black">Create</h3>
    <p>
        <?= Html::a('Create Roadmap', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <hr style=" height:1px;border:none;border-top:1px solid #185598;" />

    <h3 style="color: black">Search</h3>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>
    <hr style=" height:1px;border:none;border-top:1px solid #185598;" />

    <h3 style="color: black">Roadmap List</h3>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        /*'filterModel' => $searchModel,*/
        'columns' => [
            /*['class' => 'yii\grid\SerialColumn'],*/

            'id',
            'title',
            'content:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
