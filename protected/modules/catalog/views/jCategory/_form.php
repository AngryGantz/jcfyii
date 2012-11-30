<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'jcategory-form',
    'enableAjaxValidation' => false,
        ));
?>

<p class="help-block">Поля, отмеченные <span class="required">*</span> обязательны.</p>

<ul class="nav nav-tabs">
    <li class="active"><a href="#tab1" data-toggle="tab">Основное</a></li>
    <li><a href="#tab2" data-toggle="tab">Описание</a></li>
    <li><a href="#tab3" data-toggle="tab">Картинки</a></li>
</ul>
<div class="tab-content">
    <div class="tab-pane active" id="tab1">
        <!-- первый столбец с полями вкладки "Основное" -->
        <p>&nbsp;</p>
        <?php echo $form->textFieldRow($model, 'category_name', array('class' => 'span5', 'maxlength' => 255)); ?>
        <p>&nbsp;</p>

        <div class=" alert alert-info">Папка для фотографий продуктов, для которых эта категория является главной. 
            Задаётся относительный путь от базовой папки фотографий каталога. Например, в настройках модуля установлена 
            базовая папка www-root/images/catalog.  В этом поле ставится путь accessories/mouse 
            Фото продуктов (и картинки самой категории) будут храниться в  www-root/images/catalog/accessories/mouse 
        </div>
        <?php echo $form->textFieldRow($model, 'category_photodir', array('class' => 'span5', 'maxlength' => 255)); ?>
<p>&nbsp;</p>
        Родительская категория
        <?php
        $categoryItems = CHtml::listData(JCategory::model()->findAll(), 'category_id', 'category_name');
        $this->widget('mext.select2.ESelect2', array(
            'model' => $model,
            'attribute' => 'category_parent',
            'data' => $categoryItems,
            'htmlOptions' => array(
                'class' => 'selectdrop5',
            ),
        ));
        ?>
    </div>

    <div class="tab-pane" id="tab2">
        <p> Описание категории</p>
        <?php JCKeditor::activeCKEditor($model, 'category_review', array('height' => '200px')); ?>
    </div>

    <div class="tab-pane" id="tab3">
        <?php if (!$model->isNewRecord) { ?>
            <?php
            $blankPic = Yii::app()->assetManager->publish(
                    Yii::getPathOfAlias('mcatalog.assets.images') . '/blank.gif'
            );
            // Запуск виджета для показа картинок в лайтбоксе
            $this->beginWidget('mext.prettyPhoto.PrettyPhoto', array(
                'options' => array(
                    'opacity' => 0.60,
                    'modal' => false,
                    'deeplinking' => 'false',
                ),
            ));
            for ($index = 1; $index < 5; $index++) {
                $this->renderPartial('_UpdateCategoryPic', array('num' => $index, 'blankPic' => $blankPic, 'model' => $model, 'form' => $form));
            }
            $this->endWidget('mext.prettyPhoto.PrettyPhoto');
            ?>
        <?php } else { ?>
            <!-- Если Новая товар -->       
            <div class="alert">
                <button type="button" class="close" data-dismiss="alert">x</button>
                <strong>Внимание!</strong></br> Добавление фотографий возможно только после сохранения товара
            </div>
        <?php } ?>
</div>
        <?php echo $form->errorSummary($model); ?>
        <div class="form-actions">
            <?php
            $this->widget('bootstrap.widgets.TbButton', array(
                'buttonType' => 'submit',
                'type' => 'primary',
                'label' => $model->isNewRecord ? 'Создать' : 'Сохранить',
            ));
            ?>
        </div>
            
        <?php $this->endWidget(); ?>

        <!-- Запуск prettyPhoto по готовности документа -->
        <script type="text/javascript" charset="utf-8">
            $(document).ready(function(){
                $("a[rel^='prettyPhoto']").prettyPhoto();
            });
        </script>
