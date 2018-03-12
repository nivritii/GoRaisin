<?php
namespace backend\tests;

use backend\models\FrontendUser;

class FrontendUserTest extends \Codeception\Test\Unit
{
    /**
     * @var \backend\tests\UnitTester
     */
    protected $tester;
    
    protected function _before()
    {
        $user = new FrontendUser();
    }

    protected function _after()
    {
        $user = null;
    }

    // tests
    /*
     * Test frontend user validation
     */
    public function testValidation()
    {
        $user = new FrontendUser();

        //Test null input
        $user->username = null;
        $user->auth_key = null;
        $user->password_hash = null;
        $user->email = null;
        $user->created_at = null;
        $user->updated_at = null;
        $this->assertFalse($user->validate(['username']));
        $this->assertFalse($user->validate(['auth_key']));
        $this->assertFalse($user->validate(['password_hash']));
        $this->assertFalse($user->validate(['email']));
        $this->assertFalse($user->validate(['created_at']));
        $this->assertFalse($user->validate(['updated_at']));

        //Test invalid input
        $user->username = "usernameusernameusernameusernameusernameusernameusernameusernameusernameusernameusernameusername
        usernameusernameusernameusernameusernameusernameusernameusernameusernameusernameusernameusernameusernameusername
        usernameusernameusernameusernameusernameusernameusernameusernameusernameusername";
        $this->assertFalse($user->validate(['username']));
        $user->email = "emailusernameusernameusernameusernameusernameusernameusernameusernameusernameusernameusernameusername
        usernameusernameusernameusernameusernameusernameusernameusernameusernameusernameusernameusernameusernameusernameusername
        usernameusernameusernameusernameusernameusernameusernameusernameusername@gmail.com";
        $this->assertFalse($user->validate(['email']));
        $user->companyName = "companynamecompanynamecompanynamecompanynamecompanynamecompanynamecompanynamecompanynamecompanyname";
        $this->assertFalse($user->validate(['companyName']));

        //Test valid input
        $user->username = "bob";
        $user->auth_key = "V2qtaHGPF1W2MKazcnunHIgrQkJalUST";
        $user->password_hash = "$2y$13$9n3nbM0LnxBpLjpPD1zkputt4xb24TYgiQPJrgvjjKUEVt5vDch6W";
        $user->password_reset_token = "I9GZVPeeEGMfU17scY6Qn1dz7Y2fYEmy_1518588811";
        $user->email = "email@email.com";
        $user->status = "10";
        $user->created_at = "21328376452";
        $user->updated_at = "29384729102";
        $user->image = "image.jpg";
        $user->companyName = "company name";
        $user->walletAddress = "$2y$13$9n3nbM0LnxBpLjpPD1zkputt4xb24";
        $this->assertEquals($user->username,"bob");
        $this->assertEquals($user->auth_key,"V2qtaHGPF1W2MKazcnunHIgrQkJalUST");
        $this->assertEquals($user->password_hash,"$2y$13$9n3nbM0LnxBpLjpPD1zkputt4xb24TYgiQPJrgvjjKUEVt5vDch6W");
        $this->assertEquals($user->password_reset_token,"I9GZVPeeEGMfU17scY6Qn1dz7Y2fYEmy_1518588811");
        $this->assertEquals($user->email,"email@email.com");
        $this->assertEquals($user->status,"10");
        $this->assertEquals($user->created_at,"21328376452");
        $this->assertEquals($user->updated_at,"29384729102");
        $this->assertEquals($user->image,"image.jpg");
        $this->assertEquals($user->companyName,"company name");
        $this->assertEquals($user->walletAddress,"$2y$13$9n3nbM0LnxBpLjpPD1zkputt4xb24");
    }

    /*
     * Test save frontend user
     */
    public function testSaveFrontendUser()
    {
        $user = new FrontendUser();

        $user->setAttributes([
            "username" => "bob",
            "auth_key" => "V2qtaHGPF1W2MKazcnunHIgrQkJalUST",
            "password_hash" => "$2y$13$9n3nbM0LnxBpLjpPD1zkputt4xb24TYgiQPJrgvjjKUEVt5vDch6W",
            "password_reset_token" => "I9GZVPeeEGMfU17scY6Qn1dz7Y2fYEmy_1518588811",
            "email" => "email@email.com",
            "status" => "10",
            "created_at" => "1514529217",
            "updated_at" => "1514529217",
            "image" => "image.jpg",
            "companyName" => "company name",
            "walletAddress" => "$2y$13$9n3nbM0LnxBpLjpPD1zkputt4xb24",
        ]);
        $user->save();
        $this->tester->canSeeRecord('backend\models\FrontendUser',array(
            "username" => "bob",
            "auth_key" => "V2qtaHGPF1W2MKazcnunHIgrQkJalUST",
            "password_hash" => "$2y$13$9n3nbM0LnxBpLjpPD1zkputt4xb24TYgiQPJrgvjjKUEVt5vDch6W",
            "password_reset_token" => "I9GZVPeeEGMfU17scY6Qn1dz7Y2fYEmy_1518588811",
            "email" => "email@email.com",
            "status" => "10",
            "created_at" => "1514529217",
            "updated_at" => "1514529217",
            "image" => "image.jpg",
            "companyName" => "company name",
            "walletAddress" => "$2y$13$9n3nbM0LnxBpLjpPD1zkputt4xb24",
        ));
    }

    /*
     * Test delete frontend user
     */
    public function testDeleteFrontendUser()
    {
        $user = new FrontendUser();

        $user->setAttributes([
            "username" => "bob",
            "auth_key" => "V2qtaHGPF1W2MKazcnunHIgrQkJalUST",
            "password_hash" => "$2y$13$9n3nbM0LnxBpLjpPD1zkputt4xb24TYgiQPJrgvjjKUEVt5vDch6W",
            "password_reset_token" => "I9GZVPeeEGMfU17scY6Qn1dz7Y2fYEmy_1518588811",
            "email" => "email@email.com",
            "status" => "10",
            "created_at" => "1514529217",
            "updated_at" => "1514529217",
            "image" => "image.jpg",
            "companyName" => "company name",
            "walletAddress" => "$2y$13$9n3nbM0LnxBpLjpPD1zkputt4xb24",
        ]);
        $user->save();
        $this->tester->canSeeRecord('backend\models\FrontendUser',array(
            "username" => "bob",
            "auth_key" => "V2qtaHGPF1W2MKazcnunHIgrQkJalUST",
            "password_hash" => "$2y$13$9n3nbM0LnxBpLjpPD1zkputt4xb24TYgiQPJrgvjjKUEVt5vDch6W",
            "password_reset_token" => "I9GZVPeeEGMfU17scY6Qn1dz7Y2fYEmy_1518588811",
            "email" => "email@email.com",
            "status" => "10",
            "created_at" => "1514529217",
            "updated_at" => "1514529217",
            "image" => "image.jpg",
            "companyName" => "company name",
            "walletAddress" => "$2y$13$9n3nbM0LnxBpLjpPD1zkputt4xb24",
        ));
        $user->delete();
        $this->assertFalse($user == null);
    }
}