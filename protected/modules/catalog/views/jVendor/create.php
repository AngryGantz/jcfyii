<?php
$this->breadcrumbs=array(
	JVendor::model()->RusEnding(8)=>array('admin'),
	'Новый',
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
<h1>Новый <?php echo JVendor::model()->RusEnding(1) ?></h1>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>