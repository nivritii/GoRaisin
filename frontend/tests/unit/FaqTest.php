<?php
namespace frontend\tests;

use Yii;
use frontend\models\Faq;

class FaqTest extends \Codeception\Test\Unit
{
    /**
     * @var \frontend\tests\UnitTester
     */
    protected $tester;
    
    protected function _before()
    {
        $faq = new Faq();
    }

    protected function _after()
    {
        $faq = null;
    }

    // tests
    /*
     * Test Faq validation
     */
    public function testValidation()
    {
        $faq = new Faq();

        // Test null input
        Yii::$app->db->createCommand('set foreign_key_checks=0')->execute();
        $faq->campaign_id = null;
        $this->assertFalse($faq->validate(['campaign_id']));
        $faq->user_id = null;
        $this->assertFalse($faq->validate(['user_id']));
        $faq->question = null;
        $this->assertFalse($faq->validate(['question']));
        $faq->answer = null;
        $this->assertTrue($faq->validate(['answer']));
        $faq->timestamp = null;
        $this->assertTrue($faq->validate(['timestamp']));
        Yii::$app->db->createCommand('set foreign_key_checks=1')->execute();

        //Test input validation
        Yii::$app->db->createCommand('set foreign_key_checks=0')->execute();
        $faq->campaign_id = 1;
        $faq->user_id = 1;
        $faq->question = "question";
        $faq->answer = "answer";
        $faq->timestamp = "2018-03-05 12:26:48";
        $this->assertEquals($faq->campaign_id,1);
        $this->assertEquals($faq->user_id,1);
        $this->assertEquals($faq->question,"question");
        $this->assertEquals($faq->answer,"answer");
        $this->assertEquals($faq->timestamp,"2018-03-05 12:26:48");
        Yii::$app->db->createCommand('set foreign_key_checks=1')->execute();
    }

    /*
     * Test save faq
     */
    public function testSaveFaq()
    {
        $faq = new Faq();

        Yii::$app->db->createCommand('set foreign_key_checks=0')->execute();
        $faq->setAttributes(['campaign_id' => 1,'user_id' => 1,'question' => 'What is in the omnibus?','answer' => 'All the strips from years 1-5 (so no "Noir Et Blanc"). That\'s still available for those who\'d like to suffer through-- uh, I mean enjoy it as an addendum.','timestamp' => '2018-03-05 12:26:48']);
        $faq->save(false);
        $this->tester->canSeeRecord('frontend\models\Faq',array('campaign_id' => 1,'user_id' => 1,'question' => 'What is in the omnibus?','answer' => 'All the strips from years 1-5 (so no "Noir Et Blanc"). That\'s still available for those who\'d like to suffer through-- uh, I mean enjoy it as an addendum.','timestamp' => '2018-03-05 12:26:48'));
        Yii::$app->db->createCommand('set foreign_key_checks=1')->execute();
    }

    /*
     * Test delete faq
     */
    public function testDeleteFaq()
    {
        $faq = new Faq();

        Yii::$app->db->createCommand('set foreign_key_checks=0')->execute();
        $faq->setAttributes(['campaign_id' => 1,'user_id' => 1,'question' => 'What is in the omnibus?','answer' => 'All the strips from years 1-5 (so no "Noir Et Blanc"). That\'s still available for those who\'d like to suffer through-- uh, I mean enjoy it as an addendum.','timestamp' => '2018-03-05 12:26:48']);
        $faq->save(false);
        $this->tester->canSeeRecord('frontend\models\Faq',array('campaign_id' => 1,'user_id' => 1,'question' => 'What is in the omnibus?','answer' => 'All the strips from years 1-5 (so no "Noir Et Blanc"). That\'s still available for those who\'d like to suffer through-- uh, I mean enjoy it as an addendum.','timestamp' => '2018-03-05 12:26:48'));
        $faq->delete();
        $this->assertFalse($faq == null);
        Yii::$app->db->createCommand('set foreign_key_checks=1')->execute();
    }
}