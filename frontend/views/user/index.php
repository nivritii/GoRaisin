<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
frontend\assets\UserAsset::register($this);
$this->title = 'User Profile - GoRaisin';
$this->params['breadcrumbs'][] = $this->title;
$userId = Yii::$app->user->identity->id;
?>
<div class="user-index">

    <main class="cd-main-content">
        <!-- main content here -->

        <div class="mainbody container-fluid">
            <div class="row">
                <div class="col-lg-offset-4 col-md-5 col-sm-5 col-xs-5">
                    <div class="panel panel-default">
                        <div style="margin: 20px auto; width: 200px; text-align: center">
                            <h1 class="page-title">Basic Profile</h1>
                        </div>
                        <div class="button-div">
                            <?= Html::a('Edit Profile',['update', 'id' => $userId], ['class' => 'edit-button']) ?>
                        </div>
                        <br />
                    </div>
                    <hr>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h4 style="text-align: center">Basic Information</h4>
                            <br>
                            <form class="form-horizontal">
                                <div class="content-div">
                                    <h5 class="item-title">User Name</h5>&nbsp&nbsp&nbsp&nbsp
                                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                    <p class="item-content"><?php echo yii::$app->user->identity->username?></p>
                                </div>
                                <br />
                                <div class="content-div">
                                    <h5 class="item-title">Email Address</h5>&nbsp&nbsp&nbsp&nbsp
                                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                    &nbsp<p class="item-content"><?php echo yii::$app->user->identity->email?></p>
                                </div>
                                <br />
                                <div class="content-div">
                                    <h5 class="item-title">Location</h5>&nbsp&nbsp&nbsp&nbsp
                                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<p class="item-content"><?php echo Yii::$app->user->identity->location ?></p>
                                </div>
                            </form>
                        </div>
                    </div>
                    <hr>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h4 style="text-align: center">Your Image</h4>
                            <br>
                            <div align="center">
                                <div class="col-lg-12 col-md-12">
                                    <img src="<?php
                                    $imagePath = '/'.Yii::$app->user->identity->image;
                                    echo Yii::$app->request->baseUrl.$imagePath?>" class="user-image"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h4 style="text-align: center">Extend Profile</h4>
                            <br>
                            <form class="form-horizontal">
                                <div class="content-div">
                                    <h5 class="item-title">Company</h5>
                                    <p class="item-content">&nbsp&nbsp&nbsp&nbsp
                                        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                        &nbsp&nbsp&nbsp&nbsp<?php echo Yii::$app->user->identity->companyName?></p>
                                </div>
                                <br />
                                <div class="content-div">
                                    <h5 class="item-title">Biography</h5>
                                    <p class="item-content">&nbsp&nbsp&nbsp&nbsp
                                        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                        &nbsp&nbsp
                                        <?php echo Yii::$app->user->identity->biography ?></p>
                                </div>
                                <br />
                                <div class="content-div">
                                    <h5 class="item-title">Website</h5>
                                    <p class="item-content">&nbsp&nbsp&nbsp&nbsp
                                        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                        <?php echo Yii::$app->user->identity->website ?></p>
                                </div>
                                <br />
                                <div class="content-div">
                                    <h5 class="item-title">Wallet Address</h5>
                                    <p class="item-content">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<?php echo Yii::$app->user->identity->walletAddress?></p>
                                </div>
                                <br />
                            </form>
                        </div>
                    </div>
                </div>
                <hr>
            </div>
        </div>
    </main>
</div>