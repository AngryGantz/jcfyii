<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'category_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'category_name',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textAreaRow($model,'category_review',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'category_pic1',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'category_photodir',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'category_parent',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'category_lft',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'category_rgt',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'category_level',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'category_pic2',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'category_pic3',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'category_pic4',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
		    'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Искать',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
