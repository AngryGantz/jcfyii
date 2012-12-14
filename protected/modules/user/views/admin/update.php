<?php
$this->breadcrumbs = array(
    (UserModule::t('Users')) => array('admin'),
    $model->username => array('view', 'id' => $model->id),
    (UserModule::t('Правка')),
);
?>
<h1><?php echo UserModule::t('Update User') . " " . $model->username; ?></h1>
<div class="subnav">
    <div class="navbar navbar-inner">    
        <ul class="nav nav-pills">
            <li><?php echo CHtml::link(UserModule::t('Create User'), array('create')); ?></li>
            <li><?php echo CHtml::link(UserModule::t('View User'), array('view', 'id' => $model->id)); ?></li>
            <li><?php echo CHtml::link(UserModule::t('List User'), array('/user')); ?></li>
            <li><?php echo CHtml::link(UserModule::t('Manage Users'), array('/user/admin')); ?></li>
            <li><?php echo CHtml::link(UserModule::t('Manage Profile Field'), array('profileField/admin')); ?></li>
        </ul>
    </div>
</div>
<?php echo $this->renderPartial('_form', array('model' => $model, 'profile' => $profile)); ?>