<?php $this->breadcrumbs=array(
	'Subjects'=>array('subjects'),
	'Groups',
	'step3',
	'osv',
);

?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'subjects-subjects-form',
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'subject_name'); ?>
		<?php echo $form->textField($model,'subject_name', array('value'=>'')); ?>
		<?php echo $form->error($model,'subject_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'subject_short'); ?>
		<?php echo $form->textField($model,'subject_short', array('value'=>'')); ?>
		<?php echo $form->error($model,'subject_short'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<h1>Ämnen</h1>

<?php 

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		'subject_short',
		'subject_name',
		array(
			'class'=>'CButtonColumn',	
			),
	),
)); ?>