<?php

/**
 * This is the model class for table "catalog_product".
 *
 * The followings are the available columns in table 'catalog_product':
 * @property integer $product_id
 * @property string $product_name
 * @property string $product_model
 * @property double $product_dilprice
 * @property double $product_retprice
 * @property double $product_olddilprice
 * @property double $product_oldretprice
 * @property integer $product_show
 * @property string $product_shortdesc
 * @property string $product_review
 * @property string $product_feature
 * @property string $product_main_photo
 * @property string $product_feature_photo
 * @property integer $product_maincategory
 * @property integer $product_vendor
 * @property integer $product_kod1c
 * @property string $product_dimensions
 * @property integer $product_qty
 *
 * The followings are the available model relations:
 * @property CatalogPhoto[] $catalogPhotos
 * @property CategoryMain $productMaincategory
 * @property CatalogVendor $productVendor
 * @property CatalogProductCategory[] $catalogProductCategories
 */
class JProduct extends CActiveRecord {

    /**
     * Название сущности модели в нескольких падежах и числах 
     *  функция возвращает по параметру-числу 
     *  Сколько?  1 продукт, 2 продукта, 5  продуктов 
     *  Управление чем? 6 продуктом 7 продуктами
     *  Множественное 8 продукты
     * Используется при построении меню представлений.
     */
    public $namesubj = array('Продукт', 'Продукта', 'Продуктов', 'Продуктом', 'Продуктами', 'Продукты');

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return JProduct the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'catalog_product';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('product_show, product_maincategory, product_vendor, product_kod1c, product_qty', 'numerical', 'integerOnly' => true),
            array('product_dilprice, product_retprice, product_olddilprice, product_oldretprice', 'numerical'),
            array('product_name, product_model, product_dimensions', 'length', 'max' => 255),
            array('product_main_photo, product_feature_photo', 'length', 'max' => 255),
            array('product_id, product_shortdesc, product_review, product_feature', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('product_id, product_name, product_model, product_dilprice, product_retprice, product_olddilprice, product_oldretprice, product_show, product_shortdesc, product_review, product_feature, product_main_photo, product_feature_photo, product_maincategory, product_vendor, product_kod1c, product_dimensions, product_qty', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'Photo' => array(self::HAS_MANY, 'JPhoto', 'photo_idproduct'),
            'CategoryMain' => array(self::BELONGS_TO, 'JCategory', 'product_maincategory'),
            'Vendor' => array(self::BELONGS_TO, 'JVendor', 'product_vendor'),
            'ProductCategories' => array(self::HAS_MANY, 'CatalogProductCategory', 'product_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'product_id' => 'id',
            'product_name' => 'Название',
            'product_model' => 'Модель',
            'product_dilprice' => 'Опт. Цена',
            'product_retprice' => 'Розн. Цена.',
            'product_olddilprice' => 'Старая опт. цена',
            'product_oldretprice' => 'Старая розн. цена',
            'product_show' => 'Показывать',
            'product_shortdesc' => 'Краткое описание',
            'product_review' => 'Описание',
            'product_feature' => 'Характеристики',
            'product_main_photo' => 'Главное фото',
            'product_feature_photo' => 'Фото характеристик',
            'product_maincategory' => 'Основная категория',
            'product_vendor' => 'Производитель',
            'product_kod1c' => 'Артикул',
            'product_dimensions' => 'Размеры',
            'product_qty' => 'Количество',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('product_id', $this->product_id);
        $criteria->compare('product_name', $this->product_name, true);
        $criteria->compare('product_model', $this->product_model, true);
        $criteria->compare('product_dilprice', $this->product_dilprice);
        $criteria->compare('product_retprice', $this->product_retprice);
        $criteria->compare('product_olddilprice', $this->product_olddilprice);
        $criteria->compare('product_oldretprice', $this->product_oldretprice);
        $criteria->compare('product_show', $this->product_show);
        $criteria->compare('product_shortdesc', $this->product_shortdesc, true);
        $criteria->compare('product_review', $this->product_review, true);
        $criteria->compare('product_feature', $this->product_feature, true);
        $criteria->compare('product_main_photo', $this->product_main_photo, true);
        $criteria->compare('product_feature_photo', $this->product_feature_photo, true);
        $criteria->compare('product_maincategory', $this->product_maincategory);
        $criteria->compare('product_vendor', $this->product_vendor);
        $criteria->compare('product_kod1c', $this->product_kod1c);
        $criteria->compare('product_dimensions', $this->product_dimensions, true);
        $criteria->compare('product_qty', $this->product_qty);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

    public function RusEnding($n) {
        switch ($n) {
            case 1: return $this->namesubj[0];
            case 2: return $this->namesubj[1];
            case 5: return $this->namesubj[2];
            case 6: return $this->namesubj[3];
            case 7: return $this->namesubj[4];
            case 8: return $this->namesubj[5];
            default:
                return $this->namesubj[0];
                break;
        }
    }

    /* ========================================================================
     * Функции работы с фотографиями продукта
     * ====================================================================== */

    /**
     * Если существуют дополнительные фото продукта, возвращает массив их имен,
     * иначе false.
     * @return false|array of string Массив имен дополнительных фото продукта
     */
    private function _getAddPhotosName() {
        $addPhotosName = array();
        $aoAddPhotos = $this->Photo;
        if (!$aoAddPhotos)
            return false;
        foreach ($aoAddPhotos as $recPic) {
            $addPhotosName[] = $recPic->photo_name;
        }
        return $addPhotosName;
    }

     /**
     * Возвращает URL фото продукта
     * @param array $photosName Имена фото
     * @param string $relPathCat Относительный путь к фото (category_photodir)
     * @return array Массив URL фото
     */
    private function _getPhotosURL(array $photosName, $relPathCat) {
        $photosUrl = array();
        foreach ($photosName as $name) {
            $photosUrl[] = Yii::app()->createUrl(Yii::getPathOfAlias('photourl') . '/' . $relPathCat . '/' . $name);
        }
        return $photosUrl;
    }

    /**
     * Возвращает URL дополнительных фото продукта
     * 
     * @return false|array of string Массив URL дополнительных фото 
     *                     или false если не существуют
     */
    public function getUrlAddPhoto() {
        $relPathCat = $this->CategoryMain->category_photodir;
        $addPhotosName = $this->_getAddPhotosName();
        if (!$addPhotosName)
            return false;
        $addPhotosUrl = $this->_getPhotosURL($addPhotosName, $relPathCat);
        if (!$addPhotosUrl)
            return false;
        return $addPhotosUrl;
    }

    /**
     * Возвращает URL основных фото продукта в массиве
     * ['main'=>URLMainPhoto, 'feature'=>URLFeaturePhoto ]
     * 
     * @return false|array of string Массив URL основных фото 
     *                     или false если не существуют
     */
    public function getUrlCorePhoto() {
        $relPathCat = $this->CategoryMain->category_photodir;
        if(isset($this->product_main_photo)) {
            $m[]=$this->product_main_photo;
            $m=$this->_getPhotosURL($m, $relPathCat);
            $corePhotos['main']=$m[0];
        } 
        if(isset($this->product_feature_photo)) {
            $f[]=$this->product_feature_photo;
            $f=$this->_getPhotosURL($f, $relPathCat);
            $corePhotos['feature']=$f[0];
        } 
        return $corePhotos;
    }
   
    /**
     *  Возвращает img тэг с главным фото продукта или пустую строку
     * если фото не указано или отсутствует. 
     *  При входном параметре 'admin' если фото указано, но отсутствует
     * дополнительно возвращается предупреждение. 
     * $idtag - ID Тэга IMG
     */
    public function getMainPhotoTag($idtag = 'mainphoto', $flag = 'front') {
        return $this->getPhotoTag($this->product_main_photo, $idtag, $flag);
    }

    /**
     *  Возвращает img тэг с "техническим" фото продукта или пустую строку
     * если фото не указано или отсутствует. 
     *  При входном параметре 'admin' если фото указано, но отсутствует
     * дополнительно возвращается предупреждение. 
     * $idtag - ID Тэга IMG
     */
    public function getFeaturePhotoTag($idtag = 'featurephoto', $flag = 'front') {
        return $this->getPhotoTag($this->product_feature_photo, $idtag, $flag);
    }

    private function getPhotoTag($picname, $idtag = 'featurephoto', $flag = 'front') {
        if (!$picname)
            return '';
        $picpath = Yii::getPathOfAlias('photodir') . '/' . $this->CategoryMain->category_photodir . '/' . $picname;
        $picurl = Yii::app()->createUrl(Yii::getPathOfAlias('photourl') . '/' . $this->CategoryMain->category_photodir . '/' . $picname);
        if (!file_exists($picpath)) {
            if ($flag == 'admin')
                return 'Внимание! отсутствует файл с техническим фото продукта ';
            else
                return '';
        }
        return '<img id="' . $idtag . '" src="' . $picurl . '">';
    }

    public function changePhoto($tmpFile, $newPhotoName, $oldPhotoName) {

        $dir = Yii::getPathOfAlias('photodir') . '/' . $this->CategoryMain->category_photodir;
        $oldPhoto = $dir . '/' . $oldPhotoName;
        $newPhoto = $dir . '/' . $newPhotoName;
        $tmpFile = YiiBase::getPathOfAlias('webroot') . '/' . $tmpFile;
        //  if(file_exists($oldPhoto)) unlink($oldPhoto); 
        copy($tmpFile, $newPhoto);
        unlink($tmpFile);
    }

    /**
     * Получить путь к папке с фотографиями 
     * @return string Путь к папке с фотографиями 
     */
    public function getPhotoDir() {
        $d = Yii::getPathOfAlias('photodir') . '/' . $this->CategoryMain->category_photodir;
        return $d;
    }

    /**
     * Возвращает URL фотографий продукта или false
     * @return array of string|boolean
     */
    public function getPhotoSUrl() {
        $picurl = array();
        $pics = $this->Photo;
        $dir = $this->getPhotoDir();
        foreach ($pics as $pic) {
            $picurl[] = $dir . '/' . $pic->photo_name;
        }
        if (isset($picurl))
            return $picurl; else
            return false;
    }

    /**
     * При смене категорий необходимо перенести фото в новую папку.
     * @param int id $oldCat старой главной категории
     */
    public function changeMainCat($oldCat) {
        $newDir = $this->getPhotoDir();
        $oldCategory = JCategory::model()->findByPk($oldCat);
        $oldDir = Yii::getPathOfAlias('photodir') . '/' . $oldCategory->category_photodir;
        $photos = $this->Photo;
        foreach ($photos as $pic) {
            $oldPicPath = $oldDir . '/' . $pic->photo_name;
            $newPicPath = $newDir . '/' . $pic->photo_name;
            if (file_exists($oldPicPath)) {
                copy($oldPicPath, $newPicPath);
                unlink($oldPicPath);
            }
        }
        if (isset($this->product_main_photo)) {
            $oldPicPath = $oldDir . '/' . $this->product_main_photo;
            $newPicPath = $newDir . '/' . $this->product_main_photo;
            if (file_exists($oldPicPath)) {
                copy($oldPicPath, $newPicPath);
                unlink($oldPicPath);
            }
        }
        if (isset($this->product_feature_photo)) {
            $oldPicPath = $oldDir . '/' . $this->product_feature_photo;
            $newPicPath = $newDir . '/' . $this->product_feature_photo;
            if (file_exists($oldPicPath)) {
                copy($oldPicPath, $newPicPath);
                unlink($oldPicPath);
            }
        }
    }

    /*     * ********************************************************************
     *  Создание и получение тумбнэйлов фотографий
     * ********************************************************************** */

    /**
     * Тумбнэйлы находятся в папке "assets/tumb/ПутьФотоКатегории" 
     * Так же как и с самими фото, хочу предотвратить скопления тысяч файлов
     * в одной папке. А assets выбран потому, что это папке "генерируемых" ресурсов,
     * которую можно (и нужно) периодически просто очищать.
     * @return string Путь к папке с тумбнэйлами.
     */
    private function _getTumbDir() {
        return Yii::getPathOfAlias('thumbdir') . '/' . $this->CategoryMain->category_photodir;
    }

    /**
     *  Функция создания дерева папок в ассетс для тумбнэйлов передаем путь,
     *  а не вызываем внутри функции _getTumbDir() исключительно из экономии
     *  запросов к БД
     * @param string $dir путь для создания дерева папок
     * @param hex $mode = 0777 Linux mode создаваемых папок
     */
    private function _createTumbDir($path, $mode = 0777) {
        if (is_dir($path))
            return $path;
        $path = rtrim(preg_replace(array("/\\\\/", "/\/{2,}/"), "/", $path), "/");
        $e = explode("/", ltrim($path, "/"));
        if (substr($path, 0, 1) == "/") {
            $e[0] = "/" . $e[0];
        }
        $c = count($e);
        $cp = $e[0];
        for ($i = 1; $i < $c; $i++) {
            if (!is_dir($cp) && !@mkdir($cp, $mode)) {
                return false;
            }
            $cp .= "/" . $e[$i];
        }
        return @mkdir($path, $mode);
    }

    /**
     *  Создает тумбнэйл фотографии
     * @param string $picPath Путь картинке
     * @param string $tumbPath Путь к создаваемому тумбнэйлу
     * @param int $w_size Ширина тумбнэйла в пикселях
     * @param int $h_size Высота тумбнэйла в пикселях
     * @return boolean true|false 
     */
    private function _createOneTumb($picPath, $tumbPath, $w_size = 150, $h_size = 150) {
        if (file_exists($tumbPath))
            return true;
        EWideImage::load($picPath)->resize($w_size, $h_size)->saveToFile($tumbPath, 100);
        if (file_exists($tumbPath))
            return true; else
            return false;
    }

    /**
     * Проверяет наличие и создает при необходимости тумбнэйлы указанного размера
     * @param array $picNames Строковый массив имен фотографий
     * @param string $srcDir Абсолютный путь к фотографиям
     * @param string $dstDir Абсолютный путь к тумбнэйлам
     * @param type $w_size Ширина тумбнэйлов в пикселях
     * @param type $h_size Высота тумбнэйлов в пикселях
     * @return array Массив имен тумбнэйлов
     */
    private function _createTumbnails(array $picNames, $srcDir, $dstDir, $w_size, $h_size) {
        $tumbNames = array();
        $this->_createTumbDir($dstDir);
        foreach ($picNames as $pic) {
            $picPath = $srcDir . '/' . $pic;
            $tumbName = 'tb' . '_' . $w_size . '_' . $h_size . '_' . $pic;
            $tumbPath = $dstDir . '/' . $tumbName;
            if ($this->_createOneTumb($picPath, $tumbPath, $w_size, $h_size))
                $tumbNames[] = $tumbName;
        }
        return $tumbNames;
    }

    /**
     * Возвращает URL тумбнэйлов
     * @param array $tumbNames Имена тумбнэйлов
     * @param string $relPathCat Относительный путь к фото (category_photodir)
     * @return array Массив URL тумбнэйлов
     */
    private function _getTumbsURL(array $tumbNames, $relPathCat) {
        $tumbsUrl = array();
        foreach ($tumbNames as $tumb) {
            $tumbsUrl[] = Yii::app()->createUrl(Yii::getPathOfAlias('thumburl') . '/' . $relPathCat . '/' . $tumb);
        }
        return $tumbsUrl;
    }

    /**
     * Консолидирующая приватная функция по работе с тумбнэйлами. 
     * На входе - массив с именами фото, на выходе массив с URL тумбнэйлов
     * @param array of string $picNames Массив имен фото 
     * @param int $w_size Ширина тумбнэйла в пикселях
     * @param int $h_size Высота тумбнэйла в пикселях
     * @return array of URL Массив URL тумбнэйлов
     */
    private function _getTumbs(array $picNames, $w_size, $h_size) {
        $relPathCat = $this->CategoryMain->category_photodir;
        $srcDir = Yii::getPathOfAlias('photodir') . '/' . $relPathCat;
        $dstDir = Yii::getPathOfAlias('thumbdir') . '/' . $relPathCat;
        $tumbNames = $this->_createTumbnails($picNames, $srcDir, $dstDir, $w_size, $h_size);
        $thumbsUrl = $this->_getTumbsURL($tumbNames, $relPathCat);
        return $thumbsUrl;
    }

    /**
     * Создает тумбнэйлы дополнительных фото продукта и возвращает их URL
     * 
     * @param int $w_size Ширина тумбнэйлов в пикселях
     * @param int $h_size Высота тумбнэйлов в пикселях
     * @return false|array of string Массив URL тумбнэйлов или false если не существуют
     */
    public function getUrlTumbsAddPhoto($w_size, $h_size) {
        $addPhotosName = $this->_getAddPhotosName();
        if (!$addPhotosName)
            return false;
        $tumbsUrl = $this->_getTumbs($addPhotosName, $w_size, $h_size);
        if (!$tumbsUrl)
            return false;
        return $tumbsUrl;
    }

    /**
     * Возвращает URL основных фото продукта в массиве
     * ['main'=>URLMainPhoto, 'feature'=>URLFeaturePhoto ]
     * @param int $w_size Ширина тумбнэйлов в пикселях
     * @param int $h_size Высота тумбнэйлов в пикселях
     * @return false|array of string Массив URL основных фото 
     *                     или false если не существуют
     */
    public function getUrlCoreTumbs($w_size, $h_size) {
        if(isset($this->product_main_photo)) {
            $m[]=$this->product_main_photo;
            $m=$this->_getTumbs($m, $w_size, $h_size);
            $coreTumbs['main']=$m[0];
        } 
        if(isset($this->product_feature_photo)) {
            $f[]=$this->product_feature_photo;
            $f=$this->_getTumbs($f, $w_size, $h_size);
            $coreTumbs['feature']=$f[0];
        } 
        return $coreTumbs;
    }
    
    
}