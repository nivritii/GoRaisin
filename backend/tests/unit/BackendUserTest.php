<?php
namespace backend\tests;

use backend\models\UserBackend;

class BackendUserTest extends \Codeception\Test\Unit
{
    /**
     * @var \backend\tests\UnitTester
     */
    protected $tester;
    
    protected function _before()
    {
        $bUser = new UserBackend();
    }

    protected function _after()
    {
        $bUser = null;
    }

    // tests
    /*
     * Test user_backend validation
     */
    public function testValidation()
    {
        $bUser = new UserBackend();

        //Test null input
        $bUser->username = null;
        $bUser->auth_key = null;
        $bUser->password_hash = null;
        $bUser->email  = null;
        $this->assertFalse($bUser->validate(['username']));
        $this->assertFalse($bUser->validate(['auth_key']));
        $this->assertFalse($bUser->validate(['password_hash']));
        $this->assertFalse($bUser->validate(['email']));

        //Test invalid input
        $bUser->username = "Matt Brown is a musician, teacher & producer in Chicago, 
        Illinois. He performs with Greg Reish, Big Sadie, and has made guest appearances 
        with Tim O'Brien, The John Hartford Stringband, Uncle Earl, Dirk Powell & Riley Baugus, 
        Della Mae, and with Mike Snider on the Grand Ole Opry.";
        $this->assertFalse($bUser->validate(['username']));
        $bUser->mobile = "2312321321321211234234342354532535221";
        $this->assertFalse($bUser->validate(['mobile']));
        $bUser->position = "hdhdjsidwjfhjskdahfjsdakfhsfhjskfhjsdhf";
        $this->assertFalse($bUser->validate(['position']));

        //Test valid input
        $bUser->username = "username";
        $bUser->auth_key = "shjksdfksa";
        $bUser->password_hash = "hsjkafhsahfd323fw";
        $bUser->email = "email@email.com";
        $bUser->mobile = "12345678";
        $bUser->position = "position";
        $bUser->image = "image.jpg";
        $this->assertEquals($bUser->username,'username');
        $this->assertEquals($bUser->auth_key,'shjksdfksa');
        $this->assertEquals($bUser->password_hash,'hsjkafhsahfd323fw');
        $this->assertEquals($bUser->email,'email@email.com');
        $this->assertEquals($bUser->mobile,'12345678');
        $this->assertEquals($bUser->position,'position');
        $this->assertEquals($bUser->image,'image.jpg');
    }

    /*
     * Test save Backenduser
     */
    public function testSaveBackenduser()
    {
        $bUser = new UserBackend();
        $bUser->setAttributes(['username' => 'username','auth_key' => 'hhsdashdjkashjka','password_hash' => 'dshajkdhaskj642783','email' => 'email@email.com','mobile' => '12345678','position' => 'position','image' => 'image.jpg']);
        $bUser->save();
        $this->tester->canSeeRecord('backend\models\UserBackend',array('username' => 'username','auth_key' => 'hhsdashdjkashjka','password_hash' => 'dshajkdhaskj642783','email' => 'email@email.com','mobile' => '12345678','position' => 'position','image' => 'image.jpg'));
    }

    /*
     * Test delete backenduser
     */
    public function testDeleteBackenduser()
    {
        $bUser = new UserBackend();
        $bUser->setAttributes(['username' => 'username','auth_key' => 'hhsdashdjkashjka','password_hash' => 'dshajkdhaskj642783','email' => 'email@email.com','mobile' => '12345678','position' => 'position','image' => 'image.jpg']);
        $bUser->save();
        $this->tester->canSeeRecord('backend\models\UserBackend',array('username' => 'username','auth_key' => 'hhsdashdjkashjka','password_hash' => 'dshajkdhaskj642783','email' => 'email@email.com','mobile' => '12345678','position' => 'position','image' => 'image.jpg'));
        $bUser->delete();
        $this->assertFalse($bUser == null);
    }
}