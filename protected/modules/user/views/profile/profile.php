<?php
$this->pageTitle = Yii::app()->name . ' - ' . UserModule::t("Profile");
$this->breadcrumbs = array(
    UserModule::t("Profile"),
);
?><h2><?php echo UserModule::t('Your profile'); ?></h2>

<div class="subnav">
    <div class="navbar navbar-inner">    
        <ul class="nav nav-pills">
            <?php
            if (UserModule::isAdmin()) {
                ?>
                <li><?php echo CHtml::link(UserModule::t('Manage Users'), array('/user/admin')); ?></li>
                <?php
            } else {
                ?>
                <li><?php echo CHtml::link(UserModule::t('List User'), array('/user')); ?></li>
                <?php
            }
            ?>
            <li><?php echo CHtml::link(UserModule::t('Edit'), array('edit')); ?></li>
            <li><?php echo CHtml::link(UserModule::t('Change password'), array('changepassword')); ?></li>
            <li><?php echo CHtml::link(UserModule::t('Logout'), array('/user/logout')); ?></li>
        </ul>
    </div>
</div>
</br></br>




<?php if (Yii::app()->user->hasFlash('profileMessage')): ?>
    <div class="success">
        <?php echo Yii::app()->user->getFlash('profileMessage'); ?>
    </div>
<?php endif; ?>
<table class="table table-striped">
    <tr>
        <th><?php echo CHtml::encode($model->getAttributeLabel('username')); ?>
        </th>
        <td><?php echo CHtml::encode($model->username); ?>
        </td>
    </tr>
    <?php
    $profileFields = ProfileField::model()->forOwner()->sort()->findAll();
    if ($profileFields) {
        foreach ($profileFields as $field) {
            //echo "<pre>"; print_r($profile); die();
            ?>
            <tr>
                <th><?php echo CHtml::encode(UserModule::t($field->title)); ?>
                </th>
                <td><?php echo (($field->widgetView($profile)) ? $field->widgetView($profile) : CHtml::encode((($field->range) ? Profile::range($field->range, $profile->getAttribute($field->varname)) : $profile->getAttribute($field->varname)))); ?>
                </td>
            </tr>
            <?php
        }//$profile->getAttribute($field->varname)
    }
    ?>
    <tr>
        <th><?php echo CHtml::encode($model->getAttributeLabel('email')); ?>
        </th>
        <td><?php echo CHtml::encode($model->email); ?>
        </td>
    </tr>
    <tr>
        <th><?php echo CHtml::encode($model->getAttributeLabel('createtime')); ?>
        </th>
        <td><?php echo date("d.m.Y H:i:s", $model->createtime); ?>
        </td>
    </tr>
    <tr>
        <th><?php echo CHtml::encode($model->getAttributeLabel('lastvisit')); ?>
        </th>
        <td><?php echo date("d.m.Y H:i:s", $model->lastvisit); ?>
        </td>
    </tr>
    <tr>
        <th><?php echo CHtml::encode($model->getAttributeLabel('status')); ?>
        </th>
        <td><?php echo CHtml::encode(User::itemAlias("UserStatus", $model->status)); ?>
        </td>
    </tr>
</table>
