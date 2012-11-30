<?php
$this->breadcrumbs = array(
    JProduct::model()->RusEnding(8),
);
$labelM1 = 'Новый ' . JProduct::model()->RusEnding(1);
$labelM2 = 'Управление ' . JProduct::model()->RusEnding(7);
?>

<?php echo Yii::getPathOfAlias('photodir'); ?>

<div class="subnav">
    <div class="navbar navbar-inner">    
        <ul class="nav nav-pills">
            <li><?php echo CHtml::link($labelM1, array('create')); ?></li>
            <li><?php echo CHtml::link($labelM2, array('admin')); ?></li>
        </ul>
    </div>
</div>
</br></br>
<h1>Список <?php echo JProduct::model()->RusEnding(5) ?></h1>

<?php
$this->widget('bootstrap.widgets.TbListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_view',
));
?>
