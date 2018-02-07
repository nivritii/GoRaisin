<?php
/**
 * Created by PhpStorm.
 * User: cherry
 * Date: 07/02/2018
 * Time: 11:46 AM
 */

use Codeception\Test\Unit;
use frontend\models\Category;

class CategoryTest extends Unit
{
    /**
     * @var \frontend\tests\UnitTester
     */
    protected $tester;


    public function _before()
    {
        $category = new Category();
    }

    public function testValidation()
    {
        $category = new Category();
        $category->c_title = null;
        $this->assertFalse($category->validate(['c_title']));

        $category->c_title = 'davert has a picture';
        $this->assertTrue($category->validate(['c_title']));

        $category->c_image = null;
        $this->assertFalse($category->validate(['c_image']));

        $category->c_image = 'campaign.jpg';
        $this->assertTrue($category->validate(['c_image']));

        $category->c_description = null;
        $this->assertFalse($category->validate(['c_description']));
        $category->c_description = 'For others who might run into this problem, I found that the "acceptance" files discussed above were not created in my bootstrap command.
                                    It turned out that I was getting the following message when running the bootstrap command: Project already initialized at '.'
                                    I deleted my tests folder and the codeception.yml file, ran the bootstrap again, and was golden.';
        $this->assertFalse($category->validate(['c_description']));

        $category->c_description = 'For others who might run into this problem, I found that the "acceptance"';
        $this->assertTrue($category->validate(['c_description']));

        $category->c_start_date = null;
        $this->assertFalse($category->validate(['c_start_date']));
        $category->c_start_date = '2018';
        $this->assertFalse($category->validate(['c_start_date']));

        $category->c_start_date = '2018-01-25';
        $this->assertTrue($category->validate(['c_start_date']));

        $category->c_end_date = null;
        $this->assertFalse($category->validate(['c_end_date']));
        $category->c_end_date = '2018';
        $this->assertFalse($category->validate(['c_end_date']));

        $category->c_end_date = '2018-01-25';
        $this->assertTrue($category->validate(['c_end_date']));

        $category->upadted_at = null;
        $this->assertFalse($category->validate(['updated_at']));
        $category->created_at = '10';
        $this->assertFalse($category->validate(['updated_at']));

        $category->created_at = '2018-01-25';
        $this->assertTrue($category->validate(['updated_at']));

        $category->c_goal = null;
        $this->assertFalse($category->validate(['c_goal']));
        $category->c_goal = '000';
        $this->assertFalse($category->validate(['c_goal']));

        $category->c_goal = '1000';
        $this->assertTrue($category->validate(['c_goal']));

        $category->c_author = null;
        $this->assertFalse($category->validate(['c_author']));
        $category->c_author = 'aaaaa';
        $this->assertFalse($category->validate(['c_author']));

        $category->c_author = 1;
        $this->assertTrue($category->validate(['c_author']));

        $category->c_display_name = null;
        $this->assertFalse($category->validate(['c_display_name']));

        $category->c_display_name = 'team9';
        $this->assertTrue($category->validate(['walletAddress']));

        $category->c_status = null;
        $this->assertFalse($category->validate(['c_status']));
        $category->c_status = 'eee';
        $this->assertFalse($category->validate(['c_status']));

        $category->c_status = 'draft';
        $this->assertTrue($category->validate(['c_status']));

        $category->c_cat_id = null;
        $this->assertFalse($category->validate(['c_cat_id']));
        $category->c_cat_id = 0;
        $this->assertFalse($category->validate(['c_cat_id']));

        $category->c_cat_id = 7;
        $this->assertTrue($category->validate(['c_cat_id']));

    }
}