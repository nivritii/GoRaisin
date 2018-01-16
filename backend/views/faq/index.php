<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\FaqSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Faqs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="faq-index">

    <!--<h1><?/*= Html::encode($this->title) */?></h1>-->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <h3 style="color: black">Create</h3>
    <p>
        <?= Html::a('Create Question and Answer', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <hr style=" height:1px;border:none;border-top:1px solid #185598;" />



    <h3 style="color: black">Search</h3>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>
    <hr style=" height:1px;border:none;border-top:1px solid #185598;" />



    <h3 style="color: black">FAQ List</h3>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        /*'filterModel' => $searchModel,*/
        'columns' => [
            /*['class' => 'yii\grid\SerialColumn'],*/

            'id',
            'question:ntext',
            'answer:ntext',
            'type',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
