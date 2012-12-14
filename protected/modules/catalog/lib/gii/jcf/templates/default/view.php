<?php
/**
 * The following variables are available in this template:
 * - $this: the BootCrudCode object
 */
?>
<?php
echo "<?php\n";
$nameColumn=$this->guessNameColumn($this->tableSchema->columns);
$label=$this->modelClass.'::model()->RusEnding(8)';
$label2='<?php echo '.$this->modelClass.'::model()->RusEnding(1)'.' ?>';
echo "\$this->breadcrumbs=array(
	$label=>array('index'),
	\$model->{$nameColumn},
);\n";
?>

$labelM1='Список '.<?php echo $this->modelClass ?>::model()->RusEnding(5);
$labelM2='Новый '.<?php echo $this->modelClass ?>::model()->RusEnding(1);
$labelM3='Править '.<?php echo $this->modelClass ?>::model()->RusEnding(1);
$labelM5='Управление '.<?php echo $this->modelClass ?>::model()->RusEnding(7);
?>
<div class="subnav">
    <div class="navbar navbar-inner">    
        <ul class="nav nav-pills">
            <li><?php echo "<?php "; ?> echo CHtml::link($labelM1, array('index')); ?></li>
            <li><?php echo "<?php "; ?> echo CHtml::link($labelM2, array('create')); ?></li>
            <li><?php echo "<?php "; ?> echo CHtml::link($labelM3, array('update','id'=>$model-><?php echo $this->tableSchema->primaryKey; ?>)); ?></li>
            <li><?php echo "<?php "; ?> echo CHtml::linkButton('Удалить', array('submit' => array('delete', 'id' => $model-><?php echo $this->tableSchema->primaryKey; ?>), 'confirm' =>'Вы уверены, что хотите удалить этот элемент?')); ?></li>
            <li><?php echo "<?php "; ?> echo CHtml::link($labelM5 , array('admin')); ?></li>
        </ul>
    </div>
</div>
</br></br>
<?php echo "<?php "; ?>
$this->menu=array(
	array('label'=>'List <?php echo $this->modelClass; ?>','url'=>array('index')),
	array('label'=>'Create <?php echo $this->modelClass; ?>','url'=>array('create')),
	array('label'=>'Update <?php echo $this->modelClass; ?>','url'=>array('update','id'=>$model-><?php echo $this->tableSchema->primaryKey; ?>)),
        
	array('label'=>'Delete <?php echo $this->modelClass; ?>','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model-><?php echo $this->tableSchema->primaryKey; ?>),'confirm'=>'Вы уверены, что хотите удалить этот элемент?')),
	array('label'=>'Manage <?php echo $this->modelClass; ?>','url'=>array('admin')),
);
?>

<h1>Посмотреть  <?php echo $label2." <?php echo \$model->{$this->tableSchema->primaryKey}; ?>"; ?></h1>

<?php echo "<?php"; ?> $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
<?php
foreach($this->tableSchema->columns as $column)
	echo "\t\t'".$column->name."',\n";
?>
	),
)); ?>
