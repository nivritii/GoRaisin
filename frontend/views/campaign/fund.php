<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\Campaign;
use frontend\models\Reward;
use frontend\assets\HomePageAsset;

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
            <h1 class="text-center" >Fund the Project</h1>
            <br/>
            <!--<form>-->
            <form enctype="multipart/form-data" action="fund?id=<?=$c_id?>" method="post">
            <div class="container col-xs-12">
                <div class="container">
                    <div class="panel-group" id="faqAccordion" style="width: 89%">
                        <div class="panel panel-default panel-faq">
                            <div class="panel-heading">
                                <a data-toggle="collapse" data-parent="#accordion-cat-1" href="#noReward">
                                    <h4 class="panel-title">
                                        Pleage without a reward
                                        <span class="pull-right"><i class="glyphicon glyphicon-plus"></i></span>
                                    </h4>
                                </a>
                            </div>
                            <div id="noReward" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <div class="form-group">
                                    <div style="alignment:center">
                                        <div style="display: inline-block;width: 20%">
                                            <p class="item-title">Pledge Amount</p>
                                        </div>
                                        <div style="display: inline-block;margin-left: 2%;width: 50%">
                                            <input type="text" style="width: 100%" name="reward">
                                        </div>
                                    </div>
                                        <input class="btn btn-md btn-info" type="submit" value="Pledge" id="submit"  style="color: #ffffff;width: 25%">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php foreach ($rewards as $reward) {?>
                        <div class="panel panel-default panel-faq">
                            <div class="panel-heading">
                                <a  data-toggle="collapse" data-parent="#accordion-cat-1" href="#<?=$reward->r_id?>">
                                    <h4 class="panel-title">
                                        <input type="radio" name="reward" value="<?=$reward->r_pledge_amt?>" hidden>
                                        <?=$reward->r_title?>
                                        <span class="pull-right"><i class="glyphicon glyphicon-plus"></i></span>
                                    </h4>
                                </a>
                            </div>
                            <div id="<?=$reward->r_id?>" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <table>
                                        <tr>
                                            <td style="width: 5%"><input type="radio" name="reward" value="<?=$reward->r_pledge_amt?>"></td>
                                            <td style="width: 95%">
                                                <div class="form-group">
                                                    <div style="alignment:center">
                                                        <div style="display: inline-block;">
                                                            <?=$reward->r_description?>
                                                        </div>
                                                    </div>
                                                    <br/>
                                                    <div style="alignment:center">
                                                        <div style="display: inline-block">
                                                            <p class="item-title">Pledge Amount: </p>
                                                        </div>
                                                        <div style="display: inline-block">
                                                            <input type="text" disabled value="<?=$reward->r_pledge_amt?>">
                                                        </div>
                                                    </div>
                                                    <br/>
                                                    <div style="alignment:center">
                                                        <input class="btn btn-md btn-info" type="submit" id="submit" value="Pledge" style="color: #ffffff;width: 25%">
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <?php }?>
                    </div>
                </div>
            </div>
            </form>
            <!--</form> -->
        </div>
    </div>
</div>

