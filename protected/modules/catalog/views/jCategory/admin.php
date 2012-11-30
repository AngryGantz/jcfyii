<?php
$this->breadcrumbs=array(
	'Управление Категориями',
);
 
?>
<div class="subnav">
    <div class="navbar navbar-inner">    
        <ul class="nav nav-pills">
            <li><?php  echo CHtml::link('Новая '.$model->RusEnding(1), array('create')); ?></li>
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
	$.fn.yiiGridView.update('jcategory-grid', {
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
	'id'=>'jcategory-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'category_id',
		'category_name',
		'category_review',
		'category_pic1',
		'category_photodir',
		'category_parent',
		/*
		'category_lft',
		'category_rgt',
		'category_level',
		'catalog_category_pic2',
		'catalog_category_pic3',
		'catalog_category_pic4',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
