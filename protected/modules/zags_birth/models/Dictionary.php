<?php

/**
 * This is the model class for table "dictionary".
 *
 * The followings are the available columns in table 'dictionary':
 * @property integer $id
 * @property string $values
 * @property string $name
 * @property string $element
**/

class Dictionary extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return  Dictionary the static model class
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
		return 'dictionary';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
							array('id, name', 'required'),
							array('id', 'numerical', 'integerOnly'=>true),
							array('values, element', 'safe'),
						// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, values, name, element', 'safe', 'on'=>'search'),
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
					'values' => 'Values',
					'name' => 'Name',
					'element' => 'Element',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('values',$this->values,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('element',$this->element,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	/*
	 Функция возвращает все словари в виде array[элемент привязки]=
	 массив значений этого словаря
	*/
	public function getAllDictionaries ()
	{
		$result = Yii::app()->cache->get("dict");

		if ($result===false){
			$dict = $this->findAll();
			
			if (is_array($dict)){
				foreach ($dict as $value){
					$result[$value->element] =  unserialize($value->values);
				}
			}
			
			Yii::app()->cache->set("dict", $result);
		}
		
		return $result;
	}
	
	/*
	 Обновляем кэш
	 @param string $dict_name - элемент, к которому привязан словарь
	 @param array $values - значения словаря
	*/
	public function updateCache ($dict_name, $values)
	{
		$result = Yii::app()->cache->get("dict");

		if ($result===false){
			$dict = $this->findAll();
			
			if (is_array($dict)){
				foreach ($dict as $value){
					$result[$value->element] =  unserialize($value->values);
				}
			}
			
			Yii::app()->cache->set("dict", $result);
		}else{		
			$result[$dict_name] =  $values;
			Yii::app()->cache->set("dict", $result);
		}
	}
	
	
	/*
	 Получаем словарь элемента
	*/
	
	public function getDictByElem ($elem)
	{
		
	}
	
	public function getDbConnection ()
        {
            return Yii::app()->db_zags_birth;
        }

}