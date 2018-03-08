<?php
namespace frontend\tests;

use Yii;
use frontend\models\Company;

class CompanyTest extends \Codeception\Test\Unit
{
    /**
     * @var \frontend\tests\UnitTester
     */
    protected $tester;
    
    protected function _before()
    {
        $company = new Company();
    }

    protected function _after()
    {
        $company = null;
    }

    // tests
    /*
     * Test company validation
     */
    public function testValidation()
    {
        $company = new Company();

        //Test null input
        $company->company_name = null;
        $company->company_email = null;
        $company->company_website = null;
        $company->company_description = null;
        $company->company_industry = null;
        $company->company_designation = null;
        $company->company_reg_no = null;
        $company->company_employees_count = null;
        $company->company_postal = null;
        $this->assertFalse($company->validate(['company_name']));
        $this->assertFalse($company->validate(['company_email']));
        $this->assertFalse($company->validate(['company_website']));
        $this->assertFalse($company->validate(['company_description']));
        $this->assertFalse($company->validate(['company_industry']));
        $this->assertFalse($company->validate(['company_designation']));
        $this->assertFalse($company->validate(['company_reg_no']));
        $this->assertFalse($company->validate(['company_employees_count']));
        $this->assertFalse($company->validate(['company_postal']));

        //Test invalid input
        $company->company_email = '199191';
        $this->assertFalse($company->validate(['company_email']));
        $company->company_email = 'adshja@';
        $this->assertFalse($company->validate(['company_email']));
        $company->company_email = 'dasj221.com';
        $this->assertFalse($company->validate(['company_email']));

        //Test valid input
        $company->company_name = "name";
        $company->company_email = "email@gmail.com";
        $company->company_website = "webpuppies.com.sg";
        $company->company_description = 'company description';
        $company->company_industry = 'comics';
        $company->company_designation = 'design';
        $company->company_reg_no = 'dshjks3128391';
        $company->company_postal = 123344;
        $company->company_employees_count = 10;
        $this->assertTrue($company->company_name == 'name');
        $this->assertTrue($company->company_email == 'email@gmail.com');
        $this->assertTrue($company->company_website == 'webpuppies.com.sg');
        $this->assertTrue($company->company_description == 'company description');
        $this->assertTrue($company->company_industry == 'comics');
        $this->assertTrue($company->company_designation == 'design');
        $this->assertTrue($company->company_reg_no == 'dshjks3128391');
        $this->assertTrue($company->company_employees_count == 10);
        $this->assertTrue($company->company_postal == 123344);
    }

    /*
     * Test save company
     */
    public function testSaveCompany()
    {
        $company = new Company();

        Yii::$app->db->createCommand('set foreign_key_checks=0')->execute();
        $company->setAttributes(['campaign_id' => 1,'company_name' => 'name','company_email' => 'email@gamil.com','company_website' => 'webpuppies.com.sg','company_description' => 'company description','company_industry' => 'comics','company_employees_count' => 10,'company_designation' => 'design','company_reg_no' => 'dshjks3128391','company_postal' => 122333]);
        $company->save(false);
        $this->tester->canSeeRecord('frontend\models\Company',array('campaign_id' => 1,'company_name' => 'name','company_email' => 'email@gamil.com','company_website' => 'webpuppies.com.sg','company_description' => 'company description','company_industry' => 'comics','company_employees_count' => 10,'company_designation' => 'design','company_reg_no' => 'dshjks3128391','company_postal' => 122333));
        Yii::$app->db->createCommand('set foreign_key_checks=1')->execute();
    }

    /*
     * Test delete company
     */
    public function testDeleteCompany()
    {
        $company = new Company();

        Yii::$app->db->createCommand('set foreign_key_checks=0')->execute();
        $company->setAttributes(['campaign_id' => 1,'company_name' => 'name','company_email' => 'email@gamil.com','company_website' => 'webpuppies.com.sg','company_description' => 'company description','company_industry' => 'comics','company_employees_count' => 10,'company_designation' => 'design','company_reg_no' => 'dshjks3128391','company_postal' => 122333]);
        $company->save();
        $company->delete();
        $this->assertFalse($company == null);
        Yii::$app->db->createCommand('set foreign_key_checks=1')->execute();
    }
}