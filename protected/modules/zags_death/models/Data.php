<?php

/**
 * This is the model class for table "data".
 *
 * The followings are the available columns in table 'data':
 * @property string $id
 * @property integer $categ_id
 * @property string $lastname
 * @property string $firstname
 * @property string $secondname
 * @property string $place
 * @property string $age
 * @property string $info
 * @property string $footnote
 * @property string $deathday
**/

class Data extends StdModel
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return  Data the static model class
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
		return 'data';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('deathday', 'default','value'=> NULL),
							array('categ_id', 'required'),
							array('categ_id', 'numerical', 'integerOnly'=>true),
							array('lastname, firstname, secondname', 'length', 'max'=>100),
							array('age', 'length', 'max'=>20),
							array('deathday', 'length', 'max'=>4),
							array('place, info, footnote', 'safe'),
						// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, categ_id, lastname, firstname, secondname, place, age, info, footnote, deathday', 'safe', 'on'=>'search'),
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
					'id' => 'ID',
					'categ_id' => 'Categ',
					'lastname' => 'Фамилия',
					'firstname' => 'Имя',
					'secondname' => 'Отчество',
					'place' => 'Место регистрации',
					'age' => 'Возраст (год рождения)',
					'info' => 'Поисковые данные',
					'footnote' => 'Примечание',
					'deathday' => 'Год смерти',
				);
	}

	public function getAllowLabels()
	{
		return array(
		     
					'firstname' => 'Имя',
					'secondname' => 'Отчество',
					'deathday' => 'Год смерти',
					'place' => 'Место регистрации',	
					'info' => 'Поисковые данные',	
					'footnote' => 'Примечание',    		    
		);
	}

}
