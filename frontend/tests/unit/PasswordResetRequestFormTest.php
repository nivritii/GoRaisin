<?php
namespace frontend\tests;

use frontend\models\PasswordResetRequestForm;
use Yii;
use common\fixtures\UserFixture as UserFixture;
use common\models\User;

class PasswordResetRequestFormTest extends \Codeception\Test\Unit
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
            ]
        ]);
    }

    protected function _after()
    {
        $resetPass = null;
    }

    // tests
    /*
     * Test password reset request form validation
     */
    public function testValidation()
    {
        $resetPass = new PasswordResetRequestForm();

        //Test null input
        $resetPass->email = null;
        $this->assertFalse($resetPass->validate(['email']));

        //Test invalid input
        $resetPass->email = "email";
        $this->assertFalse($resetPass->validate(['email']));
        $resetPass->email = "email@";
        $this->assertFalse($resetPass->validate(['email']));

        //Test valid input
        $resetPass->email = "email@email.com";
        $this->assertEquals($resetPass->email,"email@email.com");
    }

    /*
     * Test send email method
     */
    public function testSendEmail()
    {
        $resetPass = new PasswordResetRequestForm();
        $user = new User();

        $user->setAttributes([
            'username' => 'bob',
            'auth_key' => 'hdsjhfdjskafffas',
            'password_hash' => 'hdksajhfjksahfash',
            'created_at' => '1273828282',
            'updated_at' => '1273828282',
            'status' => '10',
            'email' => 'cherry@webpuppies.com.sg'
        ]);

        $resetPass->setAttributes([
            "email" => "cherry@webpuppies.com.sg"
        ]);
        $resetPass->sendEmail();
    }

    /*
     * Test send email with wrong email address
     */
    public function testSendMessageWithWrongEmailAddress()
    {
        $model = new PasswordResetRequestForm();
        $model->email = 'not-existing-email@example.com';
        expect_not($model->sendEmail());
    }

    /*
     * Test send email to inactive users
     */
    public function testNotSendEmailsToInactiveUser()
    {
        $user = $this->tester->grabFixture('user', 1);
        $model = new PasswordResetRequestForm();
        $model->email = $user['email'];
        expect_not($model->sendEmail());
    }

    /*
     * Test send email successfully with correct email address
     */
    public function testSendEmailSuccessfully()
    {
        $userFixture = $this->tester->grabFixture('user', 0);

        $model = new PasswordResetRequestForm();
        $model->email = $userFixture['email'];
        $user = User::findOne(['password_reset_token' => $userFixture['password_reset_token']]);

        expect_that($model->sendEmail());
        expect_that($user->password_reset_token);

        $emailMessage = $this->tester->grabLastSentEmail();
        expect('valid email is sent', $emailMessage)->isInstanceOf('yii\mail\MessageInterface');
        expect($emailMessage->getTo())->hasKey($model->email);
        expect($emailMessage->getFrom())->hasKey(Yii::$app->params['supportEmail']);
    }
}