<?php

class UserController extends Controller
{

    public function filters()
    {
        return array(
            'accessControl',
        );
    }

    public function actions()
    {
        return array(
            'captcha'=>array(
                'class'=>'CCaptchaAction',
                'backColor'=>0xFFFFFF,
            ),
        );
    }

    public function accessRules()
    {
        return array(
            array('allow',
                'actions'=>array('registration', 'login', 'captcha'),
                'users'=>array('?'),
            ),
            array('allow',
                'actions'=>array('logout', 'view'),
                'users'=>array('@'),
            ),
            array('deny',
                'users'=>array('*'),
            ),
        );
    }

    public function actionLogin()
    {
        $model=new LoginForm;

        // if it is ajax validation request
        if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if(isset($_POST['LoginForm']))
        {
            $model->attributes=$_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if($model->validate() && $model->login())
                $this->redirect(Yii::app()->user->returnUrl);
        }
        // display the login form
        $this->render('login',array('model'=>$model));
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout()
    {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

    public function actionRegistration()
	{
        $model=new User;

        // uncomment the following code to enable ajax-based validation
        /*
        if(isset($_POST['ajax']) && $_POST['ajax']==='user-registration-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
        */

        if(isset($_POST['User']))
        {
            $model->attributes=$_POST['User'];
            if($model->validate())
            {
                //echo 'valid'; die;
                $model->save(false);
                Yii::app()->user->setFlash('success', "User successfully created!");//todo: translate
                return $this->redirect(array('user/login'));

            } else {
                //echo 'not valid'; die;
            }

        }
        $this->render('registration',array('model'=>$model));
	}

    public function actionView()
    {
        if(!isset($_GET['id'])) {
            throw new CHttpException(404,'The requested page does not exist.');
        }

        $user = User::model()->findByPk((int)$_GET['id']);
        if (!isset($user)) {
            throw new CHttpException(404,'The requested page does not exist.');
        }

        $this->render('view',array('user'=>$user));
    }

}