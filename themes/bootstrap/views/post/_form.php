<div class="form">
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'login-form',
    'type'=>'horizontal',
    'enableClientValidation'=>true,
    'clientOptions'=>array(
        'validateOnSubmit'=>true,
    ),
)); ?>


    <p class="note"><?php echo Yii::t("app", "Fields with") ?> <span class="required">*</span> <?php echo Yii::t("app", "are required") ?>.</p>
    <fieldset>
		<?php echo $form->textFieldRow($model,'title',array('class'=>'span8', 'size'=>80,'maxlength'=>128)); ?>

		<?php echo $form->textAreaRow($model,'post_body',array('class'=>'span8', 'rows'=>10, 'cols'=>70)); ?>

    </fieldset>
    <div class="form-actions">
        <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>Yii::t("app", ($model->isNewRecord ? 'Create' : 'Save')))); ?>
        <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>Yii::t("app", "Reset"))); ?>
    </div>
<?php $this->endWidget(); ?>

</div><!-- form -->