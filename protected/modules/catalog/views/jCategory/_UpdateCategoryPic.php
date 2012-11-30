<div class="row">
    <div class="span4">
        <?php
        $fPic = 'category_pic' . $num;
        echo $form->textFieldRow($model, $fPic, array(
            'class' => 'span3 disabledInput',
            'maxlength' => 20,
            'id' => 'image_name' . $num,
            'readonly' => 'true'));

        if (!$model->$fPic)
            $buttonText = 'Загрузить фото  '; else
            $buttonText = 'Сменить фото  ';
        $idmodel = $model->category_id;
        if (isset($model->$fPic))
            $namePhoto = $model->$fPic; else
            $namePhoto = '';
        $dir = Yii::app()->createUrl(Yii::getPathOfAlias('photourl') . '/' . $model->category_photodir . '/');
        if (isset($model->$fPic))
            $picPath = $dir . '/' . $model->$fPic; else
            $picPath = $blankPic;
        $this->widget('mext.swfupload.SWFUpload', array('callbackJS' => 'swfupload_callback' . $num,
            'buttonText' => $buttonText, // Текст на кнопке виджета
            'idmodel' => $idmodel, // product_id модели   
            'namePhoto' => $namePhoto)); // Имя старой картинки
        ?>
        <script>
            function swfupload_callback<?php echo $num; ?> (name,path,oldname) {
                $("#image_name<?php echo $num; ?>").val(oldname);
                $("#picImg<?php echo $num; ?>").attr("src","<?php echo $dir; ?>/"+oldname); 
                $("#picA<?php echo $num; ?>").attr("href","<?php echo $dir; ?>/"+oldname); 
            } 
        </script>
    </div>
    <div class="span6"> 
        <ul class="thumbnails">
            <li class="span4">
                <a class="thumbnail" id="picA<?php echo $num; ?>" href="<?php echo $picPath; ?>" rel="prettyPhoto[cat]">
                    <img id="picImg<?php echo $num; ?>" src="<?php echo $picPath; ?>"/>
                </a>
            </li>
        </ul>
    </div>
</div>
