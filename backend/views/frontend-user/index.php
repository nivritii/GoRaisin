<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\FrontendUserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'User Management - GoRaisin Backend';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="frontend-user-index">

    <!--<h1><?/*= Html::encode($this->title) */?></h1>-->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div style="text-align: center">
        <h2>Platform User Management</h2>
    </div>
    <br />

    <div style="width: 50%;text-align: center;margin-left: 25%">
    <h3 style="color: black">Search</h3>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>
    </div>
    <hr style=" height:1px;border:none;border-top:1px solid #185598;" />

    <!--<p>
        <?/*= Html::a('Create Frontend User', ['create'], ['class' => 'btn btn-success']) */?>
    </p>-->
    <!--<h3 style="color: black">Frontend User List</h3>-->
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        /*'filterModel' => $searchModel,*/
        'columns' => [
            /*['class' => 'yii\grid\SerialColumn'],*/

            'id',
            'username',
            //'auth_key',
            //'password_hash',
            //'password_reset_token',
             'email:email',
            // 'status',
             'created_at',
             'updated_at',
            // 'image',
             'companyName',
             'walletAddress',

            /*[
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}',
                'header' => 'operate',
                'buttons' => [
                    'update' => function ($url, $model, $key) {
                        return Html::a("View", $url, [
                            'title' => 'Frontend User View',
                            'class' => 'btn btn-default',
                            'data-toggle' => 'modal',
                            'data-target' => '#operate-modal',
                        ]);
                    },
                ],
            ],*/

            ['class' => 'yii\grid\ActionColumn',
                // if want to add 'delete' there should add {delete}
                'template' => '{view}',
                'buttons' => [
                    'view' => function ($url) {
                        return Html::a('View', $url, [
                            'title' => 'view',
                            'style' => 'background-color: #7348b3; color: #ffffff; padding:5%;border-radius:5px',
                        ]);
                    },
                    /*'delete' => function ($url) {
                        return Html::a('Delete', $url, [
                            'title' => 'delete',
                            'style' => 'background-color: #ff1414; color: #ffffff; padding:5%;border-radius:5px',
                            'data' => [
                                'confirm' => 'Confirm Delete?',
                                'method' => 'post',
                            ],
                        ]);
                    },*/
                ],
            ],
        ],
    ]); ?>
</div>


<?php
/*Modal::begin([
    'id' => 'operate-modal',
    'header' => '<h4 class="modal-title"></h4>',
]);
Modal::end();

$requestUpdateUrl = Url::toRoute('view');
$js = <<<JS
    $('.btn-update').on('click',function(){
        $('.modal-title').html('view');
        $.get('{$requestUpdateUrl}', {id: $(this).closest('tr').data('key')},
            function (data) {
                $('.modal-body').html(data);
            }
        );
    });
JS;
$this->registerJS($js);
*/?>
