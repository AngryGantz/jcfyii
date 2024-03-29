<?php

/**
 * This is the model class for table "catalog_vendor".
 *
 * The followings are the available columns in table 'catalog_vendor':
 * @property integer $vendor_id
 * @property string $vendor_name
 * @property string $vendor_review
 * @property string $vendor_logo
 *
 * The followings are the available model relations:
 * @property CatalogProduct[] $catalogProducts
 */
class JVendor extends CActiveRecord
{
        /**
        * Название сущности модели в нескольких падежах и числах 
        *  функция возвращает по параметру-числу 
        *  Сколько?  1 продукт, 2 продукта, 5  продуктов 
        *  Управление чем? 6 продуктом 7 продуктами
        *  Множественное 8 продукты
        * Используется при построении меню представлений.
        */
        public $namesubj = array('Вендор','Вендора','Вендоров','Вендором','Вендорами','Вендоры');
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return JVendor the static model class
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
		return 'catalog_vendor';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('vendor_name, vendor_logo', 'length', 'max'=>20),
			array('vendor_review', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('vendor_id, vendor_name, vendor_review, vendor_logo', 'safe', 'on'=>'search'),
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
			'catalogProducts' => array(self::HAS_MANY, 'CatalogProduct', 'product_vendor'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'vendor_id' => 'id',
			'vendor_name' => 'Название',
			'vendor_review' => 'Описание',
			'vendor_logo' => 'Лого',
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

		$criteria->compare('vendor_id',$this->vendor_id);
		$criteria->compare('vendor_name',$this->vendor_name,true);
		$criteria->compare('vendor_review',$this->vendor_review,true);
		$criteria->compare('vendor_logo',$this->vendor_logo,true);

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