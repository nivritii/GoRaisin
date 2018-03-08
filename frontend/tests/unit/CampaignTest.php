<?php
namespace frontend\tests;

use frontend\models\Campaign;
use frontend\models\Category;
use frontend\models\Location;
use frontend\models\User;
use Yii;

class CampaignTest extends \Codeception\Test\Unit
{
    /**
     * @var \frontend\tests\UnitTester
     */
    protected $tester;
    
    protected function _before()
    {
        $camp = new Campaign();
    }

    protected function _after()
    {
        $camp = null;
    }

    // tests

    /*
     * Test campaign validation
     */
    public function testValidation()
    {
        $camp = new Campaign();

        // Test null input
        $camp->c_cat_id = null;
        $camp->c_author = null;
        $camp->c_location = null;
        $this->assertFalse($camp->validate(['c_cat_id']));
        $this->assertFalse($camp->validate(['c_author']));
        $this->assertFalse($camp->validate(['c_location']));

        //Test invalid input
        $camp->c_video = "jsiwshdcsuwqdds";
        $this->assertFalse($camp->validate(['c_video']));

        //Test input validation
        $camp->c_title = 'YOKE Conscious Dance Movement Soundsystem Fundraiser';
        $camp->c_status = 'draft';
        $camp->c_created_at = '2018-03-05 12:26:48';
        $camp->c_image = 'yoke.jpg';
        $camp->c_description = 'We are calling upon the community to raise funds for a high quality sound system, to go deeper into movement and sound at YOKE events.';
        $camp->c_start_date = '2018-05-30';
        $camp->c_end_date = '2018-08-31';
        $camp->c_goal = 1000;
        $camp->c_video = 'shwuwodhffd';
        $camp->c_description_long =
            'YOKE is a Melbourne based community fusing dance & self expression with live and electronic beats. The word YOKE is a Sanskrit term meaning \'coming together\', forming union. Our workshops are about facilitating authentic connections to oneself and one other in a space completely free from judgments. We invite you to take the time to let go of the mind and drop into the body through ecstatic dance and movement. YOKE is a collaborative consciousness calling all individuals seeking to express intuitively and energize the soul.

            YOKE has been running since January 2016, and has made a huge positive impact of the lives of many who have experienced this journey of movement and sounds. It is not just a dance workshop; it is a full body journey through the senses. We incorporate high quality sounds with visual aesthetics, energy clearing scents, cosmic tea brews and treats all to enhance the dance floor experience. There is a theme each session which we explore through the set curated by a selected Dj. None of this would be possible without the use of a high quality sound system. Vibrational frequencies are the subtleties in the room that give participants a mind blowing experience and feelings of ecstasy without the use of intoxicants. This movement is essentially promoting drug and alcohol free partying by teaching young people that they can get \'high\' off sound vibrations and the atmosphere created in the space at an experiential level. 

            In order to reach a wider target audience, it is necessary for the investment in a sound system that can be transported to different event locations. We are raising funds for an Evox 8 RCF sound system, as this has been the best quality system we have experienced so far. It is also compactable so can be transported easily to event locations. As Yoke continues to expand it is important that we uphold the high standards of sound to fulfil our main mission; empowering individuals to realise their individual potential on the dance floor and in the outside world.';
        $camp->c_new_tag = '0';
        $this->assertTrue($camp->c_title == 'YOKE Conscious Dance Movement Soundsystem Fundraiser');
        $this->assertTrue($camp->c_status == 'draft');
        $this->assertTrue($camp->c_created_at == '2018-03-05 12:26:48');
        $this->assertTrue($camp->c_image == 'yoke.jpg');
        $this->assertTrue($camp->c_description == 'We are calling upon the community to raise funds for a high quality sound system, to go deeper into movement and sound at YOKE events.');
        $this->assertTrue($camp->c_start_date == '2018-05-30');
        $this->assertTrue($camp->c_end_date == '2018-08-31');
        $this->assertTrue($camp->c_goal == 1000);
        $this->assertTrue($camp->c_video == 'shwuwodhffd');
        $this->assertFalse($camp->c_description_long == '
            YOKE is a Melbourne based community fusing dance & self expression with live and electronic beats. The word YOKE is a Sanskrit term meaning \'coming together\', forming union. Our workshops are about facilitating authentic connections to oneself and one other in a space completely free from judgments. We invite you to take the time to let go of the mind and drop into the body through ecstatic dance and movement. YOKE is a collaborative consciousness calling all individuals seeking to express intuitively and energize the soul.

            YOKE has been running since January 2016, and has made a huge positive impact of the lives of many who have experienced this journey of movement and sounds. It is not just a dance workshop; it is a full body journey through the senses. We incorporate high quality sounds with visual aesthetics, energy clearing scents, cosmic tea brews and treats all to enhance the dance floor experience. There is a theme each session which we explore through the set curated by a selected Dj. None of this would be possible without the use of a high quality sound system. Vibrational frequencies are the subtleties in the room that give participants a mind blowing experience and feelings of ecstasy without the use of intoxicants. This movement is essentially promoting drug and alcohol free partying by teaching young people that they can get \'high\' off sound vibrations and the atmosphere created in the space at an experiential level. 

            In order to reach a wider target audience, it is necessary for the investment in a sound system that can be transported to different event locations. We are raising funds for an Evox 8 RCF sound system, as this has been the best quality system we have experienced so far. It is also compactable so can be transported easily to event locations. As Yoke continues to expand it is important that we uphold the high standards of sound to fulfil our main mission; empowering individuals to realise their individual potential on the dance floor and in the outside world.
        ');
        $this->assertTrue($camp->c_new_tag == '0');
    }

    /*
     * Test save campaign
     */
    public function testSaveCampaign()
    {
        Yii::$app->db->createCommand('set foreign_key_checks=0')->execute();
        $camp = new Campaign();

        $camp->setAttributes([
            'c_title' => 'Campaign Title',
            'c_status' => 'draft',
            'c_author' => 1,
            'c_location' => 1,
            'c_cat_id' => 1,
            'c_created_at' => '2018-03-05 12:26:48',
            'c_image' => 'campaign.jpg',
            'c_description' => 'This is a description.',
            'c_start_date' => '2018-05-01',
            'c_end_date' => '2018-08-05',
            'c_goal' => 20,
            'c_video' => 'hdsuiwodw92',
            'c_description_long' => 'YOKE has been running since January 2016, and has made a huge positive impact of',
            'c_new_tag' => '0',
            ]);
        $camp->save(false);
        $this->tester->canSeeRecord('frontend\models\Campaign',array('c_title' => 'Campaign Title',
            'c_status' => 'draft',
            'c_author' => 1,
            'c_location' => 1,
            'c_cat_id' => 1,
            'c_created_at' => '2018-03-05 12:26:48',
            'c_image' => 'campaign.jpg',
            'c_description' => 'This is a description.',
            'c_start_date' => '2018-05-01',
            'c_end_date' => '2018-08-05',
            'c_goal' => 20,
            'c_video' => 'hdsuiwodw92',
            'c_description_long' => 'YOKE has been running since January 2016, and has made a huge positive impact of',
            'c_new_tag' => '0',));
        Yii::$app->db->createCommand('set foreign_key_checks=1')->execute();
    }

    /*
     * Test delete campaign
     */
    public function testDeleteCampaign()
    {
        Yii::$app->db->createCommand('set foreign_key_checks=0')->execute();
        $camp = new Campaign();

        $camp->setAttributes([
            'c_title' => 'Campaign Title',
            'c_status' => 'draft',
            'c_author' => 1,
            'c_location' => 1,
            'c_cat_id' => 1,
            'c_created_at' => '2018-03-05 12:26:48',
            'c_image' => 'campaign.jpg',
            'c_description' => 'This is a description.',
            'c_start_date' => '2018-05-01',
            'c_end_date' => '2018-08-05',
            'c_goal' => 20,
            'c_video' => 'hdsuiwodw92',
            'c_description_long' => 'YOKE has been running since January 2016, and has made a huge positive impact of',
            'c_new_tag' => '0',
        ]);
        $camp->save();
        $camp->delete();
        $this->assertFalse($camp == null);
        Yii::$app->db->createCommand('set foreign_key_checks=1')->execute();

    }
}