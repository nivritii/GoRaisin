<?php
namespace frontend\tests;

use frontend\models\Wallet;

class WalletTest extends \Codeception\Test\Unit
{
    /**
     * @var \frontend\tests\UnitTester
     */
    protected $tester;
    
    protected function _before()
    {
        $wallet = new Wallet();
    }

    protected function _after()
    {
        $wallet = null;
    }

    // tests

    /*
     * Test wallet validation
     */
    public function testValidation()
    {
        // Test null input
        $wallet = new Wallet();

        $wallet->userId = null;
        $wallet->accname = null;
        $wallet->balance = null;
        $this->assertFalse($wallet->validate(['userId']));
        $this->assertFalse($wallet->validate(['accname']));
        $this->assertFalse($wallet->validate(['balance']));

        // Test wallet input
        $wallet->userId = 1;
        $wallet->accname = "dhsafhjksfhuiwe82199";
        $wallet->balance=20;
        $this->assertFalse($wallet->validate(['userId']));
        $this->assertTrue($wallet->validate(['accname']));
        $this->assertTrue($wallet->validate(['balance']));

        //Test invalid input
        $wallet->balance = "dhj";
        $this->assertFalse($wallet->validate(['balance']));

        //Test input validation
        $wallet->userId = 1;
        $wallet->accname = "dhasjfkha821bfhsjd";
        $wallet->balance = 10;
        $this->assertTrue($wallet->userId == 1);
        $this->assertTrue($wallet->accname == "dhasjfkha821bfhsjd");
        $this->assertTrue($wallet->balance == 10);
    }

    /*
     * Test save wallet
     */
    public function testSaveWallet()
    {
        $wallet = new Wallet();
        $wallet->setAttributes(['userId' => 1,'accname' => 'dahjksdh218jfdbs','brainKey' => 'dahjksdh218jfdbs','balance' => 10]);
        $wallet->save();
        $this->assertEquals(1,$wallet->userId);
        $this->assertEquals('dahjksdh218jfdbs',$wallet->accname);
        $this->assertEquals(10,$wallet->balance);
    }
}