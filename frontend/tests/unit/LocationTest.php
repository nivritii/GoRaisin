<?php
namespace frontend\tests;

use frontend\models\Location;

class LocationTest extends \Codeception\Test\Unit
{
    /**
     * @var \frontend\tests\UnitTester
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
        $loc->country_code = "";
        $this->assertFalse($loc->validate(['country_code']));

        //Test valid input
        $loc->country = "Country";
        $loc->country_code = "CT";
        $this->assertEquals($loc->country_code,"CT");
        $this->assertEquals($loc->country,"Country");
    }

    /*
     * Test save location
     */
    public function testSaveLocation()
    {
        $loc = new Location();

        $loc->setAttributes(['country' => 'country','country_code' => 'CT']);
        $loc->save(false);
        $this->tester->canSeeRecord('frontend\models\Location',array('country' => 'country','country_code' => 'CT'));
    }
}