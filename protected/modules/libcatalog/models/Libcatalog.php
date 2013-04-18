<?php

/**
 * This is the model class for table "data".
 *
 * The followings are the available columns in table 'data':
 * @property string $id
 * @property integer $categ_id
 * @property string $subrubric
 * @property string $info
 * @property string $history_period
 * @property string $index
 * @property string $rubric
 * @property string $year
 * @property string $type_public
 * @property string $author
 * @property string $name_public
 * @property string $annotation
 * @property string $yaer_name_public
 * @property string $number
 * @property string $source
 * @property string $language
 * @property string $marks
 * @property string $signature
 * @property string $rack
 * @property string $locker
 * @property string $board
 */
class Libcatalog extends StdModel
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Data the static model class
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
			// array('categ_id', 'required'),
			// array('categ_id', 'numerical', 'integerOnly'=>true),
			// array('subrubric, index, name_public, yaer_name_public', 'length', 'max'=>255),
			// array('history_period, source', 'length', 'max'=>50),
			// array('rubric, author, signature, board', 'length', 'max'=>100),
			// array('type_public, number, language', 'length', 'max'=>30),
			// array('marks, rack, locker', 'length', 'max'=>10),
   //                      array('year', 'default','value'=> NULL),
			// //array('info, year, annotation', 'safe'),
			array('year', 'default','value'=> NULL),
            array('categ_id, subrubric, info, history_period, upindex, subindex, rubric, year, type_public, author, name_public, annotation, yaer_name_public, number, source, language, marks, signature, rack, locker, board','safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, categ_id, subrubric, info, history_period, upindex, subindex, rubric, year, type_public, author, name_public, annotation, yaer_name_public, number, source, language, marks, signature, rack, locker, board', 'safe', 'on'=>'search'),
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
	/*public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'categ_id' => 'Categ',
			'subrubric' => 'Subrubric',
			'info' => 'Info',
			'history_period' => 'History Period',
			'index' => 'Index',
			'rubric' => 'Rubric',
			'year' => 'Year',
			'type_public' => 'Type Public',
			'author' => 'Author',
			'name_public' => 'Name Public',
			'annotation' => 'Annotation',
			'yaer_name_public' => 'Yaer Name Public',
			'number' => 'Number',
			'source' => 'Source',
			'language' => 'Language',
			'marks' => 'Marks',
			'signature' => 'Signature',
			'rack' => 'Rack',
			'locker' => 'Locker',
			'board' => 'Board',
		);
	}*/
	public function attributeLabels()
	{
		return array(
			'subrubric' => 'Подрубрика',
			'info' => 'Примечание',
			'history_period' => 'Исторический период',
			'upindex' => 'Верхний индекс',
			'subindex'=> 'Нижний индекс',
			'rubric' => 'Рубрика',
			'year' => 'Год поступления',
			'type_public' => 'Вид издания',
			'author' => 'Автор',
			'name_public' => 'Название издания',
			'annotation' => 'Аннотация',
			'yaer_name_public' => 'Место и год издания',
			'number' => 'Инвентрный №',
			'source' => 'Источник поступления',
			'language' => 'Язык экземпляра',
			'marks' => 'Отметки',
			'signature' => 'Наличие автографа, дарственной подписи',
			'rack' => 'Стеллаж',
			'locker' => 'Шкаф',
			'board' => 'Полка',
		);
	}
	public function getAllowLabels()
	{
		return array(
			'subrubric' => 'Подрубрика',
			'info' => 'Примечание',
			'history_period' => 'Исторический период',
			'upindex' => 'Верхний индекс',
			'subindex' => 'Нижний индекс',
			'rubric' => 'Рубрика',
			'year' => 'Год поступления',
			'type_public' => 'Вид издания',
			'author' => 'Автор',
			'name_public' => 'Название издания',
			'annotation' => 'Аннотация',
			'yaer_name_public' => 'Место и год издания',
			'number' => 'Инвентрный №',
			'source' => 'Источник поступления',
			'language' => 'Язык экземпляра',
			'marks' => 'Отметки',
			'signature' => 'Наличие автографа, дарственной подписи',
			'rack' => 'Стеллаж',
			'locker' => 'Шкаф',
			'board' => 'Полка',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	// public function search()
	// {
	// 	// Warning: Please modify the following code to remove attributes that
	// 	// should not be searched.

	// 	$criteria=new CDbCriteria;

	// 	$criteria->compare('id',$this->id,true);
	// 	$criteria->compare('categ_id',$this->categ_id);
	// 	$criteria->compare('subrubric',$this->subrubric,true);
	// 	$criteria->compare('info',$this->info,true);
	// 	$criteria->compare('history_period',$this->history_period,true);
	// 	$criteria->compare('index',$this->index,true);
	// 	$criteria->compare('rubric',$this->rubric,true);
	// 	$criteria->compare('year',$this->year,true);
	// 	$criteria->compare('type_public',$this->type_public,true);
	// 	$criteria->compare('author',$this->author,true);
	// 	$criteria->compare('name_public',$this->name_public,true);
	// 	$criteria->compare('annotation',$this->annotation,true);
	// 	$criteria->compare('yaer_name_public',$this->yaer_name_public,true);
	// 	$criteria->compare('number',$this->number,true);
	// 	$criteria->compare('source',$this->source,true);
	// 	$criteria->compare('language',$this->language,true);
	// 	$criteria->compare('marks',$this->marks,true);
	// 	$criteria->compare('signature',$this->signature,true);
	// 	$criteria->compare('rack',$this->rack,true);
	// 	$criteria->compare('locker',$this->locker,true);
	// 	$criteria->compare('board',$this->board,true);

	// 	return new CActiveDataProvider($this, array(
	// 		'criteria'=>$criteria,
	// 	));
	// }
}
