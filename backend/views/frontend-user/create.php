<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\FrontendUser */

$this->title = 'Create Frontend User';
$this->params['breadcrumbs'][] = ['label' => 'Frontend Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="frontend-user-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
