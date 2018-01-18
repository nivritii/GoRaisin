<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'User Profile —— GoRaisin';
$this->params['breadcrumbs'][] = $this->title;
$userId = Yii::$app->user->identity->id;
?>
<div class="user-index">
    <body>
    <!--<header>
        <nav class="cd-stretchy-nav">
            <a class="cd-nav-trigger" href="#0">
                <span aria-hidden="true"></span>
            </a>

            <ul>
                <li><?/*= Html::a(' profile &nbsp&nbsp&nbsp<i class="fa fa-user-o"></i>',['user/header'], array('class' => 'active')) */?></li>
                <li><?/*= Html::a(' Portfolio &nbsp&nbsp&nbsp<i class="fa fa-star-o"></i>',['site/header']) */?></li>
                <li><?/*= Html::a(' Campaign &nbsp&nbsp&nbsp<i class="fa fa-shopping-bag"></i>',['campaign/header']) */?></li>
                <li><?/*= Html::a(' Wallet &nbsp&nbsp&nbsp<i class="fa fa-btc"></i>',['wallet/header']) */?></li>
                <li><?/*= Html::a(' Notice &nbsp&nbsp&nbsp<i class="fa fa-envelope"></i>',['site/header']) */?></li>


            </ul>

            <span aria-hidden="true" class="stretchy-nav-bg"></span>
        </nav>

    </header>-->

    <main class="cd-main-content">
        <!-- main content here -->

        <div class="mainbody container-fluid">
            <div class="row">
                <div class="col-lg-offset-1 col-md-9 col-sm-9 col-xs-9">
                    <div class="panel panel-default">
                        <div style="margin: 20px auto; width: 200px; text-align: center;">
                            <h1 style="font-size:25px;">Basic Profile</h1>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h4 style="text-align: center">Account Information</h4>
                            <br><br>
                            <form class="form-horizontal">
                                <!--<label for="First_name" style="font-size: 20px">User Name</label>-->
                                <h6>User Name</h6>
                                <br>
                                <p style="font-size: 16px"><?= yii::$app->user->identity->username?></p>
                                <hr>
                                <!--<input type="text" class="form-control" id="First_name" placeholder="John" value="John">-->
                                <br />
                                <h6>Email Address</h6>
                                <br />
                                <!--<label for="Last_name" style="font-size: 20px">Email Address</label>-->
                                <p style="font-size: 16px"><?= yii::$app->user->identity->email?></p>
                                <!--<input type="email" class="form-control" id="Last_name" placeholder="Doe" value="Doe">-->
                            </form>
                        </div>
                    </div>
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
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h4 style="text-align: center">Extend Profile</h4>
                            <br><br>
                            <!--<p>Visibility of your extended profile:</p>-->
                            <br><br>
                            <form class="form-horizontal">
                                <!--<label for="First_name" style="font-size: 20px">User Name</label>-->
                                <h6>Company</h6>
                                <br>
                                <p style="font-size: 16px"><?= yii::$app->user->identity->companyName?></p>
                                <hr>
                                <!--<input type="text" class="form-control" id="First_name" placeholder="John" value="John">-->
                                <br />
                                <h6>Wallet Address</h6>
                                <br />
                                <!--<label for="Last_name" style="font-size: 20px">Email Address</label>-->
                                <p style="font-size: 16px"><?= yii::$app->user->identity->walletAddress?></p>
                                <!--<input type="email" class="form-control" id="Last_name" placeholder="Doe" value="Doe">-->
                            </form>
                        </div>
                    </div>
                    <?/*=
                    Html::a('Edit Profile',['update'],[
                        'class' => 'btn btn-default btn-update',
                        'id' => 'update',
                        'data-toggle' => 'modal',
                        'data-target' => '#edit-profile',
                    ])
                    */?>
                    <?= Html::a('Edit Profile',['update', 'id' => $userId], ['class' => 'btn btn-primary']) ?>
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
