<?php
$this->breadcrumbs=array(
	UserModule::t('Profile Fields')=>array('admin'),
	$model->title=>array('view','id'=>$model->id),
	UserModule::t('Update'),
);
?>
<h1><?php echo UserModule::t('Update ProfileField ').$model->id; ?></h1>
<div class="subnav">
    <div class="navbar navbar-inner">    
        <ul class="nav nav-pills">
            <li><?php echo CHtml::link(UserModule::t('Manage Users'), array('/user/admin')); ?></li>
            <li><?php echo CHtml::link(UserModule::t('Manage Profile Field'), array('admin')); ?></li>
            <li><?php echo CHtml::link(UserModule::t('Create Profile Field'), array('create')); ?></li>
            <li><?php echo CHtml::link(UserModule::t('View Profile Field'),array('view','id'=>$model->id)); ?></li>
        </ul>
    </div>
</div>
</br></br>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>