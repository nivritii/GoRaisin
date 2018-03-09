<?php
namespace frontend\tests;

use Yii;
use frontend\models\Update;

class UpdateTest extends \Codeception\Test\Unit
{
    /**
     * @var \frontend\tests\UnitTester
     */
    protected $tester;
    
    protected function _before()
    {
        $update = new Update();
    }

    protected function _after()
    {
        $update = null;
    }

    // tests
    /*
     * Test update validation
     */
    public function testValidation()
    {
        $update = new Update();

        //Test null input
        Yii::$app->db->createCommand('set foreign_key_checks=0')->execute();
        $update->campaign_id = null;
        $update->title = null;
        $update->content = null;
        $update->image_id = null;
        $this->assertFalse($update->validate(['campaign_id']));
        $this->assertFalse($update->validate(['title']));
        $this->assertFalse($update->validate(['content']));
        $this->assertFalse($update->validate(['image_id']));
        Yii::$app->db->createCommand('set foreign_key_checks=1')->execute();

        //Test invalid input
        $update->title = "
            So, a few years ago, we ran a successful Kickstarter to fund three new volumes of the hit webcomic, 
            Least I Could Do, because we had fallen behind in our yearly publishing schedule. It was a rousing success, 
            fun and games were had by all and everyone went home happy! Especially us, as we had three new books to share with all of you! 
        ";
        $this->assertFalse($update->validate(['content']));

        //Test valid input
        Yii::$app->db->createCommand('set foreign_key_checks=0')->execute();
        $update->campaign_id = 1;
        $update->title = "update title";
        $update->content = "update content is a content that is about the campaign update. Its constraint is 200.";
        $update->timestamp = "2018-03-05 12:26:48";
        $update->image_id = 1;
        $this->assertEquals($update->campaign_id,1);
        $this->assertEquals($update->title,'update title');
        $this->assertEquals($update->content,'update content is a content that is about the campaign update. Its constraint is 200.');
        $this->assertEquals($update->timestamp,'2018-03-05 12:26:48');
        $this->assertEquals($update->image_id,1);
        Yii::$app->db->createCommand('set foreign_key_checks=1')->execute();
    }

    /*
     * Test save update
     */
    public function testSaveUpdate()
    {
        $update = new Update();

        Yii::$app->db->createCommand('set foreign_key_checks=0')->execute();
        $update->setAttributes(['campaign_id' => 1,'title' => 'update title','content' => 'update content is a content that is about the campaign update. Its constraint is 200.','timestamp' => '2018-03-05 12:26:48','image_id' => 1]);
        $update->save(false);
        $this->tester->canSeeRecord('frontend\models\Update',array('campaign_id' => 1,'title' => 'update title','content' => 'update content is a content that is about the campaign update. Its constraint is 200.','timestamp' => '2018-03-05 12:26:48','image_id' => 1));
        Yii::$app->db->createCommand('set foreign_key_checks=1')->execute();
    }

    /*
     * Test delete update
     */
    public function testDeleteUpdate()
    {
        $update = new Update();

        Yii::$app->db->createCommand('set foreign_key_checks=0')->execute();
        $update->setAttributes(['campaign_id' => 1,'title' => 'update title','content' => 'update content is a content that is about the campaign update. Its constraint is 200.','timestamp' => '2018-03-05 12:26:48','image_id' => 1]);
        $update->save(false);
        $this->tester->canSeeRecord('frontend\models\Update',array('campaign_id' => 1,'title' => 'update title','content' => 'update content is a content that is about the campaign update. Its constraint is 200.','timestamp' => '2018-03-05 12:26:48','image_id' => 1));
        $update->delete();
        $this->assertFalse($update == null);
        Yii::$app->db->createCommand('set foreign_key_checks=1')->execute();
    }
}