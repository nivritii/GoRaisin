<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\UserBackend */

$this->title = 'View Administrator - '.$model->username;
$this->params['breadcrumbs'][] = ['label' => 'User Backends', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-backend-view">
    <div style="text-align: center">
        <h2><?php echo 'View Administrator - '.$model->username; ?></h2>
    </div>
    <br />

    <?/*= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'username',
            'auth_key',
            'password_hash',
            'email:email',
            'mobile',
            'position',
            'phone',
            'image',
        ],
    ]) */?>

    <div>
        <p style="font-weight: 600">Name</p>
        <p><?php echo $model->username ?></p>
    </div>
    <br />

    <div>
        <p style="font-weight: 600">Image</p>
        <div>
            <?= Html::img("@web/".$model->image,['style' => 'width:100px;border-radius:50px']) ?>
        </div>
    </div>
    <br />

    <div>
        <p style="font-weight: 600">Email</p>
        <p><?php echo $model->email ?></p>
    </div>
    <br />

    <div>
        <p style="font-weight: 600">Mobile</p>
        <p><?php echo $model->mobile ?></p>
    </div>
    <br />

    <div>
        <p style="font-weight: 600">Position</p>
        <p><?php echo $model->position ?></p>
    </div>
    <br />

    <div>
        <p style="font-weight: 600">Phone</p>
        <p><?php echo $model->phone ?></p>
    </div>
    <br />


    <div style="text-align: center">
    <p>
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
