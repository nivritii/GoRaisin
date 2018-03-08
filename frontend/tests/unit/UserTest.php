<?php
namespace frontend\tests;

use frontend\models\User;

class UserTest extends \Codeception\Test\Unit
{
    /**
     * @var \frontend\tests\UnitTester
     */
    protected $tester;
    
    protected function _before()
    {
        $user = new User();
    }

    protected function _after()
    {
        $user = null;
    }

    // tests
    /*public function testSomeFeature()
    {
        $this->assertEquals(2,2);

    }*/
    /*
     * Test user validation
     */
    public function testValidation()
    {
        // Test null input
        $user = new User();

        $user -> username = null;
        $user -> email = null;
        $this->assertFalse($user->validate(['username']));
        $this->assertFalse($user->validate(['email']));

        // Test valid input about sign up
        $user->username = "bob";
        $user->email = "bob@gmail.com";
        $this->assertTrue($user->validate(['username']));
        $this->assertTrue($user->validate(['email']));

        //Test invalid input of email
        $user->email = "2123321";
        $this->assertFalse($user->validate(['email']));
        $user->email = "hdhfkjsfhs";
        $this->assertFalse($user->validate(['email']));
        $user->email = "hdhfkjsfhs@";
        $this->assertFalse($user->validate(['email']));
        $user->email = "hdhfkjsfhs.com";
        $this->assertFalse($user->validate(['email']));

        //Test input validation
        $user->username = "bob";
        $this->assertTrue($user->username == 'bob');
        $user->email = "bob@gmail.com";
        $this->assertTrue($user->email == 'bob@gmail.com');
        $user->companyName = "Webpuppies";
        $this->assertTrue($user->companyName == 'Webpuppies');
        $user->walletAddress = "231312fdhsjfhasj";
        $this->assertTrue($user->walletAddress == '231312fdhsjfhasj');
        $user->location = "Singapore";
        $this->assertTrue($user->location == 'Singapore');
        $user->website = "webpuppies.com.sg";
        $this->assertTrue($user->website == 'webpuppies.com.sg');
        $user->biography = "DAME was founded by Celia Pool and Alec Mills, two friends on a mission to create beautiful more sustainable products that enrich our everyday lives.";
        $this->assertTrue($user->biography == 'DAME was founded by Celia Pool and Alec Mills, two friends on a mission to create beautiful more sustainable products that enrich our everyday lives.');
    }
    /*
     * Test save user
     */
    public function testSaveUser()
    {
        $user = new User();
        $user->setAttributes(['username' => 'bob','auth_key' => 'hdsjhfdjskafffas','password_hash' => 'hdksajhfjksahfash','created_at' => '1273828282','updated_at' => '1273828282','status' => '10','email' => 'bob@gmail.com']);
        $user->save(false);
        $this->assertEquals('bob',$user->getAttribute('username'));
        $this->assertEquals('hdsjhfdjskafffas',$user->getAttribute('auth_key'));
        $this->assertEquals('hdksajhfjksahfash',$user->getAttribute('password_hash'));
        $this->assertEquals('1273828282',$user->getAttribute('created_at'));
        $this->assertEquals('1273828282',$user->getAttribute('updated_at'));
        $this->assertEquals('1273828282',$user->getAttribute('updated_at'));
        $this->assertEquals('10',$user->getAttribute('status'));
        $this->assertEquals('bob@gmail.com',$user->getAttribute('email'));
        $this->tester->canSeeRecord('frontend\models\User',array('username'=>'bob','auth_key' => 'hdsjhfdjskafffas','password_hash' => 'hdksajhfjksahfash','created_at' => '1273828282','updated_at' => '1273828282','status' => '10','email' => 'bob@gmail.com'));
    }
}