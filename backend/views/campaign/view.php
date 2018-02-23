<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Campaign */

$this->title = 'View Campaign - '.$model->c_title;
$this->params['breadcrumbs'][] = ['label' => 'Campaigns', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="campaign-view">

    <div style="text-align: center">
        <h2><?php echo 'View Campaign - '.$model->c_title ?></h2>
    </div>
    <br />


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'c_title',
            'c_image',
            'c_description',
            'c_start_date',
            'c_end_date',
            'c_goal',
            'c_id',
            'c_video',
            'c_description_long',
            'c_author',
            'c_created_at',
            'c_location',
            'c_status',
            'c_cat_id',
            'c_new_tag',
        ],
    ]) ?>

    <div style="text-align: center">
        <p>
            <?= Html::a('Review', ['update', 'id' => $model->c_id], ['class' => 'btn btn-primary','style' => 'background-color: #7348b3; color: #ffffff;border:0']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->c_id], [
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
