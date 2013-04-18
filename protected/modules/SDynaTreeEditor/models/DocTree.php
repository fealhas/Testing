<?php

/**
 * This is the model class for table "{{categories}}".
 *
 * The followings are the available columns in table '{{categories}}':
 * @property integer $id
 * @property integer $parent_id
 * @property string $caption
 * @property string $info
 * @property integer $orderstate
 * @property string $type
 * @property string $password
 * @property integer $af_idf
 * @property integer $af_ido
 */
class DocTree extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return DocTree the static model class
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
			array('parent_id, orderstate, af_idf, af_ido', 'numerical', 'integerOnly'=>true),
			array('type', 'length', 'max'=>5),
			array('password', 'length', 'max'=>32),
			array('type, caption, info, role', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, parent_id, caption, info, orderstate, type, password, af_idf, af_ido', 'safe', 'on'=>'search'),
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
			'caption' => 'Название: ',
			'info' => 'Примечание: ',
			'orderstate' => 'Orderstate',
			'type' => 'Type',
			'password' => 'Password',
			'af_idf' => 'Af Idf',
			'af_ido' => 'Af Ido',
                        'role' => 'Роль'
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
		$criteria->compare('password',$this->password,true);
		$criteria->compare('af_idf',$this->af_idf);
		$criteria->compare('af_ido',$this->af_ido);

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
					
					if (strcmp('dir', trim($model->type))==0)
						$isDir = true;
					else
						$isDir = false;
					
					$tree[$model['parent_id']][]=array(
						'title'=>$model->caption,
						'id'=>$model->id,
						'key'=>$model->id,
						'parent_id'=>$model->parent_id,
						'isFolder'=>$isDir,
						'expand'=>true,
                                                'orderstate'=>$model->orderstate,
					);
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
		    if ($childrens) 
                    {
                        $node['children']= $childrens;
                    }
		    $result[]=$node;
		}
	    }
	    return $result;
	}
        
        //insertion sort
        public function sortNodes ($nodes)
        {
            $length = count($nodes);
            $tmp = null;
            
            for ($i=1; $i<$length; $i++)
            {
                $j=$i;
                while ($j>0 && $nodes[$j-1]['orderstate']>$nodes[$j]['orderstate'])
                {
                    $tmp = $nodes[$j];
                    $nodes[$j]=$nodes[$j-1];
                    $nodes[$j-1]=$tmp;
                    $j--;
                }
            }
            
            print_r($nodes);
            
            return $nodes;
        }
	
	public function treeSearch ($tree)
	{
		$this->treeDFS($tree['children']);
		//Yii::app()->cache->set('doc_tree',$tree);
	}
	
	/*
	 Обход графа в глубину
	*/
	public function treeDFS (&$tree)
	{
		static $used_nodes;
		
		foreach ($tree as $node)
		{
			if (!isset($used_nodes[$node['id']]))
			{
				if (isset($node['change_state']))
				{
					switch ($node['change_state'])
					{
						case 'removed':
							$this->removeNode($node);
							break;
						case 'replaced':
							$this->updateNode($node);
							break;
						case 'copied':
							$this->copyNode($node);
							break;
					}
				}
				
				$used_nodes[$node['id']]=true;
				if (isset($node['children']))
					$this->treeDFS($node['children']);
			}
		}
	}
	
	public function updateNode($node)
	{
		$model = $this->findByPk($node['id']);
		
		if (!is_null($model))
		{
			$model->parent_id = $node['parent_id'];
                        $model->orderstate = $node['orderstate'];
			$model->save();
		}
	}
	
	public function removeNodes ($nodes)
	{
		if (is_array($nodes))
		{
			foreach ($nodes as $node_id)
			{
				$criteria = new CDbCriteria();
				$criteria->compare('id', $node_id, false, 'OR');
				$criteria->compare('parent_id', $node_id, false, 'OR');
				$this->deleteAll($criteria);
			}
		}
	}
	
	public function copyNode ($node)
	{
		$new_model = new DocTree ();
		$src_model = clone $this->findByPk($node['id']);
			
		$new_model->caption = $node['title'];
		$new_model->parent_id = $node['parent_id'];
		//$new_model->info =  $src_model->info;
		var_dump($node);
		exit();
		$new_model->save();
		
		
	}
        
        public function getDbConnection ()
        {
            $moduleName = Yii::app()->getModule('SDynaTreeEditor')->curModule;
            $connName = 'db_'.$moduleName;
            return Yii::app()->$connName;
            //return Yii::app()->db_author_index;
        }
}