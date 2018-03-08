<?php
namespace frontend\tests;

use Yii;
use frontend\models\Comment;

class CommentTest extends \Codeception\Test\Unit
{
    /**
     * @var \frontend\tests\UnitTester
     */
    protected $tester;
    
    protected function _before()
    {
        $com = new Comment();
    }

    protected function _after()
    {
        $com = null;
    }

    // tests
    /*
     * Test comment validation
     */
    public function testValidation()
    {
        $com = new Comment();

        //Test null input
        Yii::$app->db->createCommand('set foreign_key_checks=0')->execute();
        $com->comment_camp_id = null;
        $com->comment_user_id = null;
        $com->comment_content = null;
        $this->assertFalse($com->validate(['comment_camp_id']));
        $this->assertFalse($com->validate(['comment_user_id']));
        $this->assertFalse($com->validate(['comment_content']));
        Yii::$app->db->createCommand('set foreign_key_checks=1')->execute();

        //Test invalid input
        $com->comment_content = "
            So, a few years ago, we ran a successful Kickstarter to fund three new volumes of the hit webcomic, 
            Least I Could Do, because we had fallen behind in our yearly publishing schedule. It was a rousing success, 
            fun and games were had by all and everyone went home happy! Especially us, as we had three new books to share with all of you! 
        ";
        $this->assertFalse($com->validate(['comment_content']));

        //Test valid input
        $com->comment_camp_id = 1;
        $com->comment_user_id = 1;
        $com->comment_content = "So, a few years ago, we ran a successful Kickstarter to fund three new volumes of the hit webcomic";
        $com->comment_status = "status";
        $com->comment_datetime = "2018-03-05 12:26:48";
        $this->assertEquals($com->comment_camp_id,1);
        $this->assertEquals($com->comment_user_id,1);
        $this->assertEquals($com->comment_content,"So, a few years ago, we ran a successful Kickstarter to fund three new volumes of the hit webcomic");
        $this->assertEquals($com->comment_status,"status");
        $this->assertEquals($com->comment_datetime,"2018-03-05 12:26:48");
    }

    /*
     * Test save comment
     */
    public function testSaveComment()
    {
        $com = new Comment();

        Yii::$app->db->createCommand('set foreign_key_checks=0')->execute();
        $com->setAttributes(['comment_camp_id' => 1,'comment_user_id' => 1,'comment_content' => 'comment content!!','comment_status' => 'status','comment_datetime' => '2018-03-05 12:26:48']);
        $com->save(false);
        $this->tester->canSeeRecord('frontend\models\Comment',array('comment_camp_id' => 1,'comment_user_id' => 1,'comment_content' => 'comment content!!','comment_status' => 'status','comment_datetime' => '2018-03-05 12:26:48'));
        Yii::$app->db->createCommand('set foreign_key_checks=1')->execute();
    }

    /*
     * Test delete comment
     */
    public function testDeleteComment()
    {
        $com = new Comment();

        Yii::$app->db->createCommand('set foreign_key_checks=0')->execute();
        $com->setAttributes(['comment_camp_id' => 1,'comment_user_id' => 1,'comment_content' => 'comment content!!','comment_status' => 'status','comment_datetime' => '2018-03-05 12:26:48']);
        $com->save(false);
        $this->tester->canSeeRecord('frontend\models\Comment',array('comment_camp_id' => 1,'comment_user_id' => 1,'comment_content' => 'comment content!!','comment_status' => 'status','comment_datetime' => '2018-03-05 12:26:48'));
        $com->delete();
        $this->assertFalse($com == null);
        Yii::$app->db->createCommand('set foreign_key_checks=1')->execute();
    }
}