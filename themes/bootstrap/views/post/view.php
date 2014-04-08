<?php
/* @var $this PostController */
/* @var $post Post */
/* @var $comment Comment */
?>
<div class="post">
    <div class="title">
        <h2>
            <?php echo $post['title']; ?>
        </h2>
    </div>
    <div class="date">
        <b>
            <?php echo CHtml::link($post->user->login, array('user/view', 'id'=>$post->user->id)); ?>
        </b>
        <?php echo Yii::t("app", "at"); ?>
        <?php echo $post['creation_date']; ?>
    </div>
    <div class="text">
        <?php echo nl2br($post['message']); ?>
    </div>
</div>

<div class="comments">
    <h4><?php echo Yii::t("app", "Comments"); ?></h4>
    <?php if (count($post->comments ) > 0) { ?>
        <?php foreach($post->comments as $oneComment) { ?>
            <div class="comment">
                <div class="date">
                    <b>
                        <?php echo CHtml::link($oneComment->user->login, array('user/view', 'id'=>$oneComment->user->id)); ?>
                    </b>
                    <?php echo Yii::t("app", "at"); ?>
                    <?php echo $oneComment->creation_date; ?>
                </div>
                <div class="message">
                    <?php echo nl2br($oneComment->message); ?>
                </div>
            </div>
        <?php } ?>
    <?php } else { ?>
        <?php echo Yii::t("app", "No comments yet, you will be first!"); ?>
    <?php } ?>
</div>

<?php if (!Yii::app()->user->isGuest) { ?>

<div class="form">
<h4><?php echo Yii::t("app", "Leave a comment"); ?></h4>
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'comment-form',
    'action'=>array('comment/create'),
    'type'=>'vertical',
    'enableClientValidation'=>true,
    'clientOptions'=>array(
        'validateOnSubmit'=>true,
    ),
)); ?>

<?php echo CHtml::hiddenField('post_id', $post->id); ?>

<?php echo $form->textAreaRow($comment,'message',array('class'=>'span8', 'rows'=>10, 'cols'=>70)); ?>

<div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType'=>'submit',
        'type'=>'primary',
        'label'=>Yii::t("app", "Save"),
    )); ?>
</div>

<?php $this->endWidget(); ?>

</div>

<?php } //if not guest ?>