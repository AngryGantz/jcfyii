<?php

$su=false;
if(Yii::app()->user->checkAccess('aaAdminMenu', '', true)) $su = true;

// if (Yii::app()->user->getIsSuperuser())
//    $su = true;
$this->widget('bootstrap.widgets.TbNavbar', array(
    'brand' => 'Project JCF',
    'brandUrl' => '/site/index',
    'collapse' => true, // requires bootstrap-responsive.css
    'items' => array(
        array(
            'class' => 'bootstrap.widgets.TbMenu',
            'items' => array(
                array('label' => 'Каталог', 'url' => '/catalog/jCategory/', 'items'=>array (
                    array('label' => 'Беспроводные мышки 2.4Ghz', 'url' => '/catalog/jCategory/view/id/4'),
                    array('label' => 'Мышки G-Lase', 'url' => '/catalog/jCategory/view/id/5'),
                    array('label' => 'Оптические мышки', 'url' => '/catalog/jCategory/view/id/6'),
                    array('label' => 'Наборы Мышка+Коврик', 'url' => '/catalog/jCategory/view/id/7'),
                    array('label' => 'Коврики для мышек', 'url' => '/catalog/jCategory/view/id/8'),
                    array('label' => 'Наушники', 'url' => '/catalog/jCategory/view/id/9'),
                    array('label' => 'Веб-камеры', 'url' => '/catalog/jCategory/view/id/12'),
                    array('label' => 'Наклейки для ноутбуков', 'url' => '/catalog/jCategory/view/id/13'),
                    array('label' => 'Сумки для ноутбуков', 'url' => '/catalog/jCategory/view/id/14'),
                    array('label' => 'USB Хабы', 'url' => '/catalog/jCategory/view/id/15'),
                )),
                array('label' => 'Контакты', 'url' => '/site/contact/'),
                array('label' => 'Где купить', 'url' => '#'),
                array('label' => 'Вход для партнеров', 'url' => '/user/login', 'visible' => Yii::app()->user->isGuest),
                array('url' => Yii::app()->getModule('user')->logoutUrl, 'label' => Yii::app()->getModule('user')->t("Logout") . ' (' . Yii::app()->user->name . ')', 'visible' => !Yii::app()->user->isGuest),
                array('label' => 'Админка', 'url' => '#', 'visible' => $su, 'items' => array(
                        array('label' => 'Права', 'url' => '/rights', 'visible' =>Yii::app()->user->checkAccess('aaAdminRughts', '', true)),
                        array('label' => 'Пользователи', 'url' => '/user/admin', 'visible' =>Yii::app()->user->checkAccess('User.Admin.*', '', true)),
                        array('label' => 'Каталог', 'url' => '#', 'visible' =>Yii::app()->user->checkAccess('CatalogAdmin', '', true) ,'items' => array(
                                array('label' => 'Продукты', 'url' => Yii::app()->createUrl('/catalog/JProduct/admin')),
                                array('label' => 'Категории', 'url' => Yii::app()->createUrl('/catalog/JCategory/admin')),
                                array('label' => 'Вендоры', 'url' => Yii::app()->createUrl('/catalog/JVendor/admin')),
                        )),
                        '---',
                        array('label' => 'NAV HEADER'),
                        array('label' => 'Separated link', 'url' => '#'),
                        array('label' => 'One more separated link', 'url' => '#'),
                    ),),
            ),
        ),
        '<form class="navbar-search pull-left" action=""><input type="text" class="search-query span2" placeholder="Поиск"></form>',
    ),
));
?>
