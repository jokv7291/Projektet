<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'usertypeid'); ?>
		<?php echo $form->textField($model,'usertypeid'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'usertype'); ?>
		<?php echo $form->textField($model,'usertype',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->