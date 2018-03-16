<?php
namespace frontend\tests;

use frontend\models\SignupForm;
use common\fixtures\UserFixture;

class SignupFormTest extends \Codeception\Test\Unit
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
        $sign = null;
    }

    // tests
    /*
     * Test signup form validation
     */
    public function testVaidation()
    {
        $sign = new SignupForm();

        //Test null input
        $sign->username = null;
        $sign->password = null;
        $sign->email = null;
        $sign->repeat_password = null;
        $this->assertFalse($sign->validate(['username']));
        $this->assertFalse($sign->validate(['password']));
        $this->assertFalse($sign->validate(['email']));

        //Test invalid input
        $sign->username = "u";
        $this->assertFalse($sign->validate(['username']));
        $sign->username = "usernameusernameusernameusernameusernameusernameusernameusernameusernameusernameusernameusername
        usernameusernameusernameusernameusernameusernameusernameusernameusernameusernameusernameusernameusernameusername
        usernameusernameusernameusernameusernameusernameusernameusernameusernameusername";
        $this->assertFalse($sign->validate(['username']));
        $sign->password = "pass";
        $this->assertFalse($sign->validate(['password']));
        $sign->email = "email";
        $this->assertFalse($sign->validate(['email']));
        $sign->email = "email@";
        $this->assertFalse($sign->validate(['email']));
        $sign->password = "password";
        $sign->repeat_password = "password111";
        $this->assertFalse($sign->validate(['repeat_password']));

        //Test valid input
        $sign->username = "username";
        $sign->email = "username@email.com";
        $sign->password = "password";
        $sign->repeat_password = "password";
        $this->assertEquals($sign->username,"username");
        $this->assertEquals($sign->email,"username@email.com");
        $this->assertEquals($sign->password,"password");
        $this->assertEquals($sign->repeat_password,"password");
    }

    /*
     * Test signup method
     */
    public function testSignup()
    {
        $sign = new SignupForm();

        $sign->setAttributes([
            "username" => "username",
            "email" => "username@email.com",
            "password" => "password",
            "repeat_password" => "password",
        ]);
        $sign->signup();
        $this->assertEquals($sign->username,"username");
        $this->assertEquals($sign->email,"username@email.com");
        $this->assertEquals($sign->password,"password");
        $this->assertEquals($sign->repeat_password,"password");
    }

    /*
     * Test incorrect signup
     */
    public function testNotCorrectSignup()
    {
        $model = new SignupForm([
            'username' => 'troy.becker',
            'email' => 'nicolas.dianna@hotmail.com',
            'password' => 'some_password',
        ]);

        expect_not($model->signup());
        expect_that($model->getErrors('username'));
        expect_that($model->getErrors('email'));

        expect($model->getFirstError('username'))
            ->equals('This username has already been taken.');
        expect($model->getFirstError('email'))
            ->equals('This email address has already been taken.');
    }
}