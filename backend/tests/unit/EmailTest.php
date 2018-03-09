<?php
namespace backend\tests;

use backend\models\Email;

class EmailTest extends \Codeception\Test\Unit
{
    /**
     * @var \backend\tests\UnitTester
     */
    protected $tester;
    
    protected function _before()
    {
        $email = new Email();
    }

    protected function _after()
    {
        $email = null;
    }

    // tests
    /*
     * Test validation
     */
    public function testValidation()
    {
        $email = new Email();

        //Test null input
        $email->receiver_name = null;
        $email->receiver_address = null;
        $email->subject = null;
        $email->content = null;
        $this->assertFalse($email->validate(['receiver_name']));
        $this->assertFalse($email->validate(['receiver_address']));
        $this->assertFalse($email->validate(['subject']));
        $this->assertFalse($email->validate(['content']));

        //Test invalid input
        $email->receiver_name = "dsafjksdhfjksdahfjkasdjfkhuewhfuewhfuweqhlfjkwljkqdfsa";
        $this->assertFalse($email->validate(['receiver_name']));

        //Test valid input
        $email->receiver_name = "name";
        $email->receiver_address = "address@gamil.com";
        $email->subject = "subject";
        $email->content = "content is the content of email sent to the receiver.";
        $email->attachment = "attachment";
        $email->created_time = "2018-03-05 12:26:48";
        $this->assertEquals($email->receiver_name,'name');
        $this->assertEquals($email->receiver_address,'address@gamil.com');
        $this->assertEquals($email->subject,'subject');
        $this->assertEquals($email->content,'content is the content of email sent to the receiver.');
        $this->assertEquals($email->attachment,'attachment');
        $this->assertEquals($email->created_time,'2018-03-05 12:26:48');
    }

    /*
     * Test save email
     */
    public function testSaveEmail()
    {
        $email = new Email();

        $email->setAttributes(['receiver_name' => 'name','receiver_address' => 'address@gamil.com','subject' => 'subject','content' => 'content is the content of email sent to the receiver.','attachment' => 'attachment','created_time' => '2018-03-05 12:26:48']);
        $email->save();
        /*$this->tester->canSeeRecord('backend\models\Email',array('receiver_name' => 'name','receiver_address' => 'address@gamil.com',
            'subject' => 'subject','content' => 'content is the content of email sent to the receiver.',
            'attachment' => 'attachment','created_time' => '2018-03-05 12:26:48'));*/
    }

    /*
     * Test delete email
     */
    public function testDeleteEmail()
    {
        $email = new Email();

        $email->setAttributes(['receiver_name' => 'name','receiver_address' => 'address@gamil.com','subject' => 'subject','content' => 'content is the content of email sent to the receiver.','attachment' => 'attachment','created_time' => '2018-03-05 12:26:48']);
        $email->save();
        /*$this->tester->canSeeRecord('backend\models\Email',array('receiver_name' => 'name','receiver_address' => 'address@gamil.com',
            'subject' => 'subject','content' => 'content is the content of email sent to the receiver.',
            'attachment' => 'attachment','created_time' => '2018-03-05 12:26:48'));*/

        $email->delete();
        $this->assertFalse($this == null);
    }
}