<?php

/**
 * This is the model class for table "data".
 *
 * The followings are the available columns in table 'data':
 * @property string $id
 * @property integer $categ_id
 * @property string $family
 * @property string $lastname_fiance
 * @property string $firstname_fiance
 * @property string $secondname_fiance
 * @property string $lastname_wife
 * @property string $firstname_wife
 * @property string $secondname_wife
 * @property string $info
 * @property string $place
 * @property string $year_fiance
 * @property string $year_wife
 * @property string $wedding_year
 * @property string $footnote
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
			array('divorce_year, wedding_year', 'default','value'=> NULL),
							array('categ_id', 'required'),
							array('categ_id', 'numerical', 'integerOnly'=>true),
							array('family, lastname_fiance, firstname_fiance, secondname_fiance, lastname_wife, firstname_wife, secondname_wife', 'length', 'max'=>100),
							array('year_fiance, year_wife', 'length', 'max'=>20),
							array('divorce_year, wedding_year', 'length', 'max'=>4),
							array('info, place, footnote', 'safe'),
						// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, categ_id, family, lastname_fiance, firstname_fiance, secondname_fiance, lastname_wife, firstname_wife, secondname_wife, info, place, year_fiance, year_wife, divorce_year, wedding_year, footnote', 'safe', 'on'=>'search'),
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
					'family' => 'Фамилия семьи',
					'lastname_fiance' => 'Фамилия мужа',
					'firstname_fiance' => 'Имя мужа',
					'secondname_fiance' => 'Отчество мужа',
					'lastname_wife' => 'Фамилия жены',
					'firstname_wife' => 'Имя жены',
					'secondname_wife' => 'Отчество жены',
					'info' => 'Поисковые данные',
					'place' => 'Место регистрации',
					'year_fiance' => 'Возраст (год рождения) мужа',
					'year_wife' => 'Возраст (год рождения) жены',
					'wedding_year' => 'Год бракосочетания',
					'divorce_year' => 'Год развода',
					'footnote' => 'Примечание',
				);
	}

	public function getAllowLabels()
	{
		return array(
					'firstname_fiance' => 'Имя мужа',
					'secondname_fiance' => 'Отчество мужа',
					'firstname_wife' => 'Имя жены',
					'secondname_wife' => 'Отчество жены',
					'year_fiance' => 'Возраст (год рождения) мужа',
					'year_wife' => 'Возраст (год рождения) жены',
					'wedding_year' => 'Год бракосочетания',
					'divorce_year' => 'Год развода',
					'place' => 'Место регистрации',	 
					'info' => 'Поисковые данные',		
					'footnote' => 'Примечание',    		    
		);
	}

}
