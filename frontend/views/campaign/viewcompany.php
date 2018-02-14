<?php
/**
 * Created by PhpStorm.
 * User: cherry
 * Date: 14/02/2018
 * Time: 12:48 PM
 */
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use frontend\models\Category;
use frontend\assets\ViewCompantAsset;
use yii\widgets\ListView;
use kartik\tabs\TabsX;
use frontend\models\User;

ViewCompantAsset::register($this);
/* @var $this yii\web\View */
/* @var $model frontend\models\Campaign */

$this->title = 'About '.$model->c_display_name.' - GoRaisin';
$this->params['breadcrumbs'][] = ['label' => 'Campaigns', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div style="margin-left: 15%;margin-top: 2%">
    <p style="font-size: 25px;font-weight: 500"><?php echo $model->c_display_name ?></p>
</div>
<div style="margin-left: 15%;">
    <p style="font-size: 17px;font-weight: 300"><?php echo $model->c_location ?></p>
</div>
<div style="margin-left: 15%;margin-top: 5%">
    <p style="font-size: 17px;font-weight: 400">Company Profile</p>
</div>
<div style="margin-left: 15%;margin-top: 1%">
    <p style="font-size: 17px;font-weight: 300"><?php echo $model->c_biography ?></p>
</div>
<div style="margin-left: 15%;margin-top: 3%">
    <p style="font-size: 17px;font-weight: 400">Website</p>
</div>
<div style="margin-left: 15%;margin-top: 1%">
    <?php $website = $model->c_social_profile ?>
    <?= Html::a($website,['campaign/linkexternal','website' => $website],['target' => '_blank','style' => 'text-decoration:none']) ?>
</div>
<div style="margin-left: 15%;margin-top: 3%;display: inline-block;width: 6%">
    <p style="font-size: 17px;font-weight: 400"><i class="fa fa-user-circle fa-1x"></i>&nbsp;Author</p>
</div>
<div style="clear:both;display: inline-block;width: 7%">
    <p style="font-size: 15px;font-weight: 600"><?php echo $model->cAuthor->username ?></p>
</div>
<div style="clear:both;display: inline-block;width: 8%">
    <p style="font-size: 17px;font-weight: 400"><i class="fa fa-clock-o fa-1x"></i>&nbsp;Created at</p>
</div>
<div style="clear:both;display: inline-block">
    <p><?php echo $model->cAuthor->created_at ?></p>
</div>

