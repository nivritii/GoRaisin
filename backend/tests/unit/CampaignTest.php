<?php
namespace backend\tests;

use backend\models\Campaign;

class CampaignTest extends \Codeception\Test\Unit
{
    /**
     * @var \backend\tests\UnitTester
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
        $camp->c_title = null;
    }
}