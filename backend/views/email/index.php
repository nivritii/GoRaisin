<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\EmailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Emails';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="email-index">

    <!--<h1><?/*= Html::encode($this->title) */?></h1>-->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <h3 style="color: black">Create</h3>
    <p>
        <?= Html::a('Create Email', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <p>
        <?php
        $str = '';
        $aa = array();
        $rows = (new \yii\db\Query())
        ->select(['email'])
        ->from('user')
        ->all();


        foreach ($rows as $key => $val)
        {
            $aa = $rows[$key]['email'];
            //$str = "'" . $rows[$key]['email'] . "'" . ',' . $str;
            //$str = $str . "," . $rows[$key]['email'];
        }

        print_r($aa);
        //echo($str);

        ?>
    </p>
    <hr style=" height:1px;border:none;border-top:1px solid #185598;" />

    <h3 style="color: black">Search</h3>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>
    <hr style=" height:1px;border:none;border-top:1px solid #185598;" />

    <h3 style="color: black">Email List</h3>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        /*'filterModel' => $searchModel,*/
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            /*'id',*/
            'receiver_name',
            'receiver_address',
            'subject',
            'content:ntext',
            // 'attachment',

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
