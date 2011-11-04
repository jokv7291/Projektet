<?php
$this->breadcrumbs=array(
	'Usertypes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Usertypes', 'url'=>array('index')),
	array('label'=>'Manage Usertypes', 'url'=>array('admin')),
);
?>

<h1>Create Usertypes</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>