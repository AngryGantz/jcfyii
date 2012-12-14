<?php
$this->breadcrumbs=array(
	JCategory::model()->RusEnding(8),
);
?>
<h1>Каталог продукции</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
