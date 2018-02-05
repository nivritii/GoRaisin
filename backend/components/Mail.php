<?php
/**
 * Created by PhpStorm.
 * User: cherry
 * Date: 12/12/2017
 * Time: 3:53 PM
 */

namespace backend\components;

use Yii;

class Mail
{
    public static function sendMail ($event)
    {
        $mail= Yii::$app->mailer->compose();
        $mail->setTo($event->email);
        $mail->setSubject($event->subject);
        $mail->setTextBody($event->content);

        return $mail->send();
    }
}