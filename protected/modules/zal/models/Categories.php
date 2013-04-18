<?php

/**
 * This is the model class for table "categories".
 *
 * The followings are the available columns in table 'categories':
 * @property integer $id
 * @property integer $parent_id
 * @property string $caption
 * @property string $info
 * @property integer $orderstate
 * @property string $type
 * @property string $role
**/

class Categories extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return  Categories the static model class
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
		return 'categories';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
							array('parent_id, orderstate', 'numerical', 'integerOnly'=>true),
							array('type', 'length', 'max'=>5),
							array('role', 'length', 'max'=>64),
							array('caption, info', 'safe'),
						// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, parent_id, caption, info, orderstate, type, role', 'safe', 'on'=>'search'),
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
					'parent_id' => 'Parent',
					'caption' => 'Caption',
					'info' => 'Info',
					'orderstate' => 'Orderstate',
					'type' => 'Type',
					'role' => 'Role',
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
		$criteria->compare('parent_id',$this->parent_id);
		$criteria->compare('caption',$this->caption,true);
		$criteria->compare('info',$this->info,true);
		$criteria->compare('orderstate',$this->orderstate);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('role',$this->role,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	/*
	 Получаем дерево документов в виде необходимом
	 для компонента SDynaTree
	*/
	public function getDocTreeFormated()
	{
		//$tree = Yii::app()->cache->get('doc_tree');
		$tree = array();
		if (empty($tree)){
			
			$nodes = null;
                        
                        $criteria = new CDbCriteria();
                        $criteria->order = 'parent_id ASC, orderstate ASC';
			
                        $models = $this->findAll($criteria); 
			
			if (!empty($models)){
				foreach($models as $model){
                                    if ($this->checkNodeAccess($model->id)){
					$tree[$model['parent_id']][]=array(
						'title'=>$model->caption,
						'id'=>$model->id,
                                                'tooltip'=>$model->info,
						'key'=>$model->id,
						'parent_id'=>$model->parent_id,
						'isFolder'=>strcmp(trim($model->type),'dir')==0 ? true : false,
						'expand'=>true,
					);
                                    }
				}
				
				$tree = $this->buildTree($tree,0);
				
				Yii::app()->cache->set('doc_tree',$tree);
			}
			
			unset($models);
		}
		
		return $tree;
	}
	
	public function buildTree(&$tree,$root)
	{
	    $result=array();
	    if (isset($tree[$root]))
	    {
		foreach ($tree[$root] as $node)
		{
		    $childrens=$this->buildTree($tree,$node['id']);
		    if ($childrens) $node['children']=$childrens;
		    $result[]=$node;
		}
	    }
	    return $result;
	}
        
        public function getDbConnection ()
        {
            return Yii::app()->db_zal;
        }
        
            
        public function findNode($nodeName)
        {
            $c = new CDbCriteria;
            $condition = "caption ILIKE '%$nodeName%'";
            $c->addCondition($condition);
            return $this->find($c);
        }
        
        public function checkNodeAccess ($nodeId)
        {
           $isAccessed = true;
           
           if (($node = $this->findByPk($nodeId))!==null)
           {
               $usr = Yii::app()->user;
               if (!$usr->getIsSuperuser())
               {
                  $nodeRole = $node->role;
                  if (!empty($node->role)){
                   /*
                    * Получаем роль текущего пользователя
                    */
                   $rightsModule = Yii::app()->getModule('rights');
                   $auth = $rightsModule->getAuthorizer();

                   $usrRole = key($auth->getAuthItems(2, $usr->getId()));
                   
                   if (strstr($nodeRole,'с доступом к БД ДСП')!==false)
                   {
                       if (strstr($usrRole, 'с доступом к БД ДСП')===false)
                       {
                           $isAccessed = false;
                       }
                   }
                   if (strstr($nodeRole,'исследователь')===false)
                   {
                       if (strstr($usrRole, 'исследователь')!==false)
                       {
                           $isAccessed = false;
                       }
                   }
                  }
               }
           }
           else
               $isAccessed = false;
           
           return $isAccessed;
        }
}

