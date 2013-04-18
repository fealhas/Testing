<?php

/**
 * This is the model class for table "data".
 *
 * The followings are the available columns in table 'data':
 * @property string $id
 * @property string $historical_period
 * @property string $file_number
 * @property string $masthead
 * @property string $publish_date
 * @property string $newspaper_number
 * @property string $place_of_public
 * @property string $newspaper_lang
 * @property string $marks
 * @property string $footnote
 * @property string $rack
 * @property string $shelf
 * @property string $locker
 * @property integer $categ_id
 * @property string $lold
 * @property string $date_year3
 * @property string $date_year
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
							array('categ_id', 'numerical', 'integerOnly'=>true),
							array('historical_period', 'length', 'max'=>50),
							array('marks, file_number', 'length', 'max'=>20),
							array('masthead, publish_date, newspaper_number, place_of_public, lold', 'length', 'max'=>255),
							array('newspaper_lang', 'length', 'max'=>30),
							array('rack, shelf, locker', 'length', 'max'=>15),
							array('footnote, date_year3, date_year', 'safe'),
						// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, historical_period, file_number, masthead, publish_date, newspaper_number, place_of_public, newspaper_lang, marks, footnote, rack, shelf, locker, categ_id, lold, date_year3, date_year', 'safe', 'on'=>'search'),
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
					'historical_period' => 'Исторический период',
					'file_number' => 'Номер подшивки',
					'masthead' => 'Название газеты',
					'publish_date' => 'Дата издания',
					'newspaper_number' => 'Номер газеты',
					'place_of_public' => 'Орган и место издания',
					'newspaper_lang' => 'Язык подшивки (газеты)',
					'marks' => 'Отметки',
					'footnote' => 'Примечание',
					'rack' => 'Стеллаж',
					'shelf' => 'Полка',
					'locker' => 'Шкаф',
					'categ_id' => 'Categ',
					'lold' => 'Lold',
					'date_year3' => 'Год издания',
				);
	}

	public function getAllowLabels()
	{
		return array(
					'historical_period' => 'Исторический период',
					'file_number' => 'Номер подшивки',
					'masthead' => 'Название газеты',
					'publish_date' => 'Дата издания',
					'newspaper_number' => 'Номер газеты',
					'place_of_public' => 'Орган и место издания',
					'newspaper_lang' => 'Язык подшивки (газеты)',
					'marks' => 'Отметки',
					'footnote' => 'Примечание',
					'rack' => 'Стеллаж',
					'shelf' => 'Полка',
					'locker' => 'Шкаф',
					'date_year3' => 'Год издания',
				);
	}
	
	public function getDbConnection ()
        {
            return Yii::app()->db_newspaperfund;
        }

}
