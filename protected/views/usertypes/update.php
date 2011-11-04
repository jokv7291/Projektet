<?php
$this->breadcrumbs=array(
	'Usertypes'=>array('index'),
	$model->usertypeid=>array('view','id'=>$model->usertypeid),
	'Update',
);

$this->menu=array(
	array('label'=>'List Usertypes', 'url'=>array('index')),
	array('label'=>'Create Usertypes', 'url'=>array('create')),
	array('label'=>'View Usertypes', 'url'=>array('view', 'id'=>$model->usertypeid)),
	array('label'=>'Manage Usertypes', 'url'=>array('admin')),
);
?>

<h1>Update Usertypes <?php echo $model->usertypeid; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>