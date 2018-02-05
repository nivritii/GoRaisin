<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Support */

$this->title = 'Update Support: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Supports', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="support-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
