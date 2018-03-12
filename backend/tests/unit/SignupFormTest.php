<?php
namespace backend\tests;

use backend\models\SignupForm;

class SignupFormTest extends \Codeception\Test\Unit
{
    /**
     * @var \backend\tests\UnitTester
     */
    protected $tester;
    
    protected function _before()
    {
        $signup = new SignupForm();
    }

    protected function _after()
    {
        $sign = null;
    }

    // tests
    /*
     * Test signup form validation
     */
    public function testValidation()
    {
        $sign = new SignupForm();

        //Test null input
        $sign->username = null;
        $sign->password = null;
        $sign->email = null;
        $sign->confirmPass = null;
        $this->assertFalse($sign->validate(['username']));
        $this->assertFalse($sign->validate(['password']));
        $this->assertFalse($sign->validate(['email']));
        $this->assertFalse($sign->validate(['confirmPass']));

        //Test invalid input
        $sign->username = "u";
        $this->assertFalse($sign->validate(['username']));
        $sign->username = "usernameusernameusernameusernameusernameusernameusernameusernameusernameusernameusernameusernameusername
        usernameusernameusernameusernameusernameusernameusernameusernameusernameusernameusernameusernameusernameusername
        usernameusernameusernameusernameusernameusernameusername";
        $this->assertFalse($sign->validate(['username']));
        $sign->email = "email";
        $this->assertFalse($sign->validate(['email']));
        $sign->email = "email@";
        $this->assertFalse($sign->validate(['email']));
        $sign->password = "shiwd";
        $this->assertFalse($sign->validate(['password']));
        $sign->password = "1234567";
        $sign->confirmPass = "2344";
        $this->assertFalse($sign->validate(['confirmPass']));


        //Test valid input
        $sign->username = "username";
        $sign->password = "password";
        $sign->email = "email@email.com";
        $sign->confirmPass = "password";
        $this->assertEquals($sign->username,"username");
        $this->assertEquals($sign->password,"password");
        $this->assertEquals($sign->email,"email@email.com");
        $this->assertEquals($sign->confirmPass,"password");
    }

    /*
     * Test signup
     */
    public function testSignup()
    {
        $sign = new SignupForm();

        $sign->setAttributes([
            "username" => "username",
            "password" => "password",
            "email" => "email@email.com",
            "confirnPass" => "password",
        ]);
        $sign->signup();
    }
}