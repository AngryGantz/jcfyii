<?php
/**
 *  @var $this CController
 *  @var JProduct $model
 *  @var CActiveForm $form
 * 
 * Основная форма редактирования карточки продукта в каталоге
 */
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'jproduct-form',
    'enableAjaxValidation' => false,
        ));
?>

<p class="help-block">Поля, отмеченные <span class="required">*</span> обязательны.</p>
<div class="tabbable"> <!-- Only required for left/right tabs -->
    <ul class="nav nav-tabs">
        <li class="active"><a href="#tab1" data-toggle="tab">Основное</a></li>
        <li><a href="#tab2" data-toggle="tab">Описание</a></li>
        <li><a href="#tab3" data-toggle="tab">Характеристики</a></li>
        <li><a href="#tab4" data-toggle="tab">Фото</a></li>
        <li><a href="#tab5" data-toggle="tab">Доп. Фото</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="tab1">
            <div class="row">
                <div class="span5">
                    <!-- первый столбец с полями вкладки "Основное" -->
                    <?php echo $form->textFieldRow($model, 'product_name', array('class' => 'span5', 'maxlength' => 255)); ?>
                    <?php echo $form->textFieldRow($model, 'product_model', array('class' => 'span5', 'maxlength' => 255)); ?>
                    <?php echo $form->textFieldRow($model, 'product_kod1c', array('class' => 'span5')); ?>
                    <?php echo $form->textFieldRow($model, 'product_dimensions', array('class' => 'span5', 'maxlength' => 255)); ?>
                    <?php echo $form->textFieldRow($model, 'product_qty', array('class' => 'span5')); ?>                    
                    <?php echo $form->textFieldRow($model, 'product_show', array('class' => 'span5')); ?>
                    <p>&nbsp;</p>
                </div>
                <div class="span5">
                    <!-- Второй столбец с полями вкладки "Основное" -->
                    <?php echo $form->textFieldRow($model, 'product_dilprice', array('class' => 'span5')); ?>
                    <?php echo $form->textFieldRow($model, 'product_retprice', array('class' => 'span5')); ?>
                    <?php echo $form->textFieldRow($model, 'product_olddilprice', array('class' => 'span5')); ?>
                    <?php echo $form->textFieldRow($model, 'product_oldretprice', array('class' => 'span5')); ?>
                    <!-- Подмена поля на выпадающий список категорий с ajax-локатором -->  
                    <p>Основная категория 
                        <?php
                        $categoryItems = CHtml::listData(JCategory::model()->findAll(), 'category_id', 'category_name');
                        $this->widget('mext.select2.ESelect2', array(
                            'model' => $model,
                            'attribute' => 'product_maincategory',
                            'data' => $categoryItems,
                            'htmlOptions' => array(
                                'class' => 'selectdrop5',
                            ),
                        ));
                        ?>
                    </p>
                    <!--  Вместе с формой передаем старую главную категорию. Если поменялась надо переместить фото -->
                    <?php echo CHtml::hiddenField('oldMainCat', $model->product_maincategory); ?>
                    <!-- Подмена поля на выпадающий список категорий с ajax-локатором -->  
                    <p>Производитель 
                        <?php
                        $vendorItems = CHtml::listData(JVendor::model()->findAll(), 'vendor_id', 'vendor_name');
                        $this->widget('mext.select2.ESelect2', array(
                            'model' => $model,
                            'attribute' => 'product_vendor',
                            'data' => $vendorItems,
                            'htmlOptions' => array(
                                'class' => 'selectdrop5',
                            ),
                        ));
                        ?>
                    </p>


                </div>    
            </div>
        </div>
        <div class="tab-pane" id="tab2">
            <?php echo $form->textAreaRow($model, 'product_shortdesc', array('rows' => 6, 'cols' => 50, 'class' => 'span8')); ?>
            <p> Полное описание</p>
            <?php JCKeditor::activeCKEditor($model, 'product_review', array('height' => '200px')); ?>
        </div>
        <div class="tab-pane" id="tab3">
            <?php JCKeditor::activeCKEditor($model, 'product_feature', array('height' => '600px')); ?>
        </div>
        <div class="tab-pane" id="tab4">
            <!-- ***********************************************************************************************
            *
            *                      Добавление, замена и показ основного фото продукта 
            *                      Все манипуляции с фото невозможны при создании нового продукта
            *                      
            **************************************************************************************************-->
            <?php if (!$model->isNewRecord) { ?>
                <div class="row">
                    <div class="span4">
                        <?php
                        $blankPic = Yii::app()->assetManager->publish(
                                Yii::getPathOfAlias('mcatalog.assets.images') . '/blank.gif'
                        );
                        // Недоступное для прямого редактирования поле с названием основного фото. 
                        // Меняется автоматически при добавлении или замене фотографии с помощью ajax запросов
                        // виджета SWFUpload
                        echo $form->textFieldRow($model, 'product_main_photo', array(
                            'class' => 'span3 disabledInput',
                            'maxlength' => 20,
                            'id' => 'image_name1',
                            'readonly' => 'true'));

                        // подготовка виджета и вывода. Если фото у товара нет, выводим надпись загрузить фото, если есть - заменить.
                        if (!$model->product_main_photo)
                            $buttonText = 'Загрузить фото  '; else
                            $buttonText = 'Сменить фото  ';
                        $idmodel = $model->product_id;
                        if (isset($model->product_main_photo))
                            $namePhoto = $model->product_main_photo; else
                            $namePhoto = '';
                        // Получение директории с фото товара реляционным запросом
                        $dir = Yii::app()->createUrl(Yii::getPathOfAlias('photourl') . '/' . $model->CategoryMain->category_photodir . '/');
                        // полный путь к фото

                        if (isset($model->product_main_photo))
                            $picPath = $dir . '/' . $model->product_main_photo; else
                            $picPath = $blankPic;

                        // Запуск виджета. В Виджет добавлены новые атрибуты 'idmodel' и 'namePhoto' для удобства манипуляций
                        // с фото после загрузки. 
                        // В функции callback "oldname" - это имя как раз таки новой фотографии -))) Это не я придумал, так в виджете обозвали  
                        // name - имя tmp-файла с фото, а path - путь к tmp - файлу.
                        // После загрузки функция callback выводит в поле формы имя новой картинки и вставляет фото для показа.
                        // Выводится новый тумбнэйльчик и всё это дело подхватывается виджетом PrettyPhoto для показа полноразмерки
                        // в лайтбоксе.  
                        // Подтверждение сохранения изменений только по кнопке формы "Сохранить". Поэтому старое фото не удаляем. 
                        // Для удаления старых картинок будет использована специальная процедура чистки.  

                        $this->widget('mext.swfupload.SWFUpload', array('callbackJS' => 'swfupload_callback',
                            'buttonText' => $buttonText, // Текст на кнопке виджета
                            'idmodel' => $idmodel, // product_id модели   
                            'namePhoto' => $namePhoto)); // Имя старой картинки
                        ?>
                        <script>
                            function swfupload_callback(name,path,oldname) {
                                $("#image_name1").val(oldname);
                                $("#mphotoMainImg").attr("src","<?php echo $dir; ?>/"+oldname); 
                                $("#mphotoMainA").attr("href","<?php echo $dir; ?>/"+oldname); 
                            } 
                        </script>
                    </div>
                    <div class="span6"> 
                        <ul class="thumbnails">
                            <li class="span4">
                                <a class="thumbnail" id="mphotoMainA" href="<?php echo $picPath; ?>" rel="prettyPhoto[main]">
                                    <img id="mphotoMainImg" src="<?php echo $picPath; ?>"/>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Конец вывода основного фото -->
                <!-- ***********************************************************************************************
                *
                *                      Добавление, замена и показ технического фото продукта 
                *                      Всё аналогично основному, только изменены id поля и блока показа фото
                *
                **************************************************************************************************-->
                <div class="row"> 
                    <div class="span4">
                        <?php
                        echo $form->textFieldRow($model, 'product_feature_photo', array(
                            'class' => 'span3 disabledInput',
                            'maxlength' => 20,
                            'id' => 'image_name2',
                            'readonly' => 'true'));
                        ?>
                        <?php
                        if (!$model->product_main_photo)
                            $buttonText = 'Загрузить фото  '; else
                            $buttonText = 'Сменить фото  ';
                        $idmodel = $model->product_id;
                        if (isset($model->product_feature_photo))
                            $namePhoto = $model->product_feature_photo; else
                            $namePhoto = '';
                        // $namePhoto = $model->product_feature_photo;
                        $dir = Yii::app()->createUrl(Yii::getPathOfAlias('photourl') . '/' . $model->CategoryMain->category_photodir . '/');
                        $this->widget('mext.swfupload.SWFUpload', array('callbackJS' => 'swfupload_callback2',
                            'buttonText' => $buttonText,
                            'idmodel' => $idmodel,
                            'namePhoto' => $namePhoto));
                        if (isset($model->product_feature_photo))
                            $picPath = $dir . '/' . $model->product_feature_photo; else
                            $picPath = $blankPic;
                        ?>
                        <script>
                            function swfupload_callback2(name,path,oldname) {
                                $("#image_name2").val(oldname);
                                $("#mphotoFeatureImg").attr("src","<?php echo $dir; ?>/"+oldname); 
                                $("#mphotoFeatureA").attr("href","<?php echo $dir; ?>/"+oldname); 
                            } 
                        </script>
                    </div>
                    <div class="span6"> 
                        <ul class="thumbnails">
                            <li class="span4">
                                <a id="mphotoFeatureA" class="thumbnail" href="<?php echo $picPath; ?>" rel="prettyPhoto[feature]">
                                    <img id="mphotoFeatureImg" src="<?php echo $picPath; ?>"/>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Конец вывода технического фото -->
<?php } else { ?>
                <!-- Если новый товар -->       
                <div class="alert">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    <strong>Внимание!</strong></br> Добавление фотографий возможно только после сохранения товара
                </div>
<?php } ?>
        </div>
        <!-- Конец вкладки основных фото -->
        <!-- ***********************************************************************************************
        *
        *      Вкладка "Доп. Фото"
        *      Добавление, удаление и показ дополнительных фото продукта 
        *      Вся работа по показу и удалению идёт в файле _frameAddPhoto, который
        *      перерендеривается аяксом в случае удаления или добавления фото.
        *
        **************************************************************************************************-->
        <div class="tab-pane" id="tab5" name="thumbs">
<?php if (!$model->isNewRecord) { ?>
                <div class="alert">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    <strong>Внимание!</strong></br> Добавление и удаление дополнительных фотографий к продукту происходит без подтверждения кнопкой "Сохранить".
                </div>
                <div id="tum">          
                <?php
                $this->renderPartial('_frameAddPhoto', array('model' => $model))
                ?>
                </div>

                <?php
                // Добавление фото к продукту. По имени NOT_MAIN_PHOTO функция saveFoto контроллера JProductController
                // будет знать, что это добавление дополнительного фото а не основного
                $idmodel = $model->product_id;
                $dir = Yii::app()->createUrl(Yii::getPathOfAlias('photourl') . '/' . $model->CategoryMain->category_photodir . '/');
                $this->widget('mext.swfupload.SWFUpload', array('callbackJS' => 'swfupload_callback3',
                    'buttonText' => 'Добавить фото',
                    'idmodel' => $idmodel,
                    'namePhoto' => 'NOT_MAIN_PHOTO'));
                ?>
                <script>
                    function swfupload_callback3(name,path,oldname) {
                        // Вызов обновления блока дополнительных фотографий.
                        $.ajax({
                            type: "POST",
                            url: "/catalog/jProduct/updatePhoto",
                            data: { product_id: "<?php echo $model->product_id ?>"}
                        }).done(function(data) {
                            $("#tum").html(data);
                        });                    
                    } 
                </script>
<?php } else { ?>
                <!-- Если новый товар -->       
                <div class="alert">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    <strong>Внимание!</strong></br> Добавление фотографий возможно только после сохранения товара
                </div>
        <?php } ?>
        </div> 
        <!-- Конец вкладки с доп. фото -->


            <?php echo $form->errorSummary($model); ?> 
        <!-- Вывод ошибок валидации заполнения формы -->

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
        <!-- Конец формы -->

        <!-- Запуск prettyPhoto по готовности документа -->
        <script type="text/javascript" charset="utf-8">
            $(document).ready(function(){
                $("a[rel^='prettyPhoto']").prettyPhoto();
            });
        </script>
