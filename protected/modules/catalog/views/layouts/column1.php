<?php /** @noinspection PhpUndefinedClassInspection */
/* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<?php
$cs = Yii::app()->clientScript; // Get client script

Yii::app()->clientScript->registerScriptFile(
        Yii::app()->assetManager->publish(
                Yii::getPathOfAlias('mcatalog.assets.js') . '/fmenu.js'
        ), CClientScript::POS_END
);

Yii::app()->clientScript->registerScriptFile(
        Yii::app()->assetManager->publish(
                Yii::getPathOfAlias('mcatalog.assets.js') . '/captify.tiny.js'
        ), CClientScript::POS_END
);

Yii::app()->clientScript->registerScriptFile(
        Yii::app()->assetManager->publish(
                Yii::getPathOfAlias('mcatalog.assets.js') . '/door.js'
        ), CClientScript::POS_END
);


Yii::app()->clientScript->registerCssFile(
    Yii::app()->assetManager->publish(
        Yii::getPathOfAlias('mcatalog.assets.css').'/jcatalog.css'
    )
);

?>
<div id="content">
<?php echo $content; ?>
</div><!-- content -->
    <?php $this->endContent(); ?>
