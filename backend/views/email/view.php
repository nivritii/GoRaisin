<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Email */

$this->title = 'View Email - '.$model->id;
$this->params['breadcrumbs'][] = ['label' => 'Emails', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="email-view">

    <div style="text-align: center">
        <h2><?php echo 'View Email - '.$model->id;?></h2>
    </div>
    <br />
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'receiver_name',
            'receiver_address',
            'subject',
            'content:ntext',
            'attachment',
        ],
    ]) ?>

    <div style="text-align: center">
        <p>
            <?/*= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) */?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>
    </div>

</div>
