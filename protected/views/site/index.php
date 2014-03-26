<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>
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
            <?php
            echo CHtml::ajaxLink(
                $text = '&uarr;',
                $url = Yii::app()->createUrl('like/react'),
                $ajaxOptions=array (
                    'type' => 'POST',
                    'data' => array('id' => $post['id'], 'reaction' => 'like'),
                    'dataType' => 'json',
                    'update' => '#likes'.$post['id']
                )
            );
            ?>
            <span id="likes<?php echo $post['id'] ?>"><?php echo $post->getLikesRate(); ?></span>
            <?php
            echo CHtml::ajaxLink(
                $text = '&darr;',
                $url = Yii::app()->createUrl('like/react'),
                $ajaxOptions=array (
                    'type' => 'POST',
                    'data' => array('id' => $post['id'], 'reaction' => 'dislike'),
                    'dataType' => 'json',
                    'update' => '#likes'.$post['id']
                )
            );
            ?>
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
