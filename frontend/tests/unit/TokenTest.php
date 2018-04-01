<?php
namespace frontend\tests;

use Yii;
use frontend\models\Token;

class TokenTest extends \Codeception\Test\Unit
{
    /**
     * @var \frontend\tests\UnitTester
     */
    protected $tester;
    
    protected function _before()
    {
        $token = new Token();
    }

    protected function _after()
    {
        $token = null;
    }

    // tests
    /*
     * Test token validation
     */
    public function testValidation()
    {
        $token = new Token();

        //Test null input
        Yii::$app->db->createCommand('set foreign_key_checks=0')->execute();
        $token->c_id = null;
        $token->t_name = null;
        $token->t_value = null;
        $this->assertFalse($token->validate(['c_id']));
        $this->assertFalse($token->validate(['t_name']));
        $this->assertFalse($token->validate(['t_value']));
        Yii::$app->db->createCommand('set foreign_key_checks=1')->execute();

        //Test invalid input
        $token->t_value = "value";
        $this->assertTrue($token->validate(['t_value']));

        //Test valid input
        $token->c_id = 1;
        $token->t_name = "token";
        $token->t_value = 111;
        $this->assertEquals($token->c_id,1);
        $this->assertEquals($token->t_name,"token");
        $this->assertEquals($token->t_value,111);
    }

    /*
     * Test save Token
     */
    public function testSaveToken()
    {
        $token = new Token();

        Yii::$app->db->createCommand('set foreign_key_checks=0')->execute();
        $token->setAttributes(['c_id' => 1,'t_name' => 'token name','t_value' => 100]);
        $token->save(false);
        $this->tester->canSeeRecord('frontend\models\Token',array('c_id' => 1,'t_name' => 'token name','t_value' => 100));
        Yii::$app->db->createCommand('set foreign_key_checks=1')->execute();
    }

    /*
     * Test delete token
     */
    public function testDeleteToken()
    {
        $token = new Token();

        Yii::$app->db->createCommand('set foreign_key_checks=0')->execute();
        $token->setAttributes(['c_id' => 1,'t_name' => 'token name','t_value' => 100]);
        $token->save(false);
        $this->tester->canSeeRecord('frontend\models\Token',array('c_id' => 1,'t_name' => 'token name','t_value' => 100));
        $token->delete();
        $this->assertFalse($token == null);
        Yii::$app->db->createCommand('set foreign_key_checks=1')->execute();
    }
}