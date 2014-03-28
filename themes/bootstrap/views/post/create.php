<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
    Yii::t("app", ($model->isNewRecord ? 'Create' : 'Edit') . ' post' ),
);
?>

<h1><?php echo Yii::t("app", ($model->isNewRecord ? 'Create' : 'Edit') . ' post' ) ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>