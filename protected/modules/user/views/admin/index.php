<?php
$this->breadcrumbs = array(
    UserModule::t('Users') => array('admin'),
    UserModule::t('Manage'),
);
?>
<h1><?php echo UserModule::t("Manage Users"); ?></h1>

<div class="subnav">
    <div class="navbar navbar-inner">    
        <ul class="nav nav-pills">
            <li><?php echo CHtml::link(UserModule::t('Create User'), array('create')); ?></li>
            <li><?php echo CHtml::link(UserModule::t('List User'), array('/user')); ?></li>
            <li><?php echo CHtml::link(UserModule::t('Manage Profile Field'), array('profileField/admin')); ?></li>
        </ul>
    </div>
</div>
<?php
Yii::app()->clientScript->registerScript('search', " 
$('.search-button').click(function(){ 
    $('.search-form').toggle(); 
    return false; 
}); 
$('.search-form form').submit(function(){ 
    $.fn.yiiGridView.update('user-grid', { 
        data: $(this).serialize() 
    }); 
    return false; 
}); 
");
?>

</br>
<p> 
    Вы можете использовать операторы сравнения (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b> 
    или <b>=</b>) в начале каждого из полей поиска, чтобы указать, какое сравнение должно быть сделано.
</p> 

<?php echo CHtml::link('Расширенный поиск', '#', array('class' => 'search-button btn')); ?> 
<div class="search-form" style="display:none"> 
    <?php
    $this->renderPartial('_search', array(
        'model' => $model,
    ));
    ?>
</div><!-- search-form --> 

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'user-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        //       'id',
        'username',
//        'password',
        'email',
//        'activkey', 
        array(
            'name' => 'createtime', 'value' => 'date("d.m.Y H:i:s",$data->createtime)',
        ),
        array(
            'name' => 'lastvisit',
            'value' => '(($data->lastvisit)?date("d.m.Y H:i:s",$data->lastvisit):UserModule::t("Not visited"))',
        ),
        //       'superuser',
        array(
            'name' => 'status',
            'value' => 'User::itemAlias("UserStatus", $data->status)',
        ),
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
        ),
    ),
));
?> 


