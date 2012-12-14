<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'product_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'product_name',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'product_model',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'product_dilprice',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'product_retprice',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'product_olddilprice',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'product_oldretprice',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'product_show',array('class'=>'span5')); ?>

	<?php echo $form->textAreaRow($model,'product_shortdesc',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaRow($model,'product_review',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaRow($model,'product_feature',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'product_main_photo',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'product_feature_photo',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'product_maincategory',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'product_vendor',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'product_kod1c',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'product_dimensions',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'product_qty',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
		    'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Искать',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
