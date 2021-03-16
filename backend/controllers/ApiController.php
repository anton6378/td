<?php

namespace app\controllers;

use app\models\Application;
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
                    'Origin' => ['*'],
                    'Access-Control-Request-Method'    => ['POST', 'GET', 'OPTIONS'],
                    'Access-Control-Allow-Headers' => ['X-Requested-With','content-type']
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

    public function actionApply()
    {
        $model = new Application();
        $data = \Yii::$app->request->post();

        if ($model->load($data, '') && $model->save()) {
            return ['status' => 'ok'];
        }

        return ['status' => 'error'];
    }


}
