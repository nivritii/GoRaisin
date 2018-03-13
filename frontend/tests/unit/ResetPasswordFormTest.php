<?php
namespace frontend\tests;

use frontend\models\ResetPasswordForm;
use common\fixtures\UserFixture;

class ResetPasswordFormTest extends \Codeception\Test\Unit
{
    /**
     * @var \frontend\tests\UnitTester
     */
    protected $tester;
    
    protected function _before()
    {
        $this->tester->haveFixtures([
            'user' => [
                'class' => UserFixture::className(),
                'dataFile' => codecept_data_dir() . 'user.php'
            ],
        ]);
    }

    protected function _after()
    {
        $passwordReset = null;
    }

    // tests
    /*
     * Test reset wrong token
     */
    public function testResetWrongToken()
    {
        $this->tester->expectException('yii\base\InvalidParamException', function() {
            new ResetPasswordForm('');
        });

        $this->tester->expectException('yii\base\InvalidParamException', function() {
            new ResetPasswordForm('notexistingtoken_1391882543');
        });
    }

    /*
     * Test reset correct token
     */
    public function testResetCorrectToken()
    {
        $user = $this->tester->grabFixture('user',0);
        $form = new ResetPasswordForm($user['password_reset_token']);
        expect_that($form->resetPassword());
    }
}