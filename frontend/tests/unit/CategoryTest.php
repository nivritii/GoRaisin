<?php
namespace frontend\tests;

use frontend\models\Category;

class CategoryTest extends \Codeception\Test\Unit
{
    /**
     * @var \frontend\tests\UnitTester
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

        $category->name = null;
        $this->assertTrue($category->validate(['name']));

        $category->name = "Mobile";
        $this->assertTrue($category->validate(['name']));
    }
}