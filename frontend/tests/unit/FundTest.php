<?php
namespace frontend\tests;

use Yii;
use frontend\models\Fund;

class FundTest extends \Codeception\Test\Unit
{
    /**
     * @var \frontend\tests\UnitTester
     */
    protected $tester;
    
    protected function _before()
    {
        $fund = new Fund();
    }

    protected function _after()
    {
        $fund = null;
    }

    // tests
    /*
     * Test fund validation
     */
    public function testValidation()
    {
        $fund = new Fund();

        //Test null input
        Yii::$app->db->createCommand('set foreign_key_checks=0')->execute();
        $fund->fund_c_id = null;
        $fund->fund_user_id = null;
        $fund->fund_amt = null;
        $this->assertFalse($fund->validate(['fund_c_id']));
        $this->assertFalse($fund->validate(['fund_user_id']));
        $this->assertFalse($fund->validate(['fund_amt']));
        Yii::$app->db->createCommand('set foreign_key_checks=1')->execute();

        //Test invalid input
        $fund->fund_amt = "fund";
        $this->assertFalse($fund->validate(['fund_amt']));

        //Test valid input
        Yii::$app->db->createCommand('set foreign_key_checks=0')->execute();
        $fund->fund_c_id = 1;
        $fund->fund_user_id = 1;
        $fund->fund_amt = 1000;
        $fund->fund_created_on = "2018-03-05 12:26:48";
        $this->assertEquals($fund->fund_c_id,1);
        $this->assertEquals($fund->fund_user_id,1);
        $this->assertEquals($fund->fund_amt,1000);
        $this->assertEquals($fund->fund_created_on,"2018-03-05 12:26:48");
        Yii::$app->db->createCommand('set foreign_key_checks=1')->execute();
    }

    /*
     * Test save fund
     */
    public function testSaveFund()
    {
        $fund = new Fund();

        Yii::$app->db->createCommand('set foreign_key_checks=0')->execute();
        $fund->setAttributes(['fund_c_id' => 1,'fund_user_id' => 1,'fund_amt' => 1000,'fund_created_on' => '2018-03-05 12:26:48']);
        $fund->save(false);
        $this->tester->canSeeRecord('frontend\models\Fund',array('fund_c_id' => 1,'fund_user_id' => 1,'fund_amt' => 1000,'fund_created_on' => '2018-03-05 12:26:48'));
        Yii::$app->db->createCommand('set foreign_key_checks=1')->execute();
    }

    /*
     * Test delete fund
     */
    public function testDeleteFund()
    {
        $fund = new Fund();

        Yii::$app->db->createCommand('set foreign_key_checks=0')->execute();
        $fund->setAttributes(['fund_c_id' => 1,'fund_user_id' => 1,'fund_amt' => 1000,'fund_created_on' => '2018-03-05 12:26:48']);
        $fund->save(false);
        $this->tester->canSeeRecord('frontend\models\Fund',array('fund_c_id' => 1,'fund_user_id' => 1,'fund_amt' => 1000,'fund_created_on' => '2018-03-05 12:26:48'));
        $fund->delete();
        $this->assertFalse($fund == null);
        Yii::$app->db->createCommand('set foreign_key_checks=1')->execute();
    }
}