<?php

/**
 * This is the model class for table "visits".
 *
 * The followings are the available columns in table 'visits':
 * @property string $id
 * @property string $user_id
 * @property string $visit_date
**/

class Visits extends StdModel
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
		return 'visits';
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
				array('user_id', 'required'),
				array('user_id', 'numerical', 'integerOnly'=>true),
						// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, visit_date', 'safe', 'on'=>'search'),
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
		 'user'=>array(self::BELONGS_TO, 'Data', 'user_id'),
				);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
					'id' => 'ID',
					'user_id' => 'User_ID',
					'visit_date' => 'Дата посещения',
				);
	}

	public function getAllowLabels()
	{
		return array(					
					'id' => 'ID',
					'user_id' => 'User_ID',
					'visit_date' => 'Дата посещения', 		    
		);
	}

}
