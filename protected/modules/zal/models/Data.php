<?php

/**
 * This is the model class for table "data".
 *
 * The followings are the available columns in table 'data':
 * @property string $id
 * @property string $case
 * @property string $time
 * @property string $visit_date
 * @property string $lastname
 * @property string $first_second_name
 * @property string $dolzhn
 * @property string $komandirovan
 * @property string $theme
 * @property string $goal
 * @property string $place
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
				array('visit_date','default','value' => NULL),
							array('categ_id', 'required'),
							array('categ_id', 'numerical', 'integerOnly'=>true),
							array('funds', 'numerical', 'integerOnly'=>true),
							array('case', 'length', 'max'=>20),
							array('time, lastname, first_second_name, dolzhn, komandirovan, goal, place', 'length', 'max'=>250),
							array('theme', 'length', 'max'=>2048),
							array('all_dates', 'length', 'max'=>500),
							array('visit_date, funds', 'safe'),
						// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, categ_id, case, time, visit_date, lastname, first_second_name, dolzhn, komandirovan, theme, goal, place, all_dates, funds', 'safe', 'on'=>'search'),
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
				'dates'=>array(self::HAS_MANY, 'Visits', 'user_id'),
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
					'case' => '№ личного дела',
					'time' => 'Время работы',
					'visit_date' => 'Дата посещения',
					'all_dates' => 'Дата посещения',
					'lastname' => 'Фамилия',
					'first_second_name' => 'Имя и отчество',
					'dolzhn' => 'Должность, ученая степень, звание',
					'komandirovan' => 'Кем командирован',
					'theme' => 'Тема исследования (название, хронологические рамки)',
					'goal' => 'Цель занятия',
					'place' => 'Место жительства',
					'funds' => 'Количество фондов'
				);
	}

	public function getAllowLabels()
	{
		return array(
			 
					'case' => '№ личного дела',
					'time' => 'Время работы',
					'dolzhn' => 'Должность, ученая степень, звание',
					'theme' => 'Тема исследования',
					'goal' => 'Цель занятия',
					'place' => 'Место жительства',	    		    
		);
	}

}
