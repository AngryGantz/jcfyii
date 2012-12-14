<?php
$this->breadcrumbs = array(
    $model->CategoryMain->category_name => array('/catalog/JCategory/view/id/'.$model->CategoryMain->category_id),
    $model->product_name,
);
$labelM1='Список '.JProduct::model()->RusEnding(5);
$labelM2='Новый '.JProduct::model()->RusEnding(1);
$labelM3='Просмотр '.JProduct::model()->RusEnding(1);
$labelM4='Управление '.JProduct::model()->RusEnding(7);
?>
<div class="subnav">
    <div class="navbar navbar-inner">    
        <ul class="nav nav-pills">
            <li><?php  echo CHtml::link($labelM2, array('create')); ?></li>
            <li><?php  echo CHtml::link($labelM3, array('view','id'=>$model->product_id)); ?></li>
            <li><?php  echo CHtml::link($labelM4 , array('admin')); ?></li>
        </ul>
    </div>
</div>
</br></br>
<h1>Правка:  <?php echo JProduct::model()->RusEnding(1) ?> <?php echo $model->product_id; ?></h1>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>