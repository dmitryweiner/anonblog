<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'user-registration-form',
    'type'=>'horizontal',
    'enableClientValidation'=>true,
    'clientOptions'=>array(
        'validateOnSubmit'=>true,
    ),
)); ?>

    <p class="note"><?php echo Yii::t("app", "Fields with") ?> <span class="required">*</span> <?php echo Yii::t("app", "are required") ?>.</p>

    <?php echo $form->textFieldRow($model,'login'); ?>

    <?php echo $form->textFieldRow($model,'name'); ?>

    <?php echo $form->passwordFieldRow($model,'password'); ?>

    <?php echo $form->passwordFieldRow($model,'password2'); ?>

    <div class="control-group ">
        <label class="control-label required" for="User_password2"></label>
        <div class="controls">
            <?php $this->widget('CCaptcha'); ?>
        </div>
    </div>
    <?php echo $form->textFieldRow($model,'verify_code'); ?>

    <div class="form-actions">
        <?php $this->widget('bootstrap.widgets.TbButton', array(
            'buttonType'=>'submit',
            'type'=>'primary',
            'label'=>Yii::t("app", "Register"),
        )); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->