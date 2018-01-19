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
                    <hr>
                    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h4 style="text-align: center">Basic Information</h4>
                            <br>
                            <div style="display: inline-block;padding-left: 20%">
                            <div style="float: left;">
                            <h5 class="item-title">User Name</h5>
                            <?= $form->field($model, 'username')
                                ->label(false)
                                ->textInput(['maxlength' => true, 'style' => 'width: 400px']) ?>
                            </div>
                            <div style="float: left;margin: 0 0 0 70px">
                            <h5 class="item-title">Email Address</h5>
                            <?= $form->field($model, 'email')
                                ->label(false)
                                ->textInput(['maxlength' => true, 'style' => 'width: 400px']) ?>
                            </div>
                            <br />
                            </div>
                            <div style="display: inline-block;padding-left: 20%">
                                <div style="float: left;">
                                    <h5 class="item-title">Location</h5>
                                    <?= $form->field($model, 'location')
                                        ->label(false)
                                        ->textInput(['maxlength' => true, 'style' => 'width: 400px']) ?>
                                </div>
                                <br />
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h4 style="text-align: center">Your Image</h4>
                            <br>
                            <div class="col-lg-12 col-md-12" align="center">
                                <img src="<?php echo Yii::$app->request->baseUrl.$imagePath?>" class="user-image"/>
                                <br><br>
                            </div>
                            <br><br>
                            <div id="image-div">
                            <?= $form->field($model, 'image')
                                ->label(false)
                                ->fileInput(['class' => 'btn btn-primary']) ?>
                            </div>
                            <br />
                        </div>
                    </div>
                    <hr>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h4 style="text-align: center">Extend Profile</h4>
                            <br>
                            <div style="display: inline-block;padding-left: 20%">
                                <div style="float: left;">
                            <h5 class="item-title">Company Name</h5>
                            <?= $form->field($model, 'companyName')
                                ->label(false)
                                ->textInput(['maxlength' => true,'style' => 'float:left; width: 400px;']) ?>
                                </div>
                                <div style="float: left;margin: 0 0 0 70px">
                            <h5 class="item-title">Wallet Address</h5>
                            <?= $form->field($model, 'walletAddress')
                                ->label(false)
                                ->textInput(['maxlength' => true, 'style' => 'float:left; width: 400px;']) ?>
                                </div>
                            </div>
                            <div style="display: inline-block;padding-left: 20%">
                                <div style="float: left;">
                                    <h5 class="item-title">Biography</h5>
                                    <?= $form->field($model, 'biography')
                                        ->label(false)
                                        ->textarea(['row' => 10,'maxlength' => true,'style' => 'float:left; width: 400px;']) ?>
                                </div>
                                <div style="float: left;margin: 0 0 0 70px">
                                    <h5 class="item-title">Website</h5>
                                    <?= $form->field($model, 'website')
                                        ->label(false)
                                        ->textInput(['maxlength' => true, 'style' => 'float:left; width: 400px;']) ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <br>
                    <div class="form-group">
                        <div id="image-div">
                        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Save Profile', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                        <?=
                        Html::a('View Profile',['index'],[
                            'class' => 'btn btn-default',
                            'id' => 'cancel',
                        ])
                        ?>
                        </div>
                    </div>
                    <?php ActiveForm::end(); ?>

                </div>
                <hr>
            </div>
        </div>
</div>
</main>
</body>

