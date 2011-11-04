<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'usertypes-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'usertype'); ?>
		<?php echo $form->textField($model,'usertype',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'usertype'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->