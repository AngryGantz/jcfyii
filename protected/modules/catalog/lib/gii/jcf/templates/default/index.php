<?php
/**
 * The following variables are available in this template:
 * - $this: the BootCrudCode object
 */
?>
<?php
echo "<?php\n";
$label=$this->modelClass.'::model()->RusEnding(8)';
$label2='<?php echo '.$this->modelClass.'::model()->RusEnding(5) ?>';
echo "\$this->breadcrumbs=array(
	$label,
);\n";

?>
$labelM1='Новый '.<?php echo $this->modelClass ?>::model()->RusEnding(1);
$labelM2='Управление '.<?php echo $this->modelClass ?>::model()->RusEnding(7);
?>

<div class="subnav">
    <div class="navbar navbar-inner">    
        <ul class="nav nav-pills">
            <li><?php echo "<?php "; ?> echo CHtml::link($labelM1, array('create')); ?></li>
            <li><?php echo "<?php "; ?> echo CHtml::link($labelM2 , array('admin')); ?></li>
        </ul>
    </div>
</div>
</br></br>
<h1>Список <?php echo $label2; ?></h1>

<?php echo "<?php"; ?> $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
