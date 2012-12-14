<?php
$this->breadcrumbs = array(
    UserModule::t('Profile Fields') => array('admin'),
    UserModule::t($model->title),
);
?>
<h1><?php echo UserModule::t('View Profile Field #') . $model->varname; ?></h1>


<div class="subnav">
    <div class="navbar navbar-inner">    
        <ul class="nav nav-pills">
            <li><?php echo CHtml::link(UserModule::t('Manage Users'), array('/user/admin')); ?></li>
            <li><?php echo CHtml::link(UserModule::t('Manage Profile Field'), array('admin')); ?></li>
            <li><?php echo CHtml::link(UserModule::t('Create Profile Field'), array('create')); ?></li>
            <li><?php echo CHtml::link(UserModule::t('Update Profile Field'), array('update', 'id' => $model->id)); ?></li>
            <li><?php echo CHtml::linkButton(UserModule::t('Delete Profile Field'), array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure to delete this item?')); ?></li>
        </ul>
    </div>
</div>
</br></br>

<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        'varname',
        'title',
        'field_type',
        'field_size',
        'field_size_min',
        'required',
        'match',
        'range',
        'error_message',
        'other_validator',
        'widget',
        'widgetparams',
        'default',
        'position',
        'visible',
    ),
));
?>
