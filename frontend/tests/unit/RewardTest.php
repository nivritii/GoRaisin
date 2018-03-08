<?php
namespace frontend\tests;
use Yii;
use frontend\models\Reward;

class RewardTest extends \Codeception\Test\Unit
{
    /**
     * @var \frontend\tests\UnitTester
     */
    protected $tester;
    
    protected function _before()
    {
        $reward = new Reward();
    }

    protected function _after()
    {
        $reward = null;
    }

    // tests

    /*
     * Test reward validation
     */
    public function testValidation()
    {
        $reward = new Reward();

        //Test null input
        Yii::$app->db->createCommand('set foreign_key_checks=0')->execute();
        $reward->c_id = null;
        $this->assertFalse($reward->validate(['c_id']));
        Yii::$app->db->createCommand('set foreign_key_checks=1')->execute();

        //Test valid input
        $reward->r_pledge_amt = 10;
        $reward->r_description = "reward description";
        $reward->r_validity = 1;
        $reward->r_discount = 10;
        $this->assertTrue($reward->validate(['r_pledge_amt']));
        $this->assertTrue($reward->validate(['r_description']));
        $this->assertTrue($reward->validate(['r_validity']));
        $this->assertTrue($reward->validate(['r_discount']));

        //Test invalid input
        $reward->r_pledge_amt = "jsjs";
        $this->assertFalse($reward->validate(['r_pledge_amt']));
        $reward->r_validity = "hjwfsd";
        $this->assertFalse($reward->validate(['r_validity']));
        $reward->r_discount = "das";
        $this->assertFalse($reward->validate(['r_discount']));

        //Test input validation
        Yii::$app->db->createCommand('set foreign_key_checks=0')->execute();
        $reward->c_id = 1;
        $reward->r_pledge_amt = 10;
        $reward->r_description = 'reward description';
        $reward->r_validity = 1;
        $reward->r_discount = 5;
        $this->assertTrue($reward->c_id == 1);
        $this->assertTrue($reward->r_pledge_amt == 10);
        $this->assertTrue($reward->r_description == 'reward description');
        $this->assertTrue($reward->r_validity == 1);
        $this->assertTrue($reward->r_discount == 5);
        Yii::$app->db->createCommand('set foreign_key_checks=1')->execute();
    }

    /*
     * Test save reward
     */
    public function testSaveReward()
    {
        $reward = new Reward();

        Yii::$app->db->createCommand('set foreign_key_checks=0')->execute();
        $reward->setAttributes(['c_id' => 1,'r_pledge_amt' => 10,'r_description' => 'reward description','r_validity' => 1,'r_discount' => 3]);
        $reward->save(false);
        $this->tester->canSeeRecord('frontend\models\Reward',array('c_id' => 1,'r_pledge_amt' => 10,'r_description' => 'reward description','r_validity' => 1,'r_discount' => 3));
        Yii::$app->db->createCommand('set foreign_key_checks=1')->execute();
    }

    /*
     * Test delete reward
     */
    public function testDeleteReward()
    {
        $reward = new Reward();
        Yii::$app->db->createCommand('set foreign_key_checks=0')->execute();
        $reward->setAttributes(['c_id' => 1,'r_pledge_amt' => 10,'r_description' => 'reward description','r_validity' => 1,'r_discount' => 3]);
        $reward->save();
        $reward->delete();
        $this->assertFalse($reward == null);
        Yii::$app->db->createCommand('set foreign_key_checks=1')->execute();
    }
}