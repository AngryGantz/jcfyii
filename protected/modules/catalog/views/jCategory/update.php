<?php
$this->breadcrumbs=array(
    'Управление категориями'=>array('/catalog/jCategory/admin'),
    'Правка',
);
$labelM1='Список '.JCategory::model()->RusEnding(5);
$labelM2='Новая '.JCategory::model()->RusEnding(1);
$labelM3='Просмотр категории';
$labelM4='Управление '.JCategory::model()->RusEnding(7);
?>
<div class="subnav">
    <div class="navbar navbar-inner">    
        <ul class="nav nav-pills">
            <li><?php  echo CHtml::link($labelM2, array('create')); ?></li>
            <li><?php  echo CHtml::link($labelM3, array('view','id'=>$model->category_id)); ?></li>
            <li><?php  echo CHtml::link($labelM4 , array('admin')); ?></li>
        </ul>
    </div>
</div>
</br></br>
<h3>Редактирование категории </h3><h2><?php echo $model->category_name; ?></h2>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>