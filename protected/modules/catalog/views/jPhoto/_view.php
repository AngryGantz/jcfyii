<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('photo_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->photo_id),array('view','id'=>$data->photo_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('photo_idproduct')); ?>:</b>
	<?php echo CHtml::encode($data->photo_idproduct); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('photo_name')); ?>:</b>
	<?php echo CHtml::encode($data->photo_name); ?>
	<br />


</div>