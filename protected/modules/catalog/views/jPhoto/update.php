<?php
$this->breadcrumbs=array(
	JPhoto::model()->RusEnding(8)=>array('index'),
	$model->photo_id=>array('view','id'=>$model->photo_id),
	'Правка',
);
$labelM1='Список '.JPhoto::model()->RusEnding(5);
$labelM2='Новый '.JPhoto::model()->RusEnding(1);
$labelM3='Просмотр '.JPhoto::model()->RusEnding(1);
$labelM4='Управление '.JPhoto::model()->RusEnding(7);
?>
<div class="subnav">
    <div class="navbar navbar-inner">    
        <ul class="nav nav-pills">
            <li><?php  echo CHtml::link($labelM1, array('index')); ?></li>
            <li><?php  echo CHtml::link($labelM2, array('create')); ?></li>
            <li><?php  echo CHtml::link($labelM3, array('view','id'=>$model->photo_id)); ?></li>
            <li><?php  echo CHtml::link($labelM4 , array('admin')); ?></li>
        </ul>
    </div>
</div>
</br></br>
<h1>Правка:  <?php echo JPhoto::model()->RusEnding(1) ?> <?php echo $model->photo_id; ?></h1>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>