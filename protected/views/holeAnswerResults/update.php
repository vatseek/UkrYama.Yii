<?php
$this->breadcrumbs=array(
	'Результаты запроса в ГАИ'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Изменить',
);

$this->menu=array(
	array('label'=>'Результаты запроса в ГАИ', 'url'=>array('index')),
	array('label'=>'Создать новый', 'url'=>array('create')),
);
?>

<h1>Редактировать Результат запроса в ГАИ "<?php echo $model->name; ?>"</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>