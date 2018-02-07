<?php
/**
 * Created by PhpStorm.
 * User: cherry
 * Date: 07/02/2018
 * Time: 11:22 AM
 */
namespace frontend\tests\unit\models;

use Codeception\Test\Unit;
use common\fixtures\UserFixture;
use frontend\models\Campaign;

class UserTest extends Unit
{
    /**
     * @var \frontend\tests\UnitTester
     */
    protected $tester;


    public function _before()
    {
        $campaign = new Campaign();
    }

    public function testValidation()
    {
        $campaign = new Campaign();
        $campaign->c_title = null;
        $this->assertFalse($campaign->validate(['c_title']));

        $campaign->c_title = 'davert has a picture';
        $this->assertTrue($campaign->validate(['c_title']));

        $campaign->c_image = null;
        $this->assertFalse($campaign->validate(['c_image']));

        $campaign->c_image = 'campaign.jpg';
        $this->assertTrue($campaign->validate(['c_image']));

        $campaign->c_description = null;
        $this->assertFalse($campaign->validate(['c_description']));
        $campaign->c_description = 'For others who might run into this problem, I found that the "acceptance" files discussed above were not created in my bootstrap command.
                                    It turned out that I was getting the following message when running the bootstrap command: Project already initialized at '.'
                                    I deleted my tests folder and the codeception.yml file, ran the bootstrap again, and was golden.';
        $this->assertFalse($campaign->validate(['c_description']));

        $campaign->c_description = 'For others who might run into this problem, I found that the "acceptance"';
        $this->assertTrue($campaign->validate(['c_description']));

        $campaign->c_start_date = null;
        $this->assertFalse($campaign->validate(['c_start_date']));
        $campaign->c_start_date = '2018';
        $this->assertFalse($campaign->validate(['c_start_date']));

        $campaign->c_start_date = '2018-01-25';
        $this->assertTrue($campaign->validate(['c_start_date']));

        $campaign->c_end_date = null;
        $this->assertFalse($campaign->validate(['c_end_date']));
        $campaign->c_end_date = '2018';
        $this->assertFalse($campaign->validate(['c_end_date']));

        $campaign->c_end_date = '2018-01-25';
        $this->assertTrue($campaign->validate(['c_end_date']));

        $campaign->upadted_at = null;
        $this->assertFalse($campaign->validate(['updated_at']));
        $campaign->created_at = '10';
        $this->assertFalse($campaign->validate(['updated_at']));

        $campaign->created_at = '2018-01-25';
        $this->assertTrue($campaign->validate(['updated_at']));

        $campaign->c_goal = null;
        $this->assertFalse($campaign->validate(['c_goal']));
        $campaign->c_goal = '000';
        $this->assertFalse($campaign->validate(['c_goal']));

        $campaign->c_goal = '1000';
        $this->assertTrue($campaign->validate(['c_goal']));

        $campaign->c_author = null;
        $this->assertFalse($campaign->validate(['c_author']));
        $campaign->c_author = 'aaaaa';
        $this->assertFalse($campaign->validate(['c_author']));

        $campaign->c_author = 1;
        $this->assertTrue($campaign->validate(['c_author']));

        $campaign->c_display_name = null;
        $this->assertFalse($campaign->validate(['c_display_name']));

        $campaign->c_display_name = 'team9';
        $this->assertTrue($campaign->validate(['walletAddress']));

        $campaign->c_status = null;
        $this->assertFalse($campaign->validate(['c_status']));
        $campaign->c_status = 'eee';
        $this->assertFalse($campaign->validate(['c_status']));

        $campaign->c_status = 'draft';
        $this->assertTrue($campaign->validate(['c_status']));

        $campaign->c_cat_id = null;
        $this->assertFalse($campaign->validate(['c_cat_id']));
        $campaign->c_cat_id = 0;
        $this->assertFalse($campaign->validate(['c_cat_id']));

        $campaign->c_cat_id = 7;
        $this->assertTrue($campaign->validate(['c_cat_id']));

    }
}