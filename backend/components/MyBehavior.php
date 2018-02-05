<?php
/**
 * Created by PhpStorm.
 * User: cherry
 * Date: 06/12/2017
 * Time: 3:31 PM
 */
namespace backend\components;

use Yii;

class MyBehavior extends \yii\base\ActionFilter
{
    /*public function beforeAction($action)
    {
        var_dump(111);
        return true;
    }*/

    public function isGuest ()
    {
        return Yii::$app->user->isGuest;
    }

}