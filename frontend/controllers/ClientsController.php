<?php

namespace frontend\controllers;

use app\models\Clients;
use yii\filters\AccessControl;
use yii\filters\AccessRule;
use yii\web\Controller;

class ClientsController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    'allow' => true,
                    'roles' => ['@']
                ]
            ]
        ];
    }

    public function actionIndex() {
        $clients = Clients::find()->all();
        return $this->render("index", ["clients" => $clients]);
    }

    public function actionUpdate() {

    }

    public function actionDelete() {

    }

    public function actionCreate() {

    }
}
