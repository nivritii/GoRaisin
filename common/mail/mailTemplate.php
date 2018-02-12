<?php
/**
 * Created by PhpStorm.
 * User: cherry
 * Date: 09/02/2018
 * Time: 5:05 PM
 */
use yii\helpers\Html;
use backend\models\Email;


/* @var $this yii\web\View */
/* @var $model backend\models\Email */
$model = new Email();
$this->title = 'Send Email - GoRaisin Backend';
$this->params['breadcrumbs'][] = ['label' => 'Emails', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$model = new Email();
?>

<body style="background-color: #f9f9f9">
<div style="text-align: center; height: 10%">
    <p style="color: #940094;font-size: 25px;font-weight: 600">
        GoRaisin
    </p>
</div>

<div style="margin-left: 30%;width: 40%; background-color: #ffffff">
    <p style="font-size: 17px;padding: 5%; line-height: 25px">
        <?php echo $model->content ?>
    </p>
</div>
<br /><br />
<div style="margin-left: 30%;width: 40%;text-align: center">
    <p style="font-size: 15px">
        &copy; 2017 GoRaisin.
    </p>
</div>

</body>
