<?php
$this->breadcrumbs=array(
	'Usertypes'=>array('index'),
	$model->usertypeid,
);

$this->menu=array(
	array('label'=>'List Usertypes', 'url'=>array('index')),
	array('label'=>'Create Usertypes', 'url'=>array('create')),
	array('label'=>'Update Usertypes', 'url'=>array('update', 'id'=>$model->usertypeid)),
	array('label'=>'Delete Usertypes', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->usertypeid),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Usertypes', 'url'=>array('admin')),
);
?>

<h1>View Usertypes #<?php echo $model->usertypeid; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'usertypeid',
		'usertype',
	),
)); ?>
