<?php
/**
 * Created by PhpStorm.
 * User: cherry
 * Date: 07/02/2018
 * Time: 9:34 AM
 */
namespace frontend\tests\unit\models;

use Codeception\Test\Unit;
use common\fixtures\UserFixture;
use frontend\models\User;

class UserTest extends Unit
{
    /**
     * @var \frontend\tests\UnitTester
     */
    protected $tester;


    public function _before()
    {
        $this->tester->haveFixtures([
            'user' => [
                'class' => UserFixture::className(),
                'dataFile' => codecept_data_dir() . 'user.php'
            ]
        ]);
    }

    public function testValidation()
    {
        $user = new User();
        $user->username = null;
        $this->assertFalse($user->validate(['username']));
        $user->username = 'toolooooongnaaaaaaameeeeeeeeeeeeeee';
        $this->assertFalse($user->validate(['username']));

        $user->username = 'davert';
        $this->assertTrue($user->validate(['username']));

        $user->email = null;
        $this->assertFalse($user->validate(['email']));
        $user->email = 'usernameexample.com';
        $this->assertFalse($user->validate(['email']));

        $user->email = 'davert@example.com';
        $this->assertTrue($user->validate(['email']));

        $user->status = null;
        $this->assertFalse($user->validate(['status']));
        $user->status = 000;
        $this->assertFalse($user->validate(['status']));

        $user->status = 10;
        $this->assertTrue($user->validate(['status']));

        $user->created_at = null;
        $this->assertFalse($user->validate(['created_at']));
        $user->created_at = '2018';
        $this->assertFalse($user->validate(['created_at']));

        $user->created_at = '2018-01-25';
        $this->assertTrue($user->validate(['created_at']));

        $user->upadted_at = null;
        $this->assertFalse($user->validate(['updated_at']));
        $user->updated_at = '10';
        $this->assertFalse($user->validate(['updated_at']));

        $user->updated_at = '2018-01-25';
        $this->assertTrue($user->validate(['updated_at']));

        $user->image = null;
        $this->assertFalse($user->validate(['image']));

        $user->image = 'hello.jpg';
        $this->assertTrue($user->validate(['image']));

        $user->companyName = null;
        $this->assertFalse($user->validate(['companyName']));
        $user->companyName = 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa';
        $this->assertFalse($user->validate(['companyName']));

        $user->companyName = 'Webpuppies';
        $this->assertTrue($user->validate(['companyName']));

        $user->walletAddress = null;
        $this->assertFalse($user->validate(['walletAddress']));

        $user->walletAddress = '3PHjEekZRS856nz2DDAtPeJ2EYjfjBZPHau';
        $this->assertTrue($user->validate(['walletAddress']));

        $user->location = null;
        $this->assertFalse($user->validate(['location']));
        $user->location = 'sss';
        $this->assertFalse($user->validate(['location']));

        $user->location = 'Singapore';
        $this->assertTrue($user->validate(['location']));

    }
}