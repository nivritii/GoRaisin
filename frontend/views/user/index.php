<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
frontend\assets\UserAsset::register($this);
$this->title = 'User Profile —— GoRaisin';
$this->params['breadcrumbs'][] = $this->title;
$userId = Yii::$app->user->identity->id;
?>
<div class="user-index">
    <body>

    <main class="cd-main-content">
        <!-- main content here -->

        <div class="mainbody container-fluid">
            <div class="row">
                <div class="col-lg-offset-4 col-md-5 col-sm-5 col-xs-5">
                    <div class="panel panel-default">
                        <div style="margin: 20px auto; width: 200px; text-align: center;">
                            <h1 class="page-title">Basic Profile</h1>
                        </div>
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
                                    <p class="item-content"><?= yii::$app->user->identity->username?></p>
                                </div>
                                <br />
                                <!--<input type="text" class="form-control" id="First_name" placeholder="John" value="John">-->
                                <div class="content-div">
                                <h5 class="item-title">Email Address</h5>&nbsp&nbsp&nbsp&nbsp
                                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                    &nbsp<p class="item-content"><?= yii::$app->user->identity->email?></p>
                                </div>
                                <br />
                                <div class="content-div">
                                    <h5 class="item-title">Location</h5>&nbsp&nbsp&nbsp&nbsp
                                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<p class="item-content">China</p>
                                </div>
                                <!--<label for="Last_name" style="font-size: 20px">Email Address</label>-->

                                <!--<input type="email" class="form-control" id="Last_name" placeholder="Doe" value="Doe">-->
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
                                    echo Yii::$app->request->baseUrl.$imagePath?>" width="120" height="120" class="img-circle"/>
                                </div>
                                <!--<div class="col-lg-12 col-md-12">
                                    <button class="btn btn-primary"><i class="fa fa-upload" aria-hidden="true"></i> Upload a new profile photo!</button>
                                </div>-->
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h4 style="text-align: center">Extend Profile</h4>
                            <!--<p>Visibility of your extended profile:</p>-->
                            <br>
                            <form class="form-horizontal">
                                <!--<label for="First_name" style="font-size: 20px">User Name</label>-->
                                <div class="content-div">
                                <h5 class="item-title">Company</h5>
                                <p class="item-content">&nbsp&nbsp&nbsp&nbsp
                                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                    &nbsp&nbsp&nbsp&nbsp<?= yii::$app->user->identity->companyName?></p>
                                </div>
                                <br />
                                <div class="content-div">
                                    <h5 class="item-title">Biography</h5>
                                    <!--<label for="Last_name" style="font-size: 20px">Email Address</label>-->
                                    <p class="item-content">&nbsp&nbsp&nbsp&nbsp
                                        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                        &nbsp&nbsp
                                        isjdge djaisds dsjfhdsj dasjfhkjsfe dsfjhdsj</p>
                                </div>
                                <br />
                                <!--<input type="text" class="form-control" id="First_name" placeholder="John" value="John">-->
                                <div class="content-div">
                                    <h5 class="item-title">Website</h5>
                                    <!--<label for="Last_name" style="font-size: 20px">Email Address</label>-->
                                    <p class="item-content">&nbsp&nbsp&nbsp&nbsp
                                        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                        www.google.com</p>
                                </div>
                                <br />
                                <div class="content-div">
                                <h5 class="item-title">Wallet Address</h5>
                                <!--<label for="Last_name" style="font-size: 20px">Email Address</label>-->
                                <p class="item-content">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<?= yii::$app->user->identity->walletAddress?></p>
                                </div>
                                <br />
                                <!--<input type="email" class="form-control" id="Last_name" placeholder="Doe" value="Doe">-->
                            </form>
                        </div>
                    </div>
                    <div class="button-div">
                    <?= Html::a('Edit Profile',['update', 'id' => $userId], ['class' => 'edit-button']) ?>
                    </div>
                </div>
                <hr>
            </div>
        </div>
    </main>
    </body>
</div>







<!--<div class="user-index">

    <h1><?/*= Html::encode($this->title) */?></h1>
    <?php /*// echo $this->render('_search', ['model' => $searchModel]); */?>

    <p>
        <?/*= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) */?>
    </p>

    --><?/*= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'username',
            'auth_key',
            'password_hash',
            'password_reset_token',
            //'email:email',
            //'status',
            //'created_at',
            //'updated_at',
            //'image',
            //'companyName',
            //'walletAddress',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); */?>
