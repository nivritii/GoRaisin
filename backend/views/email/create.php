<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Email */

$this->title = 'Create Email - GoRaisin Backend';
$this->params['breadcrumbs'][] = ['label' => 'Emails', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="email-create">

    <div style="text-align: center">
        <h2>Create Email</h2>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
