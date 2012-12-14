<?php

/**
 * This is the model class for table "no_emty_cat".
 *
 * The followings are the available columns in table 'no_emty_cat':
 * @property string $vendor_name
 * @property integer $vendor_id
 * @property integer $category_id
 * @property string $category_name
 * @property string $category_review
 * @property string $category_photodir
 * @property integer $category_parent
 * @property integer $category_lft
 * @property integer $category_rgt
 * @property integer $category_level
 * @property string $category_pic1
 * @property string $category_pic2
 * @property string $category_pic3
 * @property string $category_pic4
 * @property integer $product_count
 */
class JNoEmtyCat extends CActiveRecord
{
        /**
        * Название сущности модели в нескольких падежах и числах 
        *  функция возвращает по параметру-числу 
        *  Сколько?  1 продукт, 2 продукта, 5  продуктов 
        *  Управление чем? 6 продуктом 7 продуктами
        *  Множественное 8 продукты
        * Используется при построении меню представлений.
        */
        public $namesubj = array(' ',' ',' ',' ',' ',' ');
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return JNoEmtyCat the static model class
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
		return 'no_emty_cat';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('vendor_id, category_id, category_parent, category_lft, category_rgt, category_level, product_count', 'numerical', 'integerOnly'=>true),
			array('vendor_name', 'length', 'max'=>20),
			array('category_name, category_photodir, category_pic1, category_pic2, category_pic3, category_pic4', 'length', 'max'=>255),
			array('category_review', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('vendor_name, vendor_id, category_id, category_name, category_review, category_photodir, category_parent, category_lft, category_rgt, category_level, category_pic1, category_pic2, category_pic3, category_pic4, product_count', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'vendor_name' => 'Vendor Name',
			'vendor_id' => 'Vendor',
			'category_id' => 'Category',
			'category_name' => 'Category Name',
			'category_review' => 'Category Review',
			'category_photodir' => 'Category Photodir',
			'category_parent' => 'Category Parent',
			'category_lft' => 'Category Lft',
			'category_rgt' => 'Category Rgt',
			'category_level' => 'Category Level',
			'category_pic1' => 'Category Pic1',
			'category_pic2' => 'Category Pic2',
			'category_pic3' => 'Category Pic3',
			'category_pic4' => 'Category Pic4',
			'product_count' => 'Product Count',
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

		$criteria->compare('vendor_name',$this->vendor_name,true);
		$criteria->compare('vendor_id',$this->vendor_id);
		$criteria->compare('category_id',$this->category_id);
		$criteria->compare('category_name',$this->category_name,true);
		$criteria->compare('category_review',$this->category_review,true);
		$criteria->compare('category_photodir',$this->category_photodir,true);
		$criteria->compare('category_parent',$this->category_parent);
		$criteria->compare('category_lft',$this->category_lft);
		$criteria->compare('category_rgt',$this->category_rgt);
		$criteria->compare('category_level',$this->category_level);
		$criteria->compare('category_pic1',$this->category_pic1,true);
		$criteria->compare('category_pic2',$this->category_pic2,true);
		$criteria->compare('category_pic3',$this->category_pic3,true);
		$criteria->compare('category_pic4',$this->category_pic4,true);
		$criteria->compare('product_count',$this->product_count);

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
        
        
}