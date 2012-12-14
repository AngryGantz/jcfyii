<?php
$this->breadcrumbs=array(
	'Управление категориями'=>array('/catalog/jCategory/admin'),
	'Новая',
);
?>
<div class="subnav">
    <div class="navbar navbar-inner">    
        <ul class="nav nav-pills">
            <li><?php  echo CHtml::link('Управление '.$model->RusEnding(7), array('admin')); ?></li>
        </ul>
    </div>
</div>
</br></br>
<h1>Новая <?php echo JCategory::model()->RusEnding(1) ?></h1>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>