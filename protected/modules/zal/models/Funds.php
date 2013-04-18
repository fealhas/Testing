<?php

/**
 * This is the model class for table "funds".
 *
 * The followings are the available columns in table 'funds':
 * @property string $id
 * @property string $user_id
 * @property string $funds
**/

class Funds extends StdModel
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
				array('funds','default','value' => null),
		);
	}

	public function attributeLabels()
	{
		return array(
					'funds' => 'Количество выданных ед.хр.',
				);
	}

	public function getAllowLabels()
	{
		return array(					
					'funds' => 'Количество выданных ед.хр.', 		    
		);
	}

}
