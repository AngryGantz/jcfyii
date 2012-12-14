<?php
$this->breadcrumbs=array(
	'Управление Вендорами',
);
 
?>
<div class="subnav">
    <div class="navbar navbar-inner">    
        <ul class="nav nav-pills">
            <li><?php  echo CHtml::link('Новый '.$model->RusEnding(1), array('create')); ?></li>
        </ul>
    </div>
</div>
</br></br>
<?php

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('jvendor-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Управление <?php
echo $model->RusEnding(7); ?></h1>

<p> 
    Вы можете использовать операторы сравнения (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b> 
    или <b>=</b>) в начале каждого из полей поиска, чтобы указать, какое сравнение должно быть сделано.
</p> 

<?php echo CHtml::link('Расширенный поиск','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'jvendor-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'vendor_id',
		'vendor_name',
		'vendor_review',
		'vendor_logo',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
