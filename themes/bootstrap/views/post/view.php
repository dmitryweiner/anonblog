<div class="post">
    <div class="title">
        <h2>
            <?php echo $post['title']; ?>
        </h2>
    </div>
    <div class="date">
        <?php echo $post['creation_date']; ?>
    </div>
    <div class="text">
        <?php echo $post['message']; ?>
    </div>
</div>

<div class="comments">
    <h4><?php echo Yii::t("app", "Comments"); ?></h4>
    <?php foreach($post->comments as $comment) { ?>
        <div class="comment">
            <div class="date">
                <?php echo $comment->user->login; ?> at
                <?php echo $comment->creation_date; ?>
            </div>
            <div class="message">
                <?php echo $comment->message; ?>
            </div>
        </div>
    <?php } ?>
</div>


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
