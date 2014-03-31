<?php
/* @var $this LikeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Likes',
);

$this->menu=array(
	array('label'=>'Create Like', 'url'=>array('create')),
	array('label'=>'Manage Like', 'url'=>array('admin')),
);
?>

<h1>Likes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
