<?php
$this->breadcrumbs=array(
	JPhoto::model()->RusEnding(8),
);
$labelM1='Новый '.JPhoto::model()->RusEnding(1);
$labelM2='Управление '.JPhoto::model()->RusEnding(7);
?>

<div class="subnav">
    <div class="navbar navbar-inner">    
        <ul class="nav nav-pills">
            <li><?php  echo CHtml::link($labelM1, array('create')); ?></li>
            <li><?php  echo CHtml::link($labelM2 , array('admin')); ?></li>
        </ul>
    </div>
</div>
</br></br>
<h1>Список <?php echo JPhoto::model()->RusEnding(5) ?></h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
