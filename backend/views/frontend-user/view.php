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

    <?/*= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'username',
            'email:email',
            'status',
            'created_at',
            'updated_at',
            'image',
            'companyName',
            'walletAddress',
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
            <?= Html::img(Yii::$app->urlManagerFrontend->baseUrl."/".$model->image,['style' => 'width:100px;border-radius:50px']) ?>
        </div>
    </div>
    <br />

    <div>
        <p style="font-weight: 600">Email</p>
        <p><?php echo $model->email ?></p>
    </div>
    <br />

    <div>
        <p style="font-weight: 600">status</p>
        <p><?php echo $model->status ?></p>
    </div>
    <br />

    <div>
        <p style="font-weight: 600">Created Time</p>
        <p><?php echo $model->created_at ?></p>
    </div>
    <br />

    <div>
        <p style="font-weight: 600">Company</p>
        <p><?php echo $model->companyName ?></p>
    </div>
    <br />

    <div>
        <p style="font-weight: 600">Wallet Address</p>
        <p><?php echo $model->walletAddress ?></p>
    </div>
    <br />

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
