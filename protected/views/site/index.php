<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>
<p><?php echo CHtml::link('Create new post', array('post/create')); ?></p>
<ul>
    <?php foreach($posts as $post) { ?>
    <li>
        <div>
            <b>
                <?php echo CHtml::link($post['title'], array('post/view', 'id'=>$post['id'])); ?>
            </b>
        </div>
        <div>
            <i><?php echo $post['creation_date']; ?></i>
        </div>
        <div>
            <?php echo $post['post_body']; ?>
        </div>
        <div>
            likes:
            <?php echo CHtml::link('&uarr;', array('like/react', 'reaction'=>'like', 'post_id'=>$post['id'])); ?>
            <?php echo $post->getLikesRate(); ?>
            <?php echo CHtml::link('&darr;', array('like/react', 'reaction'=>'dislike', 'post_id'=>$post['id'])); ?>
        </div>
        <div>
            <?php if (Yii::app()->user->getState('isAdmin', false)) { ?>
                <?php echo CHtml::link('edit', array('post/edit', 'id'=>$post['id'])); ?>
                <?php echo CHtml::link('delete', array('post/delete', 'id'=>$post['id'])); ?>
            <?php } ?>
        </div>
    </li>
    <?php } ?>
</ul>
