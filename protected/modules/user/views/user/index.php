<?php
$this->breadcrumbs=array(
	UserModule::t("Users"),
);
?>

<h1><?php echo UserModule::t("List User"); ?></h1>


<?php if(UserModule::isAdmin()) { ?>
<div class="subnav">
    <div class="navbar navbar-inner">    
        <ul class="nav nav-pills">
            <li><?php echo CHtml::link(UserModule::t('Manage Users'), array('/user/admin')); ?></li>
            <li><?php echo CHtml::link(UserModule::t('Manage Profile Field'), array('profileField/admin')); ?></li>
        </ul>
    </div>
</div>
<?php } ?>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'dataProvider'=>$dataProvider,
	'columns'=>array(
		array(
			'name' => 'username',
			'type'=>'raw',
			'value' => 'CHtml::link(CHtml::encode($data->username),array("user/view","id"=>$data->id))',
		),
                    array(
			'name' => 'createtime',
			'value' => 'date("d.m.Y H:i:s",$data->createtime)',
		),
		array(
			'name' => 'lastvisit',
			'value' => '(($data->lastvisit)?date("d.m.Y H:i:s",$data->lastvisit):UserModule::t("Not visited"))',
		),
	),
)); ?>

