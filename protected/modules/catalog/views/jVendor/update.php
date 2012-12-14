<?php
$this->breadcrumbs=array(
	JVendor::model()->RusEnding(8)=>array('admin'),
	$model->vendor_name=>array('view','id'=>$model->vendor_id),
	'Правка',
);
$labelM1='Список '.JVendor::model()->RusEnding(5);
$labelM2='Новый '.JVendor::model()->RusEnding(1);
$labelM3='Просмотр '.JVendor::model()->RusEnding(1);
$labelM4='Управление '.JVendor::model()->RusEnding(7);
?>
<div class="subnav">
    <div class="navbar navbar-inner">    
        <ul class="nav nav-pills">
            <li><?php  echo CHtml::link($labelM2, array('create')); ?></li>
            <li><?php  echo CHtml::link($labelM3, array('view','id'=>$model->vendor_id)); ?></li>
            <li><?php  echo CHtml::link($labelM4 , array('admin')); ?></li>
        </ul>
    </div>
</div>
</br></br>
<h1><?php echo $model->vendor_name; ?></h1>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>