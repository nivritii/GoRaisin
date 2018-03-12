<?php
namespace backend\tests;

use backend\models\LoginForm;

class LoginFormTest extends \Codeception\Test\Unit
{
    /**
     * @var \backend\tests\UnitTester
     */
    protected $tester;
    
    protected function _before()
    {
        $login = new LoginForm();
    }

    protected function _after()
    {
        $login = null;
    }

    // tests
    /*
     * Test login form validation
     */
    public function testValidation()
    {
        $login = new LoginForm();

        //Test null input
        $login->username = null;
        $login->password = null;
        $this->assertFalse($login->validate(['username']));
        $this->assertFalse($login->validate(['password']));

        //Test valid input
        $login->username = "username";
        $login->password = "password";
        $login->rememberMe = true;
        $this->assertEquals($login->username,"username");
        $this->assertEquals($login->password,"password");
        $this->assertEquals($login->rememberMe,true);

    }

    /*
     * Test login
     */
    public function testLogin()
    {
        $login = new LoginForm();

        $login->setAttributes([
            "username" => "username",
            "password" => "password",
            "rememberMe" => true,
        ]);
        $login->login();
    }

    /*
     * Test validate password
     */
    public function testValidatePassword()
    {
        $login = new LoginForm();

        $login->setAttributes([
            "username" => "username",
            "password" => "password",
            "rememberMe" => true,
        ]);
        $login->validatePassword($login);
    }
}