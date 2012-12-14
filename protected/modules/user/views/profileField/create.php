<?php
$this->breadcrumbs=array(
	UserModule::t('Profile Fields')=>array('admin'),
	UserModule::t('Create'),
);
?>
<h1><?php echo UserModule::t('Create Profile Field'); ?></h1>


<div class="subnav">
    <div class="navbar navbar-inner">    
        <ul class="nav nav-pills">
            <li><?php echo CHtml::link(UserModule::t('Manage Users'), array('/user/admin')); ?></li>
            <li><?php echo CHtml::link(UserModule::t('Manage Profile Field'), array('admin')); ?></li>
        </ul>
    </div>
</div>
</br></br>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>