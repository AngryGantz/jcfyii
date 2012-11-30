<!-- ====================================================
*
*  Блок вывода бокса с картинками для страницы просмотра продуктов
*  view.php
*  Внимание!!! Все файлы представлений и index.php должны быть
*  в кодировке UTF-8. Иначе json_encode сделает бяку из страницы
*
======================================================= -->
<div class="imgbox" >
    <div class="tumbs" >
        <ul>
            <?php
            $i = 0;
            foreach ($tumbsUrl as $tumb) {
                echo '<li><img src="' . $tumb . '" OnClick="ChangeImg(' . $i . ')"></li>';
                $i++;
            }
            ?>
        </ul>
    </div>
    <div class="img420" >
        <img id="bigImg" src="<?php echo $addPhotosURL[0] ?>">
    </div>
</div>
<script>
    // Передача в JS массива с URL фотографий
    var bigImgs = JSON.parse('<?php echo json_encode($addPhotosURL) ?>');
    // При клике на тумбале выводим большое фото в img с id  "bigImg"
    function ChangeImg(id){ $("#bigImg").attr("src", bigImgs[id]); }
</script>
