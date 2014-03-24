<?php

class LikeController extends Controller
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


    public function actionReact()
    {
        //here should be cheating protection

        $model=new Like();
        if(isset($_GET['reaction']) && isset($_GET['post_id']))
        {
            if ($_GET['reaction'] == 'like') {
                $model->reaction  = 1;
            }
            if ($_GET['reaction'] == 'dislike') {
                $model->reaction  = -1;
            }
            $model->post_id = (int) $_GET['post_id'];
            $cookieName = 'already_liked_'.(int)$_GET['post_id'];
            if (!isset(Yii::app()->request->cookies[$cookieName])) {
                $model->save();
                Yii::app()->request->cookies[$cookieName] = new CHttpCookie($cookieName, 1);
            }
        }
        $this->redirect(array('site/index'));
    }

}