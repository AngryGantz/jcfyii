<?php
/**
 * The following variables are available in this template:
 * - $this: the BootCrudCode object
 */
?>
<?php
echo "<?php\n";
$label=$this->modelClass.'::model()->RusEnding(8)';
$label2='<?php echo '.$this->modelClass.'::model()->RusEnding(1) ?>';
echo "\$this->breadcrumbs=array(
	$label=>array('index'),
	'Новый',
);\n";
?>
?>
<div class="subnav">
    <div class="navbar navbar-inner">    
        <ul class="nav nav-pills">
            <li><?php echo "<?php "; ?> echo CHtml::link('Список '.$model->RusEnding(5), array('index')); ?></li>
            <li><?php echo "<?php "; ?> echo CHtml::link('Управление '.$model->RusEnding(7), array('admin')); ?></li>
        </ul>
    </div>
</div>
</br></br>
<h1>Новый <?php echo $label2; ?></h1>
<?php echo "<?php echo \$this->renderPartial('_form', array('model'=>\$model)); ?>"; ?>
