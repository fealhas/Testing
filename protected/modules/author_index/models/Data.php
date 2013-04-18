<?php

/**
 * This is the model class for table "data".
 *
 * The followings are the available columns in table 'data':
 * @property string $id
 * @property integer $categ_id
 * @property string $fund_name
 * @property string $surname
 * @property string $name
 * @property string $fathername
 * @property string $occupation
 * @property string $keywords
 * @property string $info
 * @property string $date_start
 * @property string $date_finish
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
			array('date_start, date_finish','default','value' => NULL),
							array('categ_id', 'required'),
							array('categ_id', 'numerical', 'integerOnly'=>true),
							array('fund_name, keywords', 'length', 'max'=>255),
							array('surname, name, fathername, occupation', 'length', 'max'=>128),
							array('info, date_start, date_finish', 'safe'),
						// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, categ_id, fund_name, surname, name, fathername, occupation, keywords, info, date_start, date_finish', 'safe', 'on'=>'search'),
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
					'fund_name' => 'Сокращенное название фонда',
					'surname' => 'Фамилия',
					'name' => 'Имя',
					'fathername' => 'Отчество',
					'occupation' => 'Род занятий (должность)',
					'keywords' => 'Поисковые данные',
					'info' => 'Примечание',
					'date_start' => 'Дата начала',
					'date_finish' => 'Дата окончания',
				);
	}

	public function getAllowLabels()
	{
		return array(
					'fund_name' => 'Сокращенное название фонда',
					'surname' => 'Фамилия',
					'name' => 'Имя',
					'fathername' => 'Отчество',
					'occupation' => 'Род занятий (должность)',
					'keywords' => 'Поисковые данные',
					'info' => 'Примечание',
					'date_start' => 'Дата начала',
					'date_finish' => 'Дата окончания',    		    
		);
	}

}
