<div class="tabbable"> 
    <ul class="nav nav-tabs">
        <li class="active"><a href="#tab1" data-toggle="tab">Описание</a></li>
        <li><a href="#tab2" data-toggle="tab">Характеристики</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="tab1">
            <div class="cat_overview">
                <h4><?php echo $model->product_name ?></h4>
                <p>Модель: <?php echo $model->product_model ?></p>
                <p><?php echo $model->product_review ?></p>
                <h6>Размеры</h6>
                <p><?php echo $model->product_dimensions ?></p>
                <?php if (isset($corePhotosURL['feature'])) echo '<img src="' . $corePhotosURL['feature'] . '" >' ?>
            </div>
        </div>
        <div class="tab-pane" id="tab2">
            <div class="cat_feature">
                <p><?php echo $model->product_feature ?></p>
            </div>
        </div>
    </div>
</div>