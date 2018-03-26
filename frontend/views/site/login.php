
<?php
//test
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Modal;
use yii\helpers\Url;

$this->title = 'Log in - GoRaisin';
$this->params['breadcrumbs'][] = $this->title;
frontend\assets\LoginAsset::register($this);
?>
<div class="site-login">
    <div id="login-div">
        <p class="form-title">Log in</p>
        <div class="row">
            <div style="margin-left: 6%;margin-top: 9%;margin-right: 3%;">
                <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, 'username')
                    ->textInput(['autofocus' => true,'style' => 'width:380px','placeholder' => 'Username'])
                    ->label(false)
                ?>

                <?= $form->field($model, 'password')
                    ->passwordInput(['style' => 'width:380px','placeholder' => 'Password'])
                    ->label(false)
                ?>

                <div style="color:#999;margin:1em 0">
                    <?= Html::a('Forgot your password?', ['site/request-password-reset'],['class' => 'forget-password','data-toggle' => 'modal','data-target' => '#forgot-password']) ?>
                </div>

                <?= Html::submitButton('Log in', ['class' => 'login-button', 'name' => 'login-button','style' => 'width:363px']) ?>

                <?= $form->field($model, 'rememberMe')->checkbox() ?>
                <?php ActiveForm::end(); ?>

                <fieldset class="title">
                    <legend>Or</legend>
                </fieldset>
                <br />

                <div>
                    <?= yii\authclient\widgets\AuthChoice::widget([
                        'baseAuthUrl' => ['site/auth'],
                    ]) ?>
                    <?php /*use yii\authclient\widgets\AuthChoice; */?><!--
                    <?php /*$authAuthChoice = AuthChoice::begin(['baseAuthUrl' => ['site/auth'], 'autoRender' => false]); */?>
                    <ul>
                        <?php /*foreach ($authAuthChoice->getClients() as $client): */?>
                            <li><?/*= Html::a( 'Log in with '. $client->title, ['site/auth', 'authclient'=> $client->name, ], ['class' => "btn btn-block btn-default $client->name "]) */?></li>
                        <?php /*endforeach; */?>
                    </ul>
                    --><?php /*AuthChoice::end(); */?>
                </div>

                <p class="notice-facebook">We'll never post anything on Facebook without your permission.</p>

                <hr />
                <p class="signup-notice">New to GoRaisin? <?= Html::a('Sign up', ['site/signup'],['class' => 'signup-a']) ?></p>
            </div>
        </div>
    </div>
</div>


<?php
Modal::begin([
    'id' => 'forgot-password',
    'header' => '<h4 class="modal-title"></h4>',
]);
Modal::end();
?>

<?php
$requestCreateUrl = Url::toRoute('requestPasswordResetToken');
$js = <<<JS
// 创建操作
$('#create').on('click', function () {
    $('.modal-title').html('Forgot your password?');
    $.get('{$requestCreateUrl}',
        function (data) {
            $('.modal-body').html(data);
        }  
    );
});
JS;
$this->registerJs($js);
?>
