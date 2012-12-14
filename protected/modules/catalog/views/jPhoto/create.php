<?php
$this->breadcrumbs=array(
	JPhoto::model()->RusEnding(8)=>array('index'),
	'Новый',
);
?>
<div class="subnav">
    <div class="navbar navbar-inner">    
        <ul class="nav nav-pills">
            <li><?php  echo CHtml::link('Список '.$model->RusEnding(5), array('index')); ?></li>
            <li><?php  echo CHtml::link('Управление '.$model->RusEnding(7), array('admin')); ?></li>
        </ul>
    </div>
</div>
</br></br>
<h1>Новый <?php echo JPhoto::model()->RusEnding(1) ?></h1>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>