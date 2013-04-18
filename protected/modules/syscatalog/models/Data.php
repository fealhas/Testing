<?php

/**
 * This is the model class for table "data".
 *
 * The followings are the available columns in table 'data':
 * @property string $id
 * @property integer $categ_id
 * @property string $index
 * @property string $date_start
 * @property string $date_finish
 * @property string $rubric
 * @property string $subrubric
 * @property string $place
 * @property string $contents
 * @property string $namearh
 * @property string $namefond
 * @property string $numfond
 * @property string $numinventory
 * @property string $bookinventory
 * @property string $numbook
 * @property string $sheets
 * @property string $lang
 * @property string $method_copy
 * @property string $info
 * @property string $depository
 * @property string $LL
 * @property string $inventory
 * @property string $case
 * @property string $part
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
			array('datebegin, dateend, contents','default','value'=>NULL),
							array('categ_id', 'required'),
							array('categ_id', 'numerical', 'integerOnly'=>true),
							array('case', 'length', 'max'=>20),
							array('rubric, subrubric, place, namearh, bookinventory, sheets, lang, method_copy, depository, LL', 'length', 'max'=>255),
							array('index', 'length', 'max'=>200),
							array('namefond', 'length', 'max'=>150),
							array('numfond, numinventory, numbook', 'length', 'max'=>60),
							array('inventory', 'length', 'max'=>10),
							array('part', 'length', 'max'=>2),
							array('datebegin, dateend, contents, info', 'safe'),
						// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, categ_id, index, datebegin, dateend, rubric, subrubric, place, contents, namearh, namefond, numfond, numinventory, bookinventory, numbook, sheets, lang, method_copy, info, depository, LL, inventory, case, part', 'safe', 'on'=>'search'),
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
					'index' => 'Индекс',
					'datebegin' => 'Дата начала',
					'dateend' => 'Дата окончания',
					'rubric' => 'Рубрика',
					'subrubric' => 'Подрубрика',
					'place' => 'Место события',
					'contents' => 'Содержание',
					'namearh' => 'Название архива',
					'namefond' => 'Название фонда',
					'lang' => 'Язык документа',
					'method_copy' => 'Способ воспроизведение',
					'info' => 'Примечание',
					'depository' => 'Фонд',
					'LL' => 'Л.л.',
					'inventory' => 'Опись',
					'case' => 'Дело',
					'part' => 'Том',
					'depository' => 'Номер хранилища (топография)',
					'numfond' => 'Фонд',
					'numinventory' => 'Опись',
					'bookinventory' => 'Дело',
					'numbook' => 'Том',
					'sheets' => 'Л.л.',
				);
	}

	public function getAllowLabels()
	{
		return array(
					'index' => 'Индекс',
					'datebegin' => 'Дата начала',
					'dateend' => 'Дата окончания',
					'rubric' => 'Рубрика',
					'subrubric' => 'Подрубрика',
					'place' => 'Место события',
					'contents' => 'Содержание',
					'namearh' => 'Название архива',
					'namefond' => 'Название фонда',
					'lang' => 'Язык документа',
					'method_copy' => 'Способ воспроизведение',
					'info' => 'Примечание',
					'depository' => 'Номер хранилища (топография)',
					'numfond' => 'Фонд',
					'numinventory' => 'Опись',
					'bookinventory' => 'Дело',
					'numbook' => 'Том',
					'sheets' => 'Л.л.',
		);
	}

}
