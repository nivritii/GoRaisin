<?php
/**
 * Created by PhpStorm.
 * User: cherry
 * Date: 12/12/2017
 * Time: 3:56 PM
 */

namespace backend\controllers;

use backend\components\event\MailEvent;
use Yii;
use yii\web\Controller;

/*
 * send mail
 */

class SendMailController extends Controller
{
    const SEND_MAIL = 'send_mail';

    public function init ()
    {
        parent::init();
        $this->on(self::SEND_MAIL, ['backend\components\Mail', 'sendMail']);
    }

    public function actionSend ()
    {
        //trigger the event
        $event = new MailEvent;
        $event->email = 'emailaddress';
        $event->subject = 'Test for sending mail';
        $event->content = 'Hello, form now, there will be two hours to leave the office!';
        $this->trigger(self::SEND_MAIL,$event);
    }
}