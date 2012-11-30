<?php
/**
 * The following variables are available in this template:
 * - $this: the BootCrudCode object
 */
?>
<?php
echo "<?php\n";
$label=$this->modelClass.'::model()->RusEnding(8)';
echo "\$this->breadcrumbs=array(
	$label=>array('index'),
	'Управление',
);\n";
?> 
?>
<div class="subnav">
    <div class="navbar navbar-inner">    
        <ul class="nav nav-pills">
            <li><?php echo "<?php "; ?> echo CHtml::link('Список '.$model->RusEnding(5), array('index')); ?></li>
            <li><?php echo "<?php "; ?> echo CHtml::link('Новый '.$model->RusEnding(1), array('create')); ?></li>
        </ul>
    </div>
</div>
</br></br>
<?php echo "<?php\n"; ?>

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('<?php echo $this->class2id($this->modelClass); ?>-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Управление <?php echo "<?php\n"; ?>echo $model->RusEnding(7); ?></h1>

<p> 
    Вы можете использовать операторы сравнения (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b> 
    или <b>=</b>) в начале каждого из полей поиска, чтобы указать, какое сравнение должно быть сделано.
</p> 

<?php echo "<?php echo CHtml::link('Расширенный поиск','#',array('class'=>'search-button btn')); ?>"; ?>

<div class="search-form" style="display:none">
<?php echo "<?php \$this->renderPartial('_search',array(
	'model'=>\$model,
)); ?>\n"; ?>
</div><!-- search-form -->

<?php echo "<?php"; ?> $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'<?php echo $this->class2id($this->modelClass); ?>-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
<?php
$count=0;
foreach($this->tableSchema->columns as $column)
{
	if(++$count==7)
		echo "\t\t/*\n";
	echo "\t\t'".$column->name."',\n";
}
if($count>=7)
	echo "\t\t*/\n";
?>
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
