<?php
/* @var $this LikeController */
/* @var $model Like */

$this->breadcrumbs=array(
	'Likes'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Like', 'url'=>array('index')),
	array('label'=>'Create Like', 'url'=>array('create')),
	array('label'=>'View Like', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Like', 'url'=>array('admin')),
);
?>

<h1>Update Like <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>