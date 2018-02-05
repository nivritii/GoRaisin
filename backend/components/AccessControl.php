<?php
/**
 * Created by PhpStorm.
 * User: cherry
 * Date: 06/12/2017
 * Time: 4:10 PM
 */

namespace backend\components;

use Yii;
use yii\web\ForbiddenHttpException;

class AccessControl extends \yii\base\ActionFilter
{
    /**
     * authorize the request from user
     * @retun true means has right to access
     */

    public function beforeAction($action)
    {
        //current route
        $actionId = $action->getUniqueId();
        $actionId = '/'.$actionId;

        //current login user's id
        $user = Yii::$app->getUser();
        $userId = $user->id;

        //get route right allocated for the current user
        $route = [];
        $manager = Yii::$app->getAuthManager();
        foreach ($manager->getPermissionsByUser($userId) as $name => $value){
            if ($name[0] === '/'){
                $route[] = $name;
            }
        }

        //determine whether current user has right to access the request route
        if (in_array($actionId,$route)){
            return true;
        }
    }

    protected function denyAccess($user)
    {
        if ($user->getIsGuest()){
            $user->loginRequired();
        }else {
            throw new ForbiddenHttpException('No right to access');
        }
    }
}