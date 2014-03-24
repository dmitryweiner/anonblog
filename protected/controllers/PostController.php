<?php

class PostController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}


    public function actionCreate()
    {
        $model=new Post();
        if(isset($_POST['Post']))
        {
            $model->attributes=$_POST['Post'];
            if($model->save())
                $this->redirect(array('site/index'));
        }

        $this->render('create',array(
            'model'=>$model,
        ));
    }

    public function actionEdit()
    {
        if(isset($_GET['id'])) {
            $model=Post::model()->findByPk((int)$_GET['id']);
        }
        if (!isset($model)) {
            throw new CHttpException(404,'The requested page does not exist.');
        }

        if(isset($_POST['Post']))
        {
            $model->attributes=$_POST['Post'];
            if($model->save()) {
                $this->redirect(array('site/index'));
            }
        }

        $this->render('create',array(
            'model'=>$model,
        ));
    }

    public function actionDelete()
    {
        if(isset($_GET['id'])) {
            $model=Post::model()->findByPk((int)$_GET['id']);
        }
        if (isset($model)) {
            $model->delete();
        }

        $this->redirect(array('site/index'));
    }

    public function actionView()
    {
        if(isset($_GET['id']))
        {
            $post=Post::model()->findByPk((int)$_GET['id']);
        }
        if (!isset($post)) {
            throw new CHttpException(404,'The requested page does not exist.');
        }
        $this->render('view',array(
            'post'=>$post,
        ));
    }
}