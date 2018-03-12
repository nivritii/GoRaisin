<?php
namespace backend\tests;

use backend\models\Location;

class LocationTest extends \Codeception\Test\Unit
{
    /**
     * @var \backend\tests\UnitTester
     */
    protected $tester;
    
    protected function _before()
    {
        $loc = new Location();
    }

    protected function _after()
    {
        $loc = null;
    }

    // tests
    /*
     * Test location validation
     */
    public function testValidation()
    {
        $loc = new Location();

        //Test null input
        $loc->country = null;
        $loc->country_code = null;
        $this->assertFalse($loc->validate(['country']));
        $this->assertFalse($loc->validate(['country_code']));

        //Test invalid input
        $loc->country = "countrynamecountrynamecountrynamecountrynamecountrynamecountrynamecountrynamecountrynamecountryname
        countrynamecountrynamecountrynamecountrynamecountrynamecountrynamecountrynamecountrynamecountrynamecountrynamecountryname
        countrynamecountryname";
        $this->assertFalse($loc->validate(['country']));
        $loc->country_code = "CODECODECODE";
        $this->assertFalse($loc->validate(['country_code']));

        //Test valid input
        $loc->country = "countryname";
        $loc->country_code = "CN";
        $this->assertEquals($loc->country,"countryname");
        $this->assertEquals($loc->country_code,"CN");
    }

    /*
     * Test save location
     */
    public function testSaveLocation()
    {
        $loc = new Location();

        $loc->setAttributes(["country" => 'country name',"country_code" => "CN"]);
        $loc->save();
        $this->tester->canSeeRecord('backend\models\Location',array("country" => 'country name',"country_code" => "CN"));
    }

    /*
     * Test delete location
     */
    public function testDeleteLocation()
    {
        $loc = new Location();

        $loc->setAttributes(["country" => 'country name',"country_code" => "CN"]);
        $loc->save();
        $this->tester->canSeeRecord('backend\models\Location',array("country" => 'country name',"country_code" => "CN"));
        $loc->delete();
        $this->assertFalse($loc == null);
    }
}