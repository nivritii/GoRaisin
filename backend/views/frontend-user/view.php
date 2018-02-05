<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\FrontendUser */

$this->title = 'View Platform User - '.$model->username;
$this->params['breadcrumbs'][] = ['label' => 'Frontend Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="frontend-user-view">
    <div style="text-align: center">
        <h2><?php echo 'View Platform User - '.$model->username; ?></h2>
    </div>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'username',
            /*'auth_key',
            'password_hash',
            'password_reset_token',*/
            'email:email',
            'status',
            'created_at',
            'updated_at',
            'image',
            'companyName',
            'walletAddress',
        ],
    ]) ?>

    <div style="text-align: center">
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary','style' => 'background-color: #7348b3; color: #ffffff;border:0']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'style' => 'border: 0',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    </div>

</div>
