<?php
/**
 * Created by PhpStorm.
 * User: cherry
 * Date: 07/12/2017
 * Time: 5:36 PM
 * just for dynamic switch the theme now the project may not need
 */


namespace backend\components;

use Yii;
use yii\base\Object;

class ThemeControl extends \yii\base\ActionFilter
{
    public function init ()
    {
        $switch = intval(Yii::$app->request->get('switch'));
        $theme = $switch ? 'spring' : 'christmas';

        Yii::$app->view->theme = Yii::createObject([
           'class' => 'yii\base\Theme',
           'pathMap' => [
               '@app/views' => [
                    "@app/themes/{$theme}",
               ]
           ],
        ]);
    }
}