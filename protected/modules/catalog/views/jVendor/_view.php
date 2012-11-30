<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('vendor_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->vendor_id),array('view','id'=>$data->vendor_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vendor_name')); ?>:</b>
	<?php echo CHtml::encode($data->vendor_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vendor_review')); ?>:</b>
	<?php echo CHtml::encode($data->vendor_review); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vendor_logo')); ?>:</b>
	<?php echo CHtml::encode($data->vendor_logo); ?>
	<br />


</div>