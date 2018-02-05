<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\EmailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Platform Emails - GoRaisin Backend';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="email-index">

    <!--<h1><?/*= Html::encode($this->title) */?></h1>-->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div style="text-align: center">
        <h2>Platform Emails Management</h2>
    </div>
    <br />
    <div style="text-align: center">
    <p>
        <?= Html::a('Create Email', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    </div>

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

        /*print_r($aa);*/
        //echo($str);

        ?>
    </p>
    <hr style=" height:1px;border:none;border-top:1px solid #185598;" />

    <div style="width: 50%;text-align: center;margin-left: 25%">
    <h3 style="color: black">Search</h3>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>
    </div>
    <hr style=" height:1px;border:none;border-top:1px solid #185598;" />

    <h3 style="color: black">Email List</h3>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            /*'id',*/
            'receiver_name',
            'receiver_address',
            'subject',
            'content:ntext',
            // 'attachment',

            ['class' => 'yii\grid\ActionColumn',
                'template' => '{view} {delete}',
                'buttons' => [
                    'view' => function ($url) {
                        return Html::a('View', $url, [
                            'title' => 'view',
                            'style' => 'background-color: #7348b3; color: #ffffff; padding:5%;border-radius:5px',
                        ]);
                    },
                    'delete' => function ($url) {
                        return Html::a('Delete', $url, [
                            'title' => 'delete',
                            'style' => 'background-color: #ff1414; color: #ffffff; padding:5%;border-radius:5px',
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
