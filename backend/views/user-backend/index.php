<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserBackendSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Backend User Management';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-backend-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <h3 style="color: black">Create</h3>
        <?= Html::a('Create Administrator', ['signup'], ['class' => 'btn btn-success']) ?>
    </p>
    <hr style=" height:1px;border:none;border-top:1px solid #185598;" />

    <h3 style="color: black">Search</h3>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>
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

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
