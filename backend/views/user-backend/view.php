<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\UserBackend */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => 'User Backends', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-backend-view">

    <h1><?= Html::encode($this->title) ?></h1>


    <?= DetailView::widget([
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
    ]) ?>

</div>
