<?php
namespace backend\tests;

use Yii;
use backend\models\Category;

class CategoryTest extends \Codeception\Test\Unit
{
    /**
     * @var \backend\tests\UnitTester
     */
    protected $tester;
    
    protected function _before()
    {
        $category = new Category();
    }

    protected function _after()
    {
        $category = null;
    }

    // tests
    /*
     * Test category validation
     */
    public function testValidation()
    {
        $category = new Category();

        //Test null input
        Yii::$app->db->createCommand('set foreign_key_checks=0')->execute();
        $category->name = null;
        $category->class = null;
        $category->featured_campaign_id = null;
        $this->assertTrue($category->validate(['name']));
        $this->assertTrue($category->validate(['class']));
        $this->assertFalse($category->validate(['featured_campaign_id']));
        Yii::$app->db->createCommand('set foreign_key_checks=1')->execute();

        //Test invalid input
        $category->name = "dhjkashdkjahkjshdjkahdjkashdkjahajkhajkdhak";
        $this->assertFalse($category->validate(['name']));

        //Test valid input
        $category->name = "name";
        $category->class = "active";
        $category->featured_campaign_id = 1;
        $this->assertEquals($category->name,"name");
        $this->assertEquals($category->class,"active");
        $this->assertEquals($category->featured_campaign_id,1);
    }

    /*
     * Test save category
     */
    public function testSaveCategory()
    {
        $category = new Category();

        Yii::$app->db->createCommand('set foreign_key_checks=0')->execute();
        $category->setAttributes(['name' => 'name','class' => 'active','featured_campaign_id' => 1]);
        $category->save(false);
        $this->tester->canSeeRecord('backend\models\Category',array('name' => 'name','class' => 'active','featured_campaign_id' => 1));
        Yii::$app->db->createCommand('set foreign_key_checks=1')->execute();
    }

    /*
     * Test delete category
     */
    public function testDeleteCategory()
    {
        $category = new Category();

        Yii::$app->db->createCommand('set foreign_key_checks=0')->execute();
        $category->setAttributes(['name' => 'name','class' => 'active','featured_campaign_id' => 1]);
        $category->save(false);
        $this->tester->canSeeRecord('backend\models\Category',array('name' => 'name','class' => 'active','featured_campaign_id' => 1));
        $category->delete();
        $this->assertFalse($category == null);
        Yii::$app->db->createCommand('set foreign_key_checks=1')->execute();
    }
}