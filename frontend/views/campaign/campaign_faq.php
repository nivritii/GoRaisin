<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use frontend\models\Faq;

/* @var $this yii\web\View */
/* @var $model frontend\models\Campaign */
/* @var $form ActiveForm */
$faq = new Faq();
?>
<!-- Latest minified bootstrap css -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

<!-- Latest minified bootstrap js -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<div class="campaign-faq">
    <h4>Frequently asked questions</h4>
    <p>Project creator will be glad to answer your queries.</p>
    <div class="section" style="margin-top:25px; padding-bottom:20px;">
        <a href="#">
            <button class="btn btn-info"  data-toggle="modal" data-target="#modalForm">Ask a question</button>
        </a>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalForm" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!--             Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Ask a question about: <?=$model->c_title?></h4>
            </div>

            <!--             Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p>
                <form role="form">
                    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
                    <div class="form-group">
                        <p>To: <a><?=$model->cAuthor->username?></a></p>
                    </div>
                    <div class="form-group">
                        <?= $form->field($faq, 'answer')->textarea(['rows' => 6])?>
                    </div>
                </form>
            </div>

            <!--             Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <?= Html::submitButton($faq->isNewRecord ? 'Ask a question' : 'Update', ['class' => $faq->isNewRecord ? 'btn btn-info' : 'btn btn-primary']) ?>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
