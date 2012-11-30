<?php
$this->breadcrumbs=array(
	UserModule::t('Users')=>array('admin'),
	UserModule::t('Create'),
);
?>
<h1><?php echo UserModule::t("Create User"); ?></h1>

<div class="subnav">
    <div class="navbar navbar-inner">    
        <ul class="nav nav-pills">
            <li><?php echo CHtml::link(UserModule::t('List User'), array('/user')); ?></li>
            <li><?php echo CHtml::link(UserModule::t('Manage Users'), array('/user/admin')); ?></li>
            <li><?php echo CHtml::link(UserModule::t('Manage Profile Field'), array('profileField/admin')); ?></li>
        </ul>
    </div>
</div>
</br></br></br>


<?php 
	echo $this->renderPartial('_form', array('model'=>$model,'profile'=>$profile));
?>