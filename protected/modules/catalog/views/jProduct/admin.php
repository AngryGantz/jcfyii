<?php
$this->breadcrumbs=array(
	'Управление продуктами',
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
	$.fn.yiiGridView.update('jproduct-grid', {
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
	'id'=>'jproduct-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'product_id',
		'product_name',
		'product_model',
		'product_dilprice',
		'product_retprice',
		'product_olddilprice',
		/*
		'product_oldretprice',
		'product_show',
		'product_shortdesc',
		'product_review',
		'product_feature',
		'product_main_photo',
		'product_feature_photo',
		'product_maincategory',
		'product_vendor',
		'product_kod1c',
		'product_dimensions',
		'product_qty',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
