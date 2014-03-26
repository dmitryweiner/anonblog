<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>
<div class="postCollection">
    <?php foreach($posts as $post) { ?>
        <div class="post">
            <div class="title">
                <h4>
                    <?php echo CHtml::link($post['title'], array('post/view', 'id'=>$post['id'])); ?>
                </h4>
            </div>
            <div class="date">
                <?php echo $post['creation_date']; ?>
            </div>
            <div class="text">
                <?php echo $post['post_body']; ?>
            </div>
            <div class="rating">
                likes:
                <?php
                echo CHtml::ajaxLink(
                    $text = '-',
                    $url = Yii::app()->createUrl('like/react'),
                    $ajaxOptions=array (
                        'type' => 'POST',
                        'data' => array('id' => $post['id'], 'reaction' => 'dislike'),
                        'dataType' => 'json',
                        'success' => 'function(data){
                            $("#likes'.$post['id'].'").html(data.result);
                        }',
                    )
                );
                ?>
                <span id="likes<?php echo $post['id'] ?>"><?php echo $post->getLikesRate(); ?></span>
                <?php
                echo CHtml::ajaxLink(
                    $text = '+',
                    $url = Yii::app()->createUrl('like/react'),
                    $ajaxOptions=array (
                        'type' => 'POST',
                        'data' => array('id' => $post['id'], 'reaction' => 'like'),
                        'dataType' => 'json',
                        'success' => 'function(data){
                            $("#likes'.$post['id'].'").html(data.result);
                        }',
                    )
                );
                ?>
            </div>
            <div class="controls">
                <?php if (Yii::app()->user->getState('isAdmin', false)) { ?>
                    <?php echo CHtml::link('edit', array('post/edit', 'id'=>$post['id'])); ?>
                    <?php echo CHtml::link('delete', array('post/delete', 'id'=>$post['id'])); ?>
                <?php } ?>
            </div>
        </div>
    <?php } ?>
</div>
