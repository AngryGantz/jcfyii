<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('category_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->category_id),array('view','id'=>$data->category_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('category_name')); ?>:</b>
	<?php echo CHtml::encode($data->category_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('category_review')); ?>:</b>
	<?php echo CHtml::encode($data->category_review); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('category_pic1')); ?>:</b>
	<?php echo CHtml::encode($data->category_pic1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('category_photodir')); ?>:</b>
	<?php echo CHtml::encode($data->category_photodir); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('category_parent')); ?>:</b>
	<?php echo CHtml::encode($data->category_parent); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('category_lft')); ?>:</b>
	<?php echo CHtml::encode($data->category_lft); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('category_rgt')); ?>:</b>
	<?php echo CHtml::encode($data->category_rgt); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('category_level')); ?>:</b>
	<?php echo CHtml::encode($data->category_level); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('catalog_category_pic2')); ?>:</b>
	<?php echo CHtml::encode($data->catalog_category_pic2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('catalog_category_pic3')); ?>:</b>
	<?php echo CHtml::encode($data->catalog_category_pic3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('catalog_category_pic4')); ?>:</b>
	<?php echo CHtml::encode($data->catalog_category_pic4); ?>
	<br />

	*/ ?>

</div>