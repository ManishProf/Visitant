<?php

namespace backend\controllers;

use Yii;
use backend\models\Employee;
use backend\models\EmployeeSearch;
use backend\models\EmpSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\SignupForm;


/**
 * EmployeeController implements the CRUD actions for Employee model.
 */
class EmployeeController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Employee models.
     * @return mixed
     */
    public function actionEmployee()
    {
        $searchModel = new EmployeeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('employee', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Employee model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Employee model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Employee();

        if ($model->load(Yii::$app->request->post()) && $model->save()) 
        {   
            Yii::$app->session->setFlash('successMessage','Employee Created Successfully'); 
            return $this->redirect(['view', 'id' => $model->empid]);
        } 
        else 
        {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Employee model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {

        $model = $this->findModel($id);
      
    
        if ($model->load(Yii::$app->request->post()) && $model->save(false)) 
        {
            Yii::$app->session->setFlash('successMessage','Employee Data Updated Successfully');
            return $this->redirect(['view', 'id' => $model->empid]);
        } 
        else 
        {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Employee model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $model->softdel = 1;
        $model->save(false);
        //$this->findModel($id)->delete();
        Yii::$app->session->setFlash('successMessage','Employee Deleted Successfully');
        return $this->redirect(['employee']);
    }



    
      public function actionEmployeereport($id)
    {   
        $model = $this->findModel($id);
        $empname=$model->empname;
       
        $searchModel = new EmpSearch();
        $dataProvider = $searchModel->search($id);
       
        return $this->render('employeereport', [
            //'searchModel' => $searchModel,
            'empname'=> $empname,
            'dataProvider' => $dataProvider,
           
        ]);
    }

     /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
            $model = new SignupForm();
            if ($model->load(Yii::$app->request->post())) {
                if ($user = $model->signup()) {
                    if (Yii::$app->getUser()->login($user)) {
                       
                       if(($model->sendEmail($model->email)== 1) || ($model->sendEmail($model->email)!= 1))
                       {
                       
                        Yii::$app->session->setFlash('successMessage','you have signed up Successfully');
                        return $this->goHome();
                        
                       }
                    }
                }
            }

            return $this->render('signup', [
                'model' => $model,
            ]);
    } 

    /**
     * Logout action.
     *
     * @return string
/*    public function actionLogout()
    {
            Yii::$app->user->logout();

            return $this->goHome();
    } */


    /**
     * Finds the Employee model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Employee the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
            if (($model = Employee::findOne($id)) !== null) 
            {
                return $model;
            } 
            else 
            {
                throw new NotFoundHttpException('The requested page does not exist.');
            }
    }
}
