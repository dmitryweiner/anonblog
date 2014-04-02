<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/styles.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>

	<?php Yii::app()->bootstrap->register(); ?>
</head>

<body>

<?php $this->widget('bootstrap.widgets.TbNavbar', array(
    'type'=>null, // null or 'inverse'
    'brand'=>Yii::app()->name,
    'brandUrl'=>'#',
    'items'=>array(
        array(
            'class'=>'bootstrap.widgets.TbMenu',
            'items'=>array(
                array('label'=>Yii::t("app", "Home"), 'url'=>array('/site/index')),
                array('label'=>Yii::t("app", "Create post"), 'url'=>array('/post/create')),
                array('label'=>Yii::t("app", "Manage"), 'url'=>'#', 'items'=>array(
                    array('label'=> Yii::t("app", "users"), 'url'=>array('/admin/user/admin'), 'visible'=>Yii::app()->user->getState('isAdmin', false)),
                    array('label'=> Yii::t("app", "posts"), 'url'=>array('/admin/post/admin'), 'visible'=>Yii::app()->user->getState('isAdmin', false)),
                    array('label'=> Yii::t("app", "comments"), 'url'=>array('/admin/comment/admin'), 'visible'=>Yii::app()->user->getState('isAdmin', false)),
                    array('label'=> Yii::t("app", "likes"), 'url'=>array('/admin/like/admin'), 'visible'=>Yii::app()->user->getState('isAdmin', false)),
                ), 'visible'=>Yii::app()->user->getState('isAdmin', false)),
            ),
        ),
        array(
            'class'=>'bootstrap.widgets.TbMenu',
            'htmlOptions'=>array('class'=>'pull-right'),
            'items'=>array(
                    array('label'=>Yii::t("app", "Login"), 'url'=>array('/user/login'), 'visible'=>Yii::app()->user->isGuest),
                    array('label'=> "(" .Yii::app()->user->getState('login', '') . ") " . Yii::t("app", "Logout"), 'url'=>array('/user/logout'), 'visible'=>!Yii::app()->user->isGuest),
                ),
            ),
    ),
)); ?>

<div class="container" id="page">

	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
