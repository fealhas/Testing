<?php

/**
 * This is the model class for table "data".
 *
 * The followings are the available columns in table 'data':
 * @property string $id
 * @property string $fund
 * @property string $inventory
 * @property integer $tom
 * @property integer $case
 * @property string $sheet
 * @property integer $year1
 * @property integer $year2
 * @property string $type
 * @property integer $categ_id
 * @property string $rubric
 * @property string $text
 * @property string $path
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
			array('year1, year2', 'default', 'value' => NULL),
							array('categ_id, year1, year2', 'numerical', 'integerOnly'=>true),
							array('case, tom', 'length', 'max'=>20),
							array('fund, inventory, sheet, path, footnote', 'length', 'max'=>250),
							array('type, rubric', 'length', 'max'=>500),
							array('text', 'length', 'max'=>1000),
						// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, fund, inventory, tom, case, sheet, year1, year2, type, categ_id, rubric, text, path', 'safe', 'on'=>'search'),
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
				'rubric' => 'Рубрика/подрубрика',
				'type' => 'Описание ед. хр.',
				'sheet' => '№ ед.хр. (Л.л.)',	
				'text' => 'Аннотация',
				'footnote' => 'Примечание',
				'categ_id' => 'Categ',
				'year1' => 'Год с',		     
				'year2' => 'Год по',
				'fund' => 'Фонд',		     
				'inventory' => 'Опись',	
				'case' => 'Дело',		 	     
				'tom' => 'Том',	
				'path' => 'Путь',	
				);
	}

	public function getAllowLabels()
	{
		return array(	     
				'rubric' => 'Рубрика/подрубрика',	
				'type' => 'Описание ед. хр.',		
				'text' => 'Аннотация',
				'sheet' => '№ ед.хр. (Л.л.)',		   
				'year1' => 'Год с',		     
				'year2' => 'Год по',
				'fund' => 'Фонд',		     
				'inventory' => 'Опись',	
				'case' => 'Дело',		 	     
				'tom' => 'Том',
				'footnote' => 'Примечание',		     	      		    
		);
	}

}
