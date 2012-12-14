<?php
$this->breadcrumbs=array(
	JPhoto::model()->RusEnding(8)=>array('index'),
	$model->photo_id,
);

$labelM1='Список '.JPhoto::model()->RusEnding(5);
$labelM2='Новый '.JPhoto::model()->RusEnding(1);
$labelM3='Редактировать '.JPhoto::model()->RusEnding(1);
$labelM5='Управление '.JPhoto::model()->RusEnding(7);
?>
<div class="subnav">
    <div class="navbar navbar-inner">    
        <ul class="nav nav-pills">
            <li><?php  echo CHtml::link($labelM1, array('index')); ?></li>
            <li><?php  echo CHtml::link($labelM2, array('create')); ?></li>
            <li><?php  echo CHtml::link($labelM3, array('update','id'=>$model->photo_id)); ?></li>
            <li><?php  echo CHtml::linkButton('Удалить', array('submit' => array('delete', 'id' => $model->photo_id), 'confirm' =>'Вы уверены, что хотите удалить этот элемент?')); ?></li>
            <li><?php  echo CHtml::link($labelM5 , array('admin')); ?></li>
        </ul>
    </div>
</div>
</br></br>
<?php $this->menu=array(
	array('label'=>'List JPhoto','url'=>array('index')),
	array('label'=>'Create JPhoto','url'=>array('create')),
	array('label'=>'Update JPhoto','url'=>array('update','id'=>$model->photo_id)),
        
	array('label'=>'Delete JPhoto','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->photo_id),'confirm'=>'Вы уверены, что хотите удалить этот элемент?')),
	array('label'=>'Manage JPhoto','url'=>array('admin')),
);
?>

<h1>Просмотр  <?php echo JPhoto::model()->RusEnding(1) ?> <?php echo $model->photo_id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'photo_id',
		'photo_idproduct',
		'photo_name',
	),
)); ?>
