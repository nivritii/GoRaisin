<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\Campaign;
use frontend\models\Reward;
use frontend\assets\HomePageAsset;
use yii\helpers\Url;
use Da\QrCode\QrCode;


$qrCode = (new QrCode($myJSON))
    ->setSize(250)
    ->setMargin(5)
    ->useForegroundColor(51, 153, 255);

$qrCode->writeFile(__DIR__ . '/code.png');

// display directly to the browser
header('Content-Type: ' . $qrCode->getContentType());


HomePageAsset::register($this);
/* @var $this yii\web\View */
/* @var $model frontend\models\Campaign */

$this->title = 'Fund for Campaign - GoRaisin';
$this->params['breadcrumbs'][] = ['label' => 'Campaigns', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$model = new Campaign();
$reward = new Reward();

?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<div class="container">
    <div class="col-xs-12">
        <div class="col-md-12 well text-center">
            <br/>
            <h1 class="text-center">Fund the Project</h1>
            <br/>
            <form enctype="multipart/form-data" action="<?= Url::to(['wallet/fund', 'id' => $c_id]) ?>" method="post">
                <div class="container col-xs-12">
                    <div class="container">
                        <div class="panel-group" id="faqAccordion" style="width: 89%">
                            <div class="panel panel-default panel-faq">
                                <div class="panel-heading" style="background-color: #ffffff">
                                    <a data-toggle="collapse" data-parent="#accordion-cat-1" href="#noReward1"
                                       style="text-decoration: none;">
                                        <h4 class="panel-title" style="font-size: 20px">
                                            Use your mobile wallet to pledge.
                                        </h4>
                                    </a>
                                </div>
                                <div id="noReward1" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <div style="alignment:center">
                                                <div style="display: inline-block;">
                                                    <p class="item-title">Use the generated QR Code to connect with your
                                                        mobile wallet</p>
                                                    <img src="<?= $qrCode->writeDataUri() ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php foreach ($rewards as $reward) { ?>
                                <div class="panel panel-default panel-faq">
                                    <div class="panel-heading" style="background-color: #ffffff">
                                        <a data-toggle="collapse" data-parent="#accordion-cat-1"
                                           href="#<?= $reward->r_id ?>" style="text-decoration: none">
                                            <h4 class="panel-title" style="font-size: 20px">
                                                Pledge US$<?= $reward->r_pledge_amt ?> and be entitled
                                                to <?= $reward->r_discount ?>% discount.
                                            </h4>
                                        </a>
                                    </div>
                                    <div id="<?= $reward->r_id ?>" class="panel-collapse collapse">
                                        <div id="fund-div">
                                            <table>
                                                <tr>
                                                    <td style="width: 1%"><input type="radio" name="reward"
                                                                                 value="<?= $reward->r_pledge_amt ?>, <?= $reward->r_id ?>">
                                                    </td>
                                                    <td style="width: 95%">
                                                        <div class="form-group">
                                                                <div style="text-align: left">
                                                                    <div style="margin-left: 18.5%;margin-right: 15%">
                                                                        <p style="font-size: 20px"><?= $reward->r_description ?></p>
                                                                    </div>
                                                                </div>
                                                                <br/>
                                                                <div style="alignment:center;text-align: left">
                                                                    <div style="display: inline-block;margin-left: 18.5%">
                                                                        <p class="item-title">Pledge Amount: </p>
                                                                    </div>
                                                                    <div style="display: inline-block;margin-left: 2%;width: 47%">
                                                                        <input type="text" disabled
                                                                               value="<?= $reward->r_pledge_amt ?>"
                                                                               style="width: 100%">
                                                                    </div>
                                                                </div>
                                                                <br/>
                                                                <div style="alignment:center;text-align: left">
                                                                    <input disabled class="btn btn-md btn-info disable-pledge"
                                                                           type="submit"
                                                                           id="<?= $reward->r_pledge_amt ?>"
                                                                           value="Pledge"
                                                                           style="color: #ffffff;width: 25%;background-color: #940094;border: none;float: left;margin-left: 36%">
                                                                </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $('input[name="reward"][type="radio"]').click(function() {
        var id = $(this).val().split(",")[0];
        $('.disable-pledge').prop('disabled', true);
        $('#'+id).prop('disabled', false);
    })
</script>