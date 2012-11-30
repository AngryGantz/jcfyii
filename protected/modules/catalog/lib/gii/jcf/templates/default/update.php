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
	\$model->{$nameColumn}=>array('view','id'=>\$model->{$this->tableSchema->primaryKey}),
	'Правка',
);\n";
?>
$labelM1='Список '.<?php echo $this->modelClass ?>::model()->RusEnding(5);
$labelM2='Новый '.<?php echo $this->modelClass ?>::model()->RusEnding(1);
$labelM3='Посмотреть '.<?php echo $this->modelClass ?>::model()->RusEnding(1);
$labelM4='Управление '.<?php echo $this->modelClass ?>::model()->RusEnding(7);
?>
<div class="subnav">
    <div class="navbar navbar-inner">    
        <ul class="nav nav-pills">
            <li><?php echo "<?php "; ?> echo CHtml::link($labelM1, array('index')); ?></li>
            <li><?php echo "<?php "; ?> echo CHtml::link($labelM2, array('create')); ?></li>
            <li><?php echo "<?php "; ?> echo CHtml::link($labelM3, array('view','id'=>$model-><?php echo $this->tableSchema->primaryKey; ?>)); ?></li>
            <li><?php echo "<?php "; ?> echo CHtml::link($labelM4 , array('admin')); ?></li>
        </ul>
    </div>
</div>
</br></br>
<h1>Правка:  <?php echo $label2." <?php echo \$model->{$this->tableSchema->primaryKey}; ?>"; ?></h1>
<?php echo "<?php echo \$this->renderPartial('_form',array('model'=>\$model)); ?>"; ?>