<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name. '- GoRaisin';
?>
<div class="site-error">
    <h1 style="font-size: 30px;text-align: center;margin-top: 5%;color: #940094">Opps!</h1>
    <h1 style="font-size: 30px;text-align: center;"> Page <?php echo $name ?></h1>

    <!--<div class="alert alert-danger" style="text-align: center;">
        <?/*= nl2br(Html::encode($message)) */?>
    </div>-->

    <br /><br />
    <?= Html::a('Go to Homepage',['site/index'],['style' => 'border-radius:10px;background-color:#940094;text-decoration:none;margin-left:44.5%;color:#ffffff;font-size:20px;padding:7px']) ?>

    <br /><br /><br />
    <p style="text-align: center">
        The above error occurred while the Web server was processing your request.
    </p>
    <p style="text-align: center">
        Please contact us if you think this is a server error. Thank you.
    </p>

</div>
