<?php
$this->breadcrumbs=array(
	'Usertypes',
);

$this->menu=array(
	array('label'=>'Create Usertypes', 'url'=>array('create')),
	array('label'=>'Manage Usertypes', 'url'=>array('admin')),
);
?>

<h1>Usertypes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
