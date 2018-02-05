<?php
/**
 * Created by PhpStorm.
 * User: cherry
 * Date: 12/12/2017
 * Time: 4:10 PM
 */

namespace backend\components\event;

use yii\base\Event;

class MailEvent extends Event
{
    public $email;
    public $subject;
    public $content;
}