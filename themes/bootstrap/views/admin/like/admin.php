<?php
/* @var $this LikeController */
/* @var $model Like */

$this->breadcrumbs=array(
	'Likes'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Like', 'url'=>array('index')),
	array('label'=>'Create Like', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#like-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Likes</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'like-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
        array(
            'class'=>'CDataColumn',
            'name'=>'post',
            'value'=>'$data->post->title',
            'header'=>Yii::t("app",'Post title'),
            //'filter'=>true,
        ),
        'reaction',
        array(
            'class'=>'CDataColumn',
            'name'=>'user',
            'value'=>'$data->user->login',
            'header'=>Yii::t("app",'User login'),
            //'filter'=>true,
        ),
		'creation_date',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
