<?php
$this->breadcrumbs=array(
	JVendor::model()->RusEnding(8)=>array('admin'),
	$model->vendor_name,
);

$labelM1='Список '.JVendor::model()->RusEnding(5);
$labelM2='Новый '.JVendor::model()->RusEnding(1);
$labelM3='Редактировать '.JVendor::model()->RusEnding(2);
$labelM5='Управление '.JVendor::model()->RusEnding(7);
?>
<div class="subnav">
    <div class="navbar navbar-inner">    
        <ul class="nav nav-pills">
            <li><?php  echo CHtml::link($labelM2, array('create')); ?></li>
            <li><?php  echo CHtml::link($labelM3, array('update','id'=>$model->vendor_id)); ?></li>
            <li><?php  echo CHtml::linkButton('Удалить', array('submit' => array('delete', 'id' => $model->vendor_id), 'confirm' =>'Вы уверены, что хотите удалить этот элемент?')); ?></li>
            <li><?php  echo CHtml::link($labelM5 , array('admin')); ?></li>
        </ul>
    </div>
</div>
</br></br>
<?php $this->menu=array(
	array('label'=>'List JVendor','url'=>array('index')),
	array('label'=>'Create JVendor','url'=>array('create')),
	array('label'=>'Update JVendor','url'=>array('update','id'=>$model->vendor_id)),
        
	array('label'=>'Delete JVendor','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->vendor_id),'confirm'=>'Вы уверены, что хотите удалить этот элемент?')),
	array('label'=>'Manage JVendor','url'=>array('admin')),
);
?>

<h1> <?php echo $model->vendor_name; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'vendor_id',
		'vendor_name',
		'vendor_review',
		'vendor_logo',
	),
)); ?>
