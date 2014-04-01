<?php

class CommentController extends Controller
{
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

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}