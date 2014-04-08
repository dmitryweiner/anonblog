<?php
/* @var $this LikeController */
/* @var $model Like */

$this->breadcrumbs=array(
	'Likes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Like', 'url'=>array('index')),
	array('label'=>'Manage Like', 'url'=>array('admin')),
);
?>

<h1>Create Like</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>