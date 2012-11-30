<?php
$this->breadcrumbs = array(

    $model->category_name,
);

if (JHUsers::isAdmin()) {
// Меню управления показываем только админу    
    $labelM1 = 'Список ' . JCategory::model()->RusEnding(5);
    $labelM2 = 'Новая ' . JCategory::model()->RusEnding(1);
    $labelM3 = 'Редактировать категорию';
    $labelM5 = 'Управление ' . JCategory::model()->RusEnding(7);
   ?>
<div class="subnav">
    <div class="navbar navbar-inner">    
        <ul class="nav nav-pills">
            <li><?php echo CHtml::link($labelM2, array('create')); ?></li>
            <li><?php echo CHtml::link($labelM3, array('update', 'id' => $model->category_id)); ?></li>
            <li><?php echo CHtml::linkButton('Удалить', array('submit' => array('delete', 'id' => $model->category_id), 'confirm' => 'Вы уверены, что хотите удалить эту категорию? Она будет удалено со всеми элементами, считающими её главной.')); ?></li>
            <li><?php echo CHtml::link($labelM5, array('admin')); ?></li>
        </ul>
    </div>
</div>
</br></br>
<?php } ?> <!-- Конец меню управления -->
<!--
<h1><?php 
echo $model->category_name 
        ?> </h1>
-->
<!-- Вывод миниатюр продуктов категории. -->
<div class="cat_viewcat">
    <ul>
        <?php
        $catpic1=$model->getPhotoURL($model->category_pic1);
        $catpic2=$model->getPhotoURL($model->category_pic2);
        echo '<li class="li-1"><img src="'.$catpic1.'"></li>';
        echo '<li class="li-2"><img src="'.$catpic2.'" ></li>';
        $i = 0;
        foreach ($products as $prd) {
            $cf = $prd->getUrlCoreTumbs(213, 500)
                    
            ?>
        
            <div class="eff">
                <img src="<?php echo $cf['main']; ?>"  >
                <div class="caption">
                    <a href="/catalog/JProduct/view/id/<?php echo $prd->product_id; ?>" class="header">
                        <?php echo $prd->product_name; ?></a>
                    <p><span class="modelname">Модель: </span> <?php echo $prd->product_model; ?></p>
                    <?php if (JHUsers::isDealer()) { ?> <p><span class="modelname">Дилерская цена: </span>&nbsp;&nbsp; <span class="price"><?php echo $prd->product_dilprice.'тг.</span></p>'; } ?>
                    <?php if (!JHUsers::isDealer()){ ?> <p><span class="modelname">Рекомендованная цена: </span>&nbsp;&nbsp; <span class="price"><?php echo $prd->product_retprice.'тг.</span></p>'; } ?>
                </div>
            </div>
            <?php $i++;
        }
        ?>
    </ul>
</div>
<script>
    $(document).ready(function() {
        $('.eff').hover(    
        function () {        
            value = $(this).find('img').outerHeight() * -1;         
            $(this).find('img').stop().animate({bottom: value} ,{duration:500, easing: 'easeOutBounce'}); },     
        function () {            
            $(this).find('img').stop().animate({bottom:0} ,{duration:500, easing: 'easeOutBounce'});});  
        $('.eff').click(function () {           
            window.location = $(this).find('a:first').attr('href'); }); });
</script>