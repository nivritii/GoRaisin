<?php
/**
 * Created by PhpStorm.
 * User: cherry
 * Date: 06/12/2017
 * Time: 2:38 PM
 */

/*namespace backend\controllers;

use Yii;
use yii\web\Controller;

class RbacController extends Controller
{
    public function actionInit ()
    {*/
        //call component
        /*$auth = Yii::$app->authManager;

        //add "/Campaign/index" authority
        $blogIndex = $auth->createPermission('/Campaign/index');
        $blogIndex->description = 'List of Blogs';
        $auth->add($blogIndex);*/


        //create a role named 'BlogManage' and authorize '/Campaign/index'
        /*$blogManage = $auth->createRole('BlogManage');
        $auth->add($blogManage);
        $auth->addChild($blogManage,$blogIndex);*/

        //authorize user 'id = 18'
        /*$auth->assign($blogManage,18);
    }

    public function actionInit2 ()
    {
        $auth = Yii::$app->authManager;*/
        //add other authorities
       /* $blogView = $auth->createPermission('/Campaign/view');
        $auth->add($blogView);
        $blogCreate = $auth->createPermission('/Campaign/create');
        $auth->add($blogCreate);
        $blogUpdate = $auth->createPermission('/Campaign/update');
        $auth->add($blogUpdate);
        $blogDelete = $auth->createPermission('/Campaign/delete');
        $auth->add($blogDelete);

        $blogManage = $auth->getRole('BlogManage');
        $auth->addChild($blogManage,$blogView);
        $auth->addChild($blogManage,$blogCreate);
        $auth->addChild($blogManage,$blogUpdate);
        $auth->addChild($blogManage,$blogDelete);
        $auth->assign($blogManage,18);
    }
}*/