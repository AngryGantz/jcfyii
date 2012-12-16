<?php
$this->breadcrumbs = array(
    $model->CategoryMain->category_name => array('/catalog/JCategory/view/id/'.$model->CategoryMain->category_id),
    $model->product_name,
);


$labelM1 = 'Список ' . JProduct::model()->RusEnding(5);
$labelM2 = 'Новый ' . JProduct::model()->RusEnding(1);
$labelM3 = 'Редактировать ' . JProduct::model()->RusEnding(1);
$labelM5 = 'Управление ' . JProduct::model()->RusEnding(7);


if (JHUsers::isAdmin()) {
// Выввод меню управления только для админов
   ?>
<div class="subnav">
    <div class="navbar navbar-inner">    
        <ul class="nav nav-pills">
            <li><?php echo CHtml::link($labelM2, array('create')); ?></li>
            <li><?php echo CHtml::link($labelM3, array('update', 'id' => $model->product_id)); ?></li>
            <li><?php echo CHtml::linkButton('Удалить', array('submit' => array('delete', 'id' => $model->product_id), 'confirm' => 'Вы уверены, что хотите удалить этот элемент?')); ?></li>
            <li><?php echo CHtml::link($labelM5, array('admin')); ?></li>
        </ul>
    </div>
</div>
</br></br>
<?php } ?>
<div class="cat_info">
    <div class="cat_left">
        <!-- Блок показа картинок -->
        <?php require_once '_frontBlockPhoto.php'; ?>
        <!-- Блок показа цен -->
        <div class="cat_price">
            <div class="alert alert-success" >
                <p><strong>Рекомендованная розничная цена <?php echo $model->product_retprice ?>Тг.</strong></p>
            </div>
            
           <?php  if (JHUsers::isDealer()) { ?>
            <div class="alert alert-message" >
                <p><strong>Дилерская цена <?php echo $model->product_retprice ?>Тг.</strong></p>
            </div>
           <?php } ?>
        </div>

    </div>
    <div class="cat_right">
        <!-- Блок показа информации о товаре -->
        <?php require_once '_frontBlockOverwiew.php'; ?>
    </div>
</div>
