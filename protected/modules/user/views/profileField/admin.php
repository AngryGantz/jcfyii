<?php
$this->breadcrumbs = array(
    UserModule::t('Profile Fields') => array('admin'),
    UserModule::t('Manage'),
);
?>
<h1><?php echo UserModule::t('Manage Profile Fields'); ?></h1>

<div class="subnav">
    <div class="navbar navbar-inner">    
        <ul class="nav nav-pills">
            <li><?php echo CHtml::link(UserModule::t('Manage Users'), array('/user/admin')); ?></li>
            <li><?php echo CHtml::link(UserModule::t('Manage Profile Field'), array('admin')); ?></li>
            <li><?php echo CHtml::link(UserModule::t('Create Profile Field'), array('create')); ?></li>
        </ul>
    </div>
</div>
</br></br>
<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'profile-field-grid',
    'dataProvider' => $dataProvider,
    'columns' => array(
        'id',
        'varname',
        'title',
        'field_type',
        'field_size',
        array(
            'name' => 'required',
            'value' => 'ProfileField::itemAlias("required",$data->required)',
        ),
        'field_size_min',
        'position',
        array(
            'name' => 'visible',
            'value' => 'ProfileField::itemAlias("visible",$data->visible)',
        ),
        /*
          'required',
          'match',
          'range',
          'error_message',
          'other_validator',
          'default',
          'widget',
          'widgetparams',
          'position',
          'visible',
         */
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
        ),
    ),
));
?> 



