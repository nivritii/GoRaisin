<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserBackendSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Backend User Management - GoRaisin Backend';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-backend-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div style="text-align: center">
        <h2>Backend User Management</h2>
    </div>
    <br />

    <div style="width: 50%;text-align: center;margin-left: 25%">
    <p>
        <?= Html::a('Create Administrator', ['signup'], ['class' => 'btn btn-success']) ?>
    </p>
    </div>
    <hr style=" height:1px;border:none;border-top:1px solid #185598;" />

    <div style="width: 50%;text-align: center;margin-left: 25%">
    <h3 style="color: black">Search</h3>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>
    </div>
    <hr style=" height:1px;border:none;border-top:1px solid #185598;" />

    <h3 style="color: black">Backend User List</h3>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            /*['class' => 'yii\grid\SerialColumn'],*/

            'id',
            'username',
            /*'auth_key',
            'password_hash',*/
            'email:email',
            'mobile',
            'position',
            'phone',
            'image',

            /*['class' => 'yii\grid\ActionColumn'],*/
            ['class' => 'yii\grid\ActionColumn',
                'template' => '{view} {delete}',
                /*'header' => 'operate',*/
                'buttons' => [
                    'view' => function ($url/*$model, $key*/) {
                        return Html::a('View', $url, [
                            'title' => 'view',
                            'style' => 'background-color: #7348b3; color: #ffffff; padding:5%;border-radius:5px',
                            /*'class' => 'btn btn-default',*/
                            /*'data-toggle' => 'modal',
                            'data-target' => '#operate-modal',*/
                        ]);
                    },
                    'delete' => function ($url/*, $model, $key*/) {
                        return Html::a('Delete', $url, [
                            'title' => 'delete',
                            /*'class' => 'btn btn-danger',*/
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
