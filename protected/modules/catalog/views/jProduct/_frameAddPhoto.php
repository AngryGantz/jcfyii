<ul class="thumbnails">
    <?php
        // Запуск виджета для показа картинок в лайтбоксе
    $this->beginWidget('mext.prettyPhoto.PrettyPhoto', array(
        'options' => array(
            'opacity' => 0.60,
            'modal' => false,
            'deeplinking' => 'false',
        ),
    ));
    // Реляционный запрос (см. JProduct relations() ). Получение всех картинок (обьекты JPhoto), относящихся к продукту
    $oPics = $model->Photo;
    // Директория, где лежат фото. Хранится в "главной" категории продукта.
    $dir = Yii::app()->createUrl(Yii::getPathOfAlias('photourl') . '/' . $model->CategoryMain->category_photodir . '/');
    foreach ($oPics as $pic) {
        $photoid = $pic->photo_id;
        $picPath = $dir . '/' . $pic->photo_name;
        ?>    
        <li class="span2">
            <!-- Показ фото. Обрабатывается фиджетом Pretty -->
            <a href="<?php echo $picPath ?>" rel="prettyPhoto[pic]"><img src="<?php echo $picPath ?>"/></a>
            <?php
            // Ajax запрос на удаление фото. После удаления в контроллере JPhotoController, 
            // управление передаётся в контроллер JProductController функции actionUpdatePhoto(),
            // где применяется renderPartial этого файла c $processOutput true.
            echo CHtml::ajaxLink('Удалить', // Label
                    Yii::app()->createUrl('/catalog/jPhoto/delete', array('id' => $photoid, 'product_id' => $model->product_id)), // Url
                    array('type' => 'POST', 'update' => '#tum'), // ajax option
                    array('confirm' => 'Вы уверены, что хотите удалить этот элемент?') // HTML Options
            );
            ?>
            <p><?php echo $pic->photo_name ?></p>                            
        </li>
    <?php
    }
    $this->endWidget('mext.prettyPhoto.PrettyPhoto');
    ?>
</ul>
