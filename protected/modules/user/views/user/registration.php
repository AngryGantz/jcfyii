<?php
$this->pageTitle = Yii::app()->name . ' - ' . UserModule::t("Registration");
$this->breadcrumbs = array(
    UserModule::t("Registration"),
);
?>

<h1><?php echo UserModule::t("Registration"); ?></h1>


<?php $this->pageTitle = Yii::app()->name; ?>

<?php Yii::app()->user->setFlash('success', '<p><strong>Добро пожаловать на партнерскую часть сайта G-Cube Казахстан.</strong></p><p> 
        Этот ресурс создан для того, что-бы вам было удобнее ориентироваться в продукции G-Cube, иметь возможность 
        делать заказы на поставку, видя и дилерскую цену и сами продукты, ведь по скупым строкам прайс-листов подобную
        продукцию заказывать очень сложно, G-Cube надо видеть!</p><p>Кроме возможности удобного заказа, вы сможете разместить
        информацию о своей компании в разделе "Где купить", что будет способствовать продвижению вашего бизнеса.</p>'); ?>

<?php $this->widget('bootstrap.widgets.TbAlert'); ?>



<p>Для того, что-бы получить возможность использовать инструменты сайта, предназначенные для партнеров, мы просим 
    пройти несложную процедуру регистрации, заполнив анкету партнера. </p>

<p>После заполнения и отправки анкеты, с вами, при необходимости, свяжется менеджер для уточнения каких-либо деталей 
    и ваш аккаунт партнера будет активирован.</p>


<?php Yii::app()->user->setFlash('error', '<p><b>Регистрация необходима только для оптовых партнеров. Если вы хотите купить продукты G-Cube для себя, пожалуйста 
                обращайтесь к нашим партнерам (раздел сайта "Где купить")</b></p>'); ?>

<?php $this->widget('bootstrap.widgets.TbAlert'); ?>

</br></br>
    <?php if (Yii::app()->user->hasFlash('registration')): ?>
    <div class="success">
    <?php echo Yii::app()->user->getFlash('registration'); ?>
    </div>
<?php else: ?>

    <div class="form">
        <?php
        $form = $this->beginWidget('UActiveForm', array(
                    'id' => 'registration-form',
                    'enableAjaxValidation' => true,
                    'disableAjaxValidationAttributes' => array('RegistrationForm_verifyCode'),
                    'htmlOptions' => array('enctype' => 'multipart/form-data'),
                ));
        ?>

        <p class="note"><?php echo UserModule::t('Fields with <span class="required">*</span> are required.'); ?></p>

            <?php echo $form->errorSummary(array($model, $profile)); ?>

        <div class="row">
    <?php echo $form->labelEx($model, 'username'); ?>
    <?php echo $form->textField($model, 'username'); ?>
            <?php echo $form->error($model, 'username'); ?>
        </div>

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

        <div class="row">
    <?php echo $form->labelEx($model, 'email'); ?>
        <?php echo $form->textField($model, 'email'); ?>
        <?php echo $form->error($model, 'email'); ?>
        </div>

        <?php
        $profileFields = $profile->getFields();
        if ($profileFields) {
            foreach ($profileFields as $field) {
                ?>
                <div class="row">
                    <?php echo $form->labelEx($profile, $field->varname); ?>
                    <?php
                    if ($field->widgetEdit($profile)) {
                        echo $field->widgetEdit($profile);
                    } elseif ($field->range) {
                        echo $form->dropDownList($profile, $field->varname, Profile::range($field->range));
                    } elseif ($field->field_type == "TEXT") {
                        echo$form->textArea($profile, $field->varname, array('rows' => 6, 'cols' => 50));
                    } else {
                        echo $form->textField($profile, $field->varname, array('size' => 60, 'maxlength' => (($field->field_size) ? $field->field_size : 255)));
                    }
                    ?>
                <?php echo $form->error($profile, $field->varname); ?>
                </div>	
                <?php
            }
        }
        ?>
            <?php if (UserModule::doCaptcha('registration')): ?>
            <div class="row">
                <?php echo $form->labelEx($model, 'verifyCode'); ?>

        <?php $this->widget('CCaptcha'); ?>
        <?php echo $form->textField($model, 'verifyCode'); ?>
        <?php echo $form->error($model, 'verifyCode'); ?>

                <p class="hint"><?php echo UserModule::t("Please enter the letters as they are shown in the image above."); ?>
                    <br/><?php echo UserModule::t("Letters are not case-sensitive."); ?></p>
            </div>
            <?php endif; ?>

        <div class="row submit">
        <?php echo CHtml::submitButton(UserModule::t("Register"), array('class' => 'btn')); ?>
        </div>

    <?php $this->endWidget(); ?>
    </div><!-- form -->
<?php endif; ?>