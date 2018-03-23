<?php
/**
 * Created by PhpStorm.
 * User: cherry
 * Date: 22/03/2018
 * Time: 11:07 AM
 */
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user common\models\User */
?>
<div class="password-reset">

    <p>
        Dear <?=$user ?>,
    </p>

    <p>Here is a question made by our user <?=$questionUser ?>:</p>

    <p style="font-weight: 600"><?= $content ?></p>

    <p>You can kindly take it into consideration.</p>

    <p>GoRaisin</p>
</div>