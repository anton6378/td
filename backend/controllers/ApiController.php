<?php

namespace app\controllers;

use app\models\Car;
use yii\data\ActiveDataProvider;
use yii\rest\Controller;

class ApiController extends Controller
{
    public function beforeAction($action)
    {
        return parent::beforeAction($action);
    }

    public function actionCars()
    {
        return new ActiveDataProvider([
            'query' => Car::find()->orderBy('name')
        ]);
    }


}
