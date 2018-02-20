<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
use yii\helpers\Url;
use yii\bootstrap\Modal;
backend\assets\ProfileAsset::register($this);
$imagePath = '/'.Yii::$app->user->identity->image;

/* @var $this yii\web\View */
/* @var $model backend\models\UserBackend */

$this->title = 'View Profile - GoRaisin Backend';
$this->params['breadcrumbs'][] = ['label' => 'User Backends', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>

<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <!-- profile-widget -->
            <div class="col-lg-12">
                <div class="profile-widget profile-widget-info">
                    <div class="panel-body">
                        <div class="col-lg-12 col-sm-12">
                            <br/>
                            <img src="<?php echo Yii::$app->request->baseUrl.$imagePath?>" width="120" height="120" class="img-circle"/>
                            <br />
                            <h3><?= yii::$app->user->identity->username?></h3>
                            <p><?= yii::$app->user->identity->position?></p>
                            <br/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading tab-bg-info">
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a data-toggle="tab" href="#profile">
                                    <i class="fa fa-user-circle fa-2x"></i>
                                    Profile
                                </a>
                            </li>
                        </ul>
                    </header>
                    <div class="panel-body">
                        <div class="tab-content">
                            <!-- profile -->
                            <div id="profile" class="tab-pane active">
                                <section class="panel">
                                    <div class="panel-body bio-graph-info">
                                        <h1>Bio Graph</h1>
                                        <div class="row">
                                            <div class="bio-row">
                                                <p><span>User Name </span><?= yii::$app->user->identity->username?></p>
                                            </div>
                                            <div class="bio-row">
                                                <p><span>Email </span><?= yii::$app->user->identity->email?></p>
                                            </div>
                                            <div class="bio-row">
                                                <p><span>Position</span><?= yii::$app->user->identity->position?></p>
                                            </div>
                                            <div class="bio-row">
                                                <p><span>Mobile </span><?= yii::$app->user->identity->mobile?></p>
                                            </div>
                                            <div class="bio-row">
                                                <p><span>Phone </span><?= yii::$app->user->identity->phone?></p>
                                            </div>
                                        </div>
                                        <?=
                                        Html::a('Edit',['update','id' => $model->id],[
                                            'class' => 'btn btn-default btn-update',
                                            'id' => 'update',
                                            /*'data-toggle' => 'modal',
                                            'data-target' => '#operate-modal',*/
                                            'style' => 'background-color: #50327c; color: #ffffff',
                                        ])
                                        ?>
                                    </div>
                                </section>
                                <section>
                                    <div class="row">
                                    </div>
                                </section>
                            </div>
                            <!-- edit-profile -->
                            <!--<div id="edit-profile" class="tab-pane">
                                <section class="panel">
                                    <div class="panel-body bio-graph-info">
                                        <h1> Profile Info</h1>
                                        <form class="form-horizontal" role="form">
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">First Name</label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="f-name" placeholder=" ">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Last Name</label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="l-name" placeholder=" ">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">About Me</label>
                                                <div class="col-lg-10">
                                                    <textarea name="" id="" class="form-control" cols="30" rows="5"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Country</label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="c-name" placeholder=" ">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Birthday</label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="b-day" placeholder=" ">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Occupation</label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="occupation" placeholder=" ">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Email</label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="email" placeholder=" ">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Mobile</label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="mobile" placeholder=" ">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Website URL</label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="url" placeholder="http://www.demowebsite.com ">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-lg-offset-2 col-lg-10">
                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                    <button type="button" class="btn btn-danger">Cancel</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </section>
                            </div> -->
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <!-- page end-->
    </section>
</section>

<?php
Modal::begin([
    'id' => 'operate-modal',
    'header' => '<h4 class="modal-title"></h4>',
]);
Modal::end();
?>

<?php
/*$userId = Yii::$app->user->identity->id;
$requestUpdateUrl = Url::toRoute('user-backend/update');
$js = <<<JS
    $('.btn-update').on('click',function () {
        $('.modal-title').html('Edit Profile');
        $.get('{$requestUpdateUrl}',{id: $userId},
            function(data) {
              $('.modal-body').html(data);
            }
        );
    });
JS;
$this->registerJs($js);
*/?>


