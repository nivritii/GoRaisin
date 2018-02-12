<?php
/**
 * Created by PhpStorm.
 * User: cherry
 * Date: 12/02/2018
 * Time: 2:11 PM
 */
namespace backend\controllers;

use yii\web\Controller;


/**
 * Site controller
 */
class ChartsController extends Controller
{
    /**
     * View charts action.
     *
     * @return string
     */
    public function actionCharts()
    {

        return $this->render('index');
    }

}