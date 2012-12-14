<?php

/**
 * This is the model class for table "catalog_photo".
 *
 * The followings are the available columns in table 'catalog_photo':
 * @property integer $photo_id
 * @property integer $photo_idproduct
 * @property string $photo_name
 *
 * The followings are the available model relations:
 * @property CatalogProduct $photoIdproduct
 */
class JPhoto extends CActiveRecord
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
	 * @return JPhoto the static model class
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
		return 'catalog_photo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('photo_idproduct', 'numerical', 'integerOnly'=>true),
			array('photo_name', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('photo_id, photo_idproduct, photo_name', 'safe', 'on'=>'search'),
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
			'Product' => array(self::BELONGS_TO, 'JProduct', 'photo_idproduct'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'photo_id' => 'Photo',
			'photo_idproduct' => 'Photo Idproduct',
			'photo_name' => 'Photo Name',
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

		$criteria->compare('photo_id',$this->photo_id);
		$criteria->compare('photo_idproduct',$this->photo_idproduct);
		$criteria->compare('photo_name',$this->photo_name,true);

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