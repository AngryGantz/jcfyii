<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'vendor_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'vendor_name',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textAreaRow($model,'vendor_review',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'vendor_logo',array('class'=>'span5','maxlength'=>20)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
		    'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Искать',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
