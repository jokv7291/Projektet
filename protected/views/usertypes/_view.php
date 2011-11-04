<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('usertypeid')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->usertypeid), array('view', 'id'=>$data->usertypeid)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('usertype')); ?>:</b>
	<?php echo CHtml::encode($data->usertype); ?>
	<br />


</div>