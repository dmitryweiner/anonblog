<?php

class CommentController extends Controller
{
    public function filters()
    {
        return array(
            'accessControl',
        );
    }

    public function accessRules()
    {
        return array(
            array('allow',
                'actions'=>array('create'),
                'users'=>array('@'),
            ),
            array('deny',
                'users'=>array('*'),
            ),
        );
    }

	public function actionCreate()
	{
        $comment=new Comment();
        if(isset($_POST['Comment']))
        {
            $comment->attributes=$_POST['Comment'];
            $comment->user_id = Yii::app()->user->getId();
            $comment->post_id = (int)$_POST['post_id'];


            if($comment->save(false)) {
                return $this->redirect(array('post/view', 'id'=>$comment->post_id));
            }
        }
        throw new CHttpException(404,'The requested page does not exist.');
	}


}