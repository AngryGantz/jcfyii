<?php

/**
 * This is the model class for table "catalog_category".
 *
 * The followings are the available columns in table 'catalog_category':
 * @property integer $category_id
 * @property string $category_name
 * @property string $category_review
 * @property string $category_photodir
 * @property integer $category_parent
 * @property integer $category_lft
 * @property integer $category_rgt
 * @property integer $category_level
 * @property string $category_pic
 * @property string $category_pic2
 * @property string $category_pic3
 * @property integer $category_pic4
 *
 * The followings are the available model relations:
 * @property CatalogProduct[] $catalogProducts
 * @property CatalogProductCategory[] $catalogProductCategories
 */
class JCategory extends CActiveRecord
{
        /**
        * Название сущности модели в нескольких падежах и числах 
        *  функция возвращает по параметру-числу 
        *  Сколько?  1 продукт, 2 продукта, 5  продуктов 
        *  Управление чем? 6 продуктом 7 продуктами
        *  Множественное 8 продукты
        * Используется при построении меню представлений.
        */
        public $namesubj = array('Категория','Категории','Категорий','Категорией','Категориями','Категории');
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return JCategory the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'catalog_category';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('category_parent, category_lft, category_rgt, category_level', 'numerical', 'integerOnly'=>true),
			array('category_name, category_photodir', 'length', 'max'=>255),
			array('category_pic1, category_pic2, category_pic3, category_pic4',  'length', 'max'=>255),
			array('category_review', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('category_id, category_name, category_review, category_pic1, category_photodir, category_parent, category_lft, category_rgt, category_level, category_pic2, category_pic3, category_pic4', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'Products' => array(self::HAS_MANY, 'JProduct', 'product_maincategory'),
			'ProductCategories' => array(self::HAS_MANY, 'JProductCategory', 'category_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'category_id' => 'ID Категории',
			'category_name' => 'Название',
			'category_review' => 'Описание',
			'category_pic1' => 'Картинка-1',
			'category_photodir' => 'Папка для картинок',
			'category_parent' => 'Родительская категория',
			'category_lft' => 'ID Категории слева',
			'category_rgt' => 'ID Категории справа',
			'category_level' => 'Уровень категории',
			'category_pic2' => 'Картинка-2',
			'category_pic3' => 'Картинка-3',
			'category_pic4' => 'Картинка-4',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('category_id',$this->category_id);
		$criteria->compare('category_name',$this->category_name,true);
		$criteria->compare('category_review',$this->category_review,true);
		$criteria->compare('category_pic1',$this->category_pic1,true);
		$criteria->compare('category_photodir',$this->category_photodir,true);
		$criteria->compare('category_parent',$this->category_parent);
		$criteria->compare('category_lft',$this->category_lft);
		$criteria->compare('category_rgt',$this->category_rgt);
		$criteria->compare('category_level',$this->category_level);
		$criteria->compare('category_pic2',$this->category_pic2,true);
		$criteria->compare('category_pic3',$this->category_pic3,true);
		$criteria->compare('category_pic4',$this->category_pic4, true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
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
        
     /**
     * Возвращает URL тумбнэйлов
     * @param array $tumbNames Имена тумбнэйлов
     * @param string $relPathCat Относительный путь к фото (category_photodir)
     * @return array Массив URL тумбнэйлов
     */
    public function getPhotoURL($pic) {
            $pic = Yii::app()->createUrl(Yii::getPathOfAlias('photourl') . '/' . $this->category_photodir . '/' . $pic);
        return $pic;
    }
    
    
            public function behaviors() {
            parent::behaviors();
            return array(
            'TreeBehavior' => array(
                'class' => 'mext.nestedset.TreeBehavior',
                    '_idCol' => 'category_id',
                    '_lftCol' => 'category_lft',
                    '_rgtCol' => 'category_rgt',
                    '_lvlCol' => 'category_level',
            )
        );
    }
       
}