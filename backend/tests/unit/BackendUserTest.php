<?php
namespace backend\tests;

use backend\models\UserBackend;

class BackendUserTest extends \Codeception\Test\Unit
{
    /**
     * @var \backend\tests\UnitTester
     */
    protected $tester;
    
    protected function _before()
    {
        $bUser = new UserBackend();
    }

    protected function _after()
    {
        $bUser = null;
    }

    // tests
    /*
     * Test user_backend validation
     */
    public function testValidation()
    {
        $bUser = new UserBackend();

        //Test initialize user_backend object

    }
}