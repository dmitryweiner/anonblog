<?php

class SiteController extends Controller
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

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
        $criteria=new CDbCriteria();
        $count=Post::model()->count($criteria);
        $pages=new CPagination($count);

        // results per page
        $pages->pageSize = Yii::app()->params->indexPageSize;
        $pages->applyLimit($criteria);
        $posts=Post::model()->with('comments', 'comments.user')->findAll($criteria);

        //$posts = Post::model()->with('comments', 'comments.user')->findAll();

		$this->render('index', array('posts' => $posts, 'pages' => $pages));
	}

    /**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

}