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
        if (!Yii::app()->request->isAjaxRequest) {
            throw new CHttpException('403', 'Forbidden access.');
        }

        if(isset($_POST['id'])) {
            $post=Post::model()->findByPk((int)$_POST['id']);

            $model=new Like();
            if(isset($_POST['reaction']) && $post)
            {
                $data = array();

                if ($_POST['reaction'] == 'like') {
                    $model->reaction  = 1;
                }
                if ($_POST['reaction'] == 'dislike') {
                    $model->reaction  = -1;
                }
                $model->post_id = $post->id;
                $model->user_id = Yii::app()->user->getId();
                $cookieName = 'already_liked_'.$post->id;
                if (!isset(Yii::app()->request->cookies[$cookieName])) {
                    $model->save(false);
                    Yii::app()->request->cookies[$cookieName] = new CHttpCookie($cookieName, 1);
                } else {
                    $data['error'][] = 'Already liked';
                }
                $data['result'] = $post->getLikesRate();
                echo CJavaScript::jsonEncode($data);
            }
        }
        Yii::app()->end();
    }

}