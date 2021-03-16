<?php

namespace app\controllers;

use app\models\Car;
use yii\data\ActiveDataProvider;
use yii\rest\Controller;

class ApiController extends Controller
{
    public function behaviors()
    {
        return [
            'corsFilter' => [
                'class' => \yii\filters\Cors::class,
                'cors' => [
                    'Origin' => ['*']
                ]
            ],
        ] + parent::behaviors();
    }

    public function actionCars()
    {
        return new ActiveDataProvider([
            'query' => Car::find()->orderBy('name')
        ]);
    }


}
