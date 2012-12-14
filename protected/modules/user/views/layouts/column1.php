<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<?php
$cs = Yii::app()->clientScript; // Get client script
// $cs->registerCSSFile(Yii::app()->request->baseUrl.'/css/lytebox.css'); // Add CSS

Yii::app()->clientScript->registerScriptFile(
        Yii::app()->assetManager->publish(
                Yii::getPathOfAlias('application.modules.user.js') . '/fmenu.js'
        ), CClientScript::POS_END
);

Yii::app()->clientScript->registerCssFile(
    Yii::app()->assetManager->publish(
        Yii::getPathOfAlias('application.modules.user.css').'/fmenu.css'
    )
);

?>
<div id="content">
<?php echo $content; ?>
</div><!-- content -->
    <?php $this->endContent(); ?>
