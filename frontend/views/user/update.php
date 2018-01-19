<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
frontend\assets\UserAsset::register($this);

/* @var $this yii\web\View */
/* @var $model frontend\models\User */

$this->title = 'Edit Profile - GoRaisin';
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
$userId = Yii::$app->user->identity->id;
$imagePath = '/'.Yii::$app->user->identity->image;
?>
<div class="user-update">

    <html lang="en" class="no-js">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

    </head>
    <body>

    <main class="cd-main-content">
        <!-- main content here -->

        <div class="mainbody container-fluid">
            <div class="row">
                <div class="col-lg-offset-1 col-md-9 col-sm-9 col-xs-9">
                    <div class="panel panel-default">
                        <div style="margin: 20px auto; width: 200px; text-align: center;">
                            <h1 class="page-title">Edit Profile</h1>
                        </div>
                    </div>
                    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h4 style="text-align: center">Basic Information</h4>
                            <br>

                            <?php /*$form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); */?>

                            <h6>User Name</h6>
                            <?= $form->field($model, 'username')
                                ->label(false)
                                ->textInput(['maxlength' => true, 'style' => 'float:left;width:500px;']) ?>

                            <br><br>
                            <h6>Email Address</h6>
                            <?= $form->field($model, 'email')
                                ->label(false)
                                ->textInput(['maxlength' => true, 'style' => 'float:left; width: 500px;']) ?>

                            <!--<br>
                            <h6>Company Name</h6>
                            <?/*= $form->field($model, 'companyName')
                                ->label(false)
                                ->textInput(['maxlength' => true,'style' => 'float:left; width: 500px;']) */?>

                            <br><br>
                            <h6>Wallet Address</h6>
                            --><?/*= $form->field($model, 'walletAddress')
                                ->label(false)
                                ->textInput(['maxlength' => true, 'style' => 'float:left; width: 500px;']) */?>

                            <!--<br><br>
                            <div class="form-group">
                                <?/*= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) */?>
                                <?/*=
                                Html::a('Cancel',['header'],[
                                    'class' => 'btn btn-default',
                                    'id' => 'cancel',
                                ])
                                */?>
                            </div>

                            --><?php /*ActiveForm::end(); */?>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h4 style="text-align: center">Your Image</h4>
                            <br><br>
                            <div class="col-lg-12 col-md-12" align="center">
                                <img src="<?php echo Yii::$app->request->baseUrl.$imagePath?>" width="120" height="120" class="img-circle"/>
                                <br><br>
                            </div>
                            <br><br>
                            <?= $form->field($model, 'image')
                                ->label(false)
                                ->fileInput() ?>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h4 style="text-align: center">Extend Profile</h4>
                            <br>

                            <br>
                            <h6>Company Name</h6>
                            <?= $form->field($model, 'companyName')
                                ->label(false)
                                ->textInput(['maxlength' => true,'style' => 'float:left; width: 500px;']) ?>


                            <br><br>
                            <h6>Wallet Address</h6>
                            <?= $form->field($model, 'walletAddress')
                                ->label(false)
                                ->textInput(['maxlength' => true, 'style' => 'float:left; width: 500px;']) ?>
                        </div>
                    </div>

                    <br>
                    <div class="form-group">
                        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                        <?=
                        Html::a('Cancel',['index'],[
                            'class' => 'btn btn-default',
                            'id' => 'cancel',
                        ])
                        ?>
                    </div>
                    <?php ActiveForm::end(); ?>

                </div>
                <hr>
            </div>
        </div>
</div>
</main>
</body>

