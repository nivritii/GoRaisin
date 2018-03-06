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
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>

<div class="campaign-faq">
    <h4>Frequently asked questions</h4>
    <p>Project creator will be glad to answer your queries.</p>
    <div class="section" style="margin-top:25px; padding-bottom:20px;">
        <a href="#">
            <button class="btn btn-info" data-toggle="modal" data-target="#modalForm">Ask a question</button>
        </a>
    </div>

    <div class="panel-group" id="accordion">
        <?php foreach ($faqs as $faq) {?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 data-toggle="collapse" data-parent="#accordion" href="#collapse1" class="panel-title expand">
                    <div class="right-arrow pull-right">+</div>
                    <a href="#"><?=$faq->question?></a>
                </h4>
            </div>
            <div id="collapse1" class="panel-collapse collapse">
                <div class="panel-body"><?=$faq->answer?></div>
            </div>
        </div>
        <?php }?>
    </div>

</div>

<!-- Modal -->
<div class="modal fade" id="modalForm" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Ask a question about: <?=$model->c_title?></h4>
            </div>
            <!-- Modal body -->

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

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <?= Html::submitButton($faq->isNewRecord ? 'Ask a question' : 'Update', ['class' => $faq->isNewRecord ? 'btn btn-info' : 'btn btn-primary','style' => 'background-color:#940094;color:#ffffff']) ?>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>

<script>
$(function() {
$(".expand").on( "click", function() {
// $(this).next().slideToggle(200);
$expand = $(this).find(">:first-child");

if($expand.text() == "+") {
$expand.text("-");
} else {
$expand.text("+");
}
});
});
</script>