<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
//use yii\filters\VerbFilter;


class LoginController extends Controller
{
   
public function actionMobile()
{
    $model = new \yii\base\DynamicModel(['mobileno']);
    
    $model->addRule(['mobileno'], 'required');
 
    if($model->load(Yii::$app->request->post()))
    {
        // do somenthing with model
        $rand=rand(1000,9999);

    //$mod= new \yii\base\DynamicModel(['rand']);

    //return $this->render('otp', ['model'=>$mod]);
    echo $rand;
    }
    
    return $this->render('mobile', ['model'=>$model]);
}

}
