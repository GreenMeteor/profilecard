<?php

namespace humhub\modules\profilecard\controllers;

use Yii;
use humhub\modules\admin\components\Controller;
use humhub\modules\profilecard\models\ConfigureForm;

class AdminController extends Controller
{

    public function actionIndex()
    {
        $model = new ConfigureForm();
        $model->loadSettings();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $this->view->saved();
        }

        return $this->render('index', ['model' => $model]);
    }

}