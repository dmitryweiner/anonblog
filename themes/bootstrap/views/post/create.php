<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
    ($model->isNewRecord ? 'Create' : 'Edit') . ' post',
);
?>

<h1><?php echo $model->isNewRecord ? 'Create' : 'Edit' ?> Post</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>