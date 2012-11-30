<?php
$this->pageTitle = Yii::app()->name . ' - ' . UserModule::t("Change Password");
$this->breadcrumbs = array(
    UserModule::t("Profile") => array('/user/profile'),
    UserModule::t("Change Password"),
);
?>

<h2><?php echo UserModule::t("Change password"); ?></h2>

<div class="subnav">
    <div class="navbar navbar-inner">    
        <ul class="nav nav-pills">
            <?php
            if (UserModule::isAdmin()) {
                ?>
                <li><?php echo CHtml::link(UserModule::t('Manage Users'), array('/user/admin')); ?></li>
                <?php } ?>
            <li><?php echo CHtml::link(UserModule::t('Profile'), array('/user/profile')); ?></li>
            <li><?php echo CHtml::link(UserModule::t('Edit'), array('edit')); ?></li>
            <li><?php echo CHtml::link(UserModule::t('Logout'), array('/user/logout')); ?></li>
        </ul>
    </div>
</div>
</br></br>

<div class="form">
    <?php
    $form = $this->beginWidget('UActiveForm', array(
                'id' => 'changepassword-form',
                'enableAjaxValidation' => true,
            ));
    ?>

    <p class="note"><?php echo UserModule::t('Fields with <span class="required">*</span> are required.'); ?></p>
        <?php echo CHtml::errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'password'); ?>
            <?php echo $form->passwordField($model, 'password'); ?>
            <?php echo $form->error($model, 'password'); ?>
        <p class="hint">
<?php echo UserModule::t("Minimal password length 4 symbols."); ?>
        </p>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'verifyPassword'); ?>
<?php echo $form->passwordField($model, 'verifyPassword'); ?>
<?php echo $form->error($model, 'verifyPassword'); ?>
    </div>


    <div class="row submit">
    <?php echo CHtml::submitButton(UserModule::t("Save"),array('class'=>'btn')); ?>
    </div>

<?php $this->endWidget(); ?>
</div><!-- form -->