<?php
class DefaultController extends Controller
{
	public $layout=	'//layouts/top';
	public $dictCtrlViewPath = 'application.modules.zal.views.dictionary';
	
	public function actionIndex()
	{
		$this->render('index');
	}
	
	public function encrypting($string="") {
		$hash = Yii::app()->getModule('user')->hash;
		if ($hash=="md5")
			return md5($string);
		if ($hash=="sha1")
			return sha1($string);
		else
			return hash($hash,$string);
	}

	public function actionCleanFunds(){
		if((isset($_POST['go']))==1){
			$connection=new CDbConnection('pgsql:host=10.2.55.15;port=5432;dbname=zal','postgres','gugaoo2007');
			$sql='update data set funds=null;';
			$cleanf=$connection->createCommand($sql);
			$rowCount=$cleanf->execute();
		}
		Yii::app()->end();
	}	
	public function actionCleanLog(){
		if((isset($_POST['go']))==1){
			$connection=new CDbConnection('pgsql:host=10.2.55.15;port=5432;dbname=zal','postgres','gugaoo2007');
			$sql='delete from visits;';
			$cleanf=$connection->createCommand($sql);
			$rowCount=$cleanf->execute();
		}
		Yii::app()->end();
	}	
	
	public function actionInsertFunds(){
		if(isset($_POST['newFunds'])){
			$criteria=new CDbCriteria;
			$criteria->condition='id = :id'; 
			$criteria->params[':id']=$_POST['id'];  
			$bom = Data::model()->find($criteria)->getAttribute('funds');
			$zog = (int)$_POST['newFunds'];
			$newFunds = ($zog+$bom);
			$addData = Data::model()->find($criteria);
			$addData->funds = $newFunds;
			$addData->save();
			echo $newFunds;
		}
		Yii::app()->end();
	}
	
	public function actionInsertVisit(){
		if(isset($_POST['newVisit'])){
			if(($newVisit = Visits::model()->findByAttributes(array('user_id'=>$_POST['id'], 'visit_date'=>$_POST['newVisit'])))===null){
				$newVisit = new Visits;
				$newVisit->user_id = $_POST['id'];
				$newVisit->visit_date = $_POST['newVisit'];
				$newVisit->save();
			}
			echo 'Ok';
		}
		Yii::app()->end();
	}

	public function actionSearchDates(){
		if(isset($_POST['user_id'])){
			$dataProv = Visits::model()->findAllByAttributes(array('user_id'=>$_POST['user_id']));
			$this->renderPartial('search_result',array(
                        	'dataProvider'=>$dataProv,
                                ));
		}
		Yii::app()->end();
	}
	

	public function actionGetFunds(){
		$user = Data::model()->findByPk($_POST['id']);
		echo $user->funds;
	}

	public function actionLog(){
		$condition='';
		if ($_POST['dateFrom']!='' && $_POST['dateTo']!=''){
			$condition = 't.visit_date >= \''.$_POST['dateFrom'].'\' AND t.visit_date <= \''.$_POST['dateTo'].'\'';
		} else if($_POST['dateFrom']!=''){
			$condition = 't.visit_date >= \''.$_POST['dateFrom'].'\'';
		} else if($_POST['dateTo']!=''){
			$condition = 't.visit_date <= \''.$_POST['dateTo'].'\'';
		}
		$Criteria = new CDbCriteria;
		$Criteria->addCondition($condition, 'AND');
 		$categsId = !empty($_POST['cat_id']) ? $_POST['cat_id']: null;
		$Criteria->addInCondition('categ_id', $categsId);		
		$Criteria->order = 't.visit_date';
		$data = Visits::model()->with('user')->findAll($Criteria);

	
		$this->renderPartial('log_result',array(
                        	'dataProvider'=>$data,
                                ));
	}

	public function actionDocLog($dataStr){
		$data = json_decode($dataStr, true);
		$dateFrom = $data['dateFrom'];
		$dateTo = $data['dateTo'];
		$categId = $data['cat_id'];
		$condition='';
		if ($dateFrom!='' && $dateTo!=''){
			$condition = 't.visit_date >= \''.$dateFrom.'\' AND t.visit_date <= \''.$dateTo.'\'';
		} else if($dateFrom!=''){
			$condition = 't.visit_date >= \''.$dateFrom.'\'';
		} else if($dateTo!=''){
			$condition = 't.visit_date <= \''.$dateTo.'\'';
		}
		$Criteria = new CDbCriteria;
		$Criteria->addCondition($condition, 'AND');
 		$categsId = !empty($categId) ? $categId: null;
		$Criteria->addInCondition('categ_id', $categsId);		
		$Criteria->order = 't.visit_date';
		$data = Visits::model()->with('user')->findAll($Criteria);

	
		$this->renderPartial('doclog_result',array(
                        	'dataProvider'=>$data,
                                ));
	}

	public function actionReport(){
	if (isset($_POST['cat_id'])) $categsId = !empty($_POST['cat_id']) ? $_POST['cat_id']: null;

	$tcondition='TRUE';
	
	$period='';
		if ($_POST['dateFrom']!='' && $_POST['dateTo']!=''){
			$period = 'За период с '.$_POST['dateFrom'].' по '.$_POST['dateTo'];
			$tcondition = 't.visit_date >= \''.$_POST['dateFrom'].'\' AND t.visit_date <= \''.$_POST['dateTo'].'\'';
		} else if($_POST['dateFrom']!=''){
			$period = 'За период с '.$_POST['dateFrom'].' по сей день';
			$tcondition = 't.visit_date >= \''.$_POST['dateFrom'].'\'';
		} else if($_POST['dateTo']!=''){
			$period = 'За период с начала работы по '.$_POST['dateTo'];
			$tcondition = 't.visit_date <= \''.$_POST['dateTo'].'\'';
		} else {$period = 'За все время работы';}
	$condition='TRUE';
		if ($_POST['dateFrom']!='' && $_POST['dateTo']!=''){
			$condition = 'visit_date >= \''.$_POST['dateFrom'].'\' AND visit_date <= \''.$_POST['dateTo'].'\'';
		} else if($_POST['dateFrom']!=''){
			$condition = 'visit_date >= \''.$_POST['dateFrom'].'\'';
		} else if($_POST['dateTo']!=''){
			$condition = 'visit_date <= \''.$_POST['dateTo'].'\'';
		}
		$allVisitId = array();
            if ($_POST['dateFrom']!='' && $_POST['dateTo']!=''){
				$allVisitId = Visits::model()->findAll(array(
    				'condition'=>'visit_date >= :dateFrom AND visit_date <= :dateTo',
    				'params'=>array(':dateFrom'=>$_POST['dateFrom'], ':dateTo'=>$_POST['dateTo']),
				));		
			     } else if($_POST['dateFrom']!=''){
				$allVisitId = Visits::model()->findAll(array(
    				'condition'=>'visit_date >= :dateFrom',
    				'params'=>array(':dateFrom'=>$_POST['dateFrom']),
				));
			     } else if($_POST['dateTo']!=''){
				$allVisitId = Visits::model()->findAll(array(
    				'condition'=>'visit_date <= :dateTo',
    				'params'=>array(':dateTo'=>$_POST['dateTo']),
				));
			     }
			$visitIdArr = array();
			    foreach ($allVisitId as $param=>$val){
			        $visitIdArr[] = $val->user_id;
			    } // нужно удалить повторяющиеся элементы
			   $visitIdArr = !empty($visitIdArr) ? $visitIdArr: null;
		
		// юзеры из Data с искомым categ_id
		$criteria = new CDbCriteria;
		$criteria->addInCondition('categ_id', $categsId);
		$allCategId = Data::model()->findAll($criteria);
		$categIdArr = array();
			    foreach ($allCategId as $param=>$val){
			        $categIdArr[] = $val->id;
			    }
			   $categIdArr = !empty($categIdArr) ? $categIdArr: null;		
		    
	// $categsId - массив искомых categ_id. Используется для Data
	// $categIdArr - массив id юзеров с искомым значением categ_id. Используется в Visits
	// $visitIdArr  - массив id юзеров с искомым значением visit_date

	// кол-во посещений
		$criteria = new CDbCriteria;
		$criteria->addCondition($condition,'AND');
		if (!empty($visitIdArr)) $criteria->addInCondition('user_id',$visitIdArr);
		$criteria->addInCondition('user_id',$categIdArr);
		$visits = Visits::model()->findAll($criteria);
  		$totalVisits = count($visits);
	// кол-во посетителей
		$criteria=new CDbCriteria;
		//$criteria->select='COUNT(DISTINCT user_id) as user_id';
		$criteria->condition=$condition;
		if (!empty($visitIdArr)) $criteria->addInCondition('id',$visitIdArr);
		$criteria->addInCondition('categ_id',$categsId);
		$visitors = Data::model()->findAll($criteria);
		$totalVisitors = count($visitors);
	// кол-во новых посетителей
		$criteria=new CDbCriteria;
		//$criteria->select='COUNT(DISTINCT user_id) as user_id';
		$criteria->condition='time LIKE :n';
		$criteria->params = array(':n'=>'%н%');
		if (!empty($visitIdArr)) $criteria->addInCondition('id',$visitIdArr);
		$criteria->addInCondition('categ_id',$categsId);
		//if ($_POST['dateFrom']!='') {$dateFrom=$_POST['dateFrom'];} else {$dateFrom='01/01/0001';}
		//if ($_POST['dateTo']!='') {$dateTo=$_POST['dateTo'];} else {$dateTo='01/01/9999';}
		//$newVisitors = Data::model()->findAllBySql(
		//	'SELECT DISTINCT visits.user_id FROM visits INNER JOIN data ON data.id=visits.user_id 
		//	WHERE data.time LIKE :n AND visits.visit_date >= :datefrom AND visits.visit_date <= :dateto',
		//	array(':n'=>'%н%', ':dateto'=>$dateTo, ':datefrom'=>$dateFrom)
		//	);
		$newVisitors = Data::model()->findAll($criteria);
		$totalNewVisitors = count($newVisitors);	
	// кол-во родословная
		$criteria = new CDbCriteria;
		$criteria->condition = 'goal LIKE :curGoal AND '.$tcondition;
		$criteria->params = array(':curGoal'=>'%родословн%');
		if (!empty($visitIdArr)) $criteria->addInCondition('t.user_id',$visitIdArr);
		$criteria->addInCondition('t.user_id',$categIdArr);
		$rodosl = Visits::model()->with('user')->findAll($criteria);
		$totalRodosl=count($rodosl);
	// кол-во научная
		$criteria = new CDbCriteria;
		$criteria->condition = 'goal LIKE :curGoal AND '.$tcondition;
		$criteria->params = array(':curGoal'=>'%научн%');
		if (!empty($visitIdArr)) $criteria->addInCondition('t.user_id',$visitIdArr);
		$criteria->addInCondition('t.user_id',$categIdArr);
		$science = Visits::model()->with('user')->findAll($criteria);
		$totalScience=count($science);
	// кол-во народохоз
		$criteria = new CDbCriteria;
		$criteria->condition = 'goal LIKE :curGoal AND '.$tcondition;
		$criteria->params = array(':curGoal'=>'%народохоз%');
		if (!empty($visitIdArr)) $criteria->addInCondition('t.user_id',$visitIdArr);
		$criteria->addInCondition('t.user_id',$categIdArr);
		$narhoz = Visits::model()->with('user')->findAll($criteria);
		$totalNarhoz=count($narhoz);
	// кол-во запросов в фонд
		$criteria=new CDbCriteria;
		$criteria->select=array('sum(funds) as funds');
  		if (!empty($visitIdArr)) $criteria->addInCondition('id', $visitIdArr);
		$criteria->addInCondition('categ_id', $categsId);
		$totalFund = Data::model()->find($criteria)->getAttribute('funds');
		
		
		$this->renderPartial('report_result',array(
                        	'totalVisits'=>$totalVisits,
				'totalVisitors'=>$totalVisitors,
				'totalNewVisitors'=>$totalNewVisitors,
				'totalFund'=>$totalFund,
				'totalRodosl'=>$totalRodosl,
				'totalScience'=>$totalScience,
				'totalNarhoz'=>$totalNarhoz,
				'period'=>$period,
                                ));
	}


	public function actionSetPassword(){
		$attr = array(
			'username' => $_POST['username'],
			'password' => $this->encrypting($_POST['password']),
			'email' => 'u'.$_POST['username'].'@usermail.iaoo.ru',
			'status' => '1',
			'superuser' => '0',			
		);		
		$attrib = array (
			'user_id' => '1000',
			'lastname' => $_POST['lastname'],
			'firstname' => $_POST['firstname'],
		);
		Yii::app()->getModule('user');
		if(($model=UserReg::model()->findByAttributes(array('username'=>$_POST['username'])))===null){
			$model = new UserReg;
			$profile=new Profile;
		}else{
			$profile=Profile::model()->findByAttributes(array('user_id'=>$model->id));
		}
			
			
		if($model->isNewRecord){
			$model->attributes = $attr;	
			$profile->attributes = $attrib;
			if ($model->save()) {
				$profile->user_id=$model->id;
				//$data = Data::model()->findByPk($_POST['id']);
				//$profile->lastname=$data->lastname;
				//echo "model saved";
				$profile->save();
				//echo "profile saved";
				$auth = Yii::app()->authManager;
				$auth->assign('Читатель (исследователь)' ,$model->id);
				Yii::app()->end();
			}		
		}else{
			$model->password = $this->encrypting($_POST['password']);
			if ($model->save()) {
				//echo "Ok"; 
				Yii::app()->end();
			}
			$model->attributes = $attr;	
				$auth = Yii::app()->authManager;
				$auth->assign('Читатель (исследователь)' ,$model->id);
				Yii::app()->end();
		}		
		echo strip_tags(CHtml::errorSummary($model));
		Yii::app()->end();
	}
	
	public function actionSetProfile(){
		$attr = array(
			'lastname' => $_POST['lastname'], 
		);		
		Yii::app()->getModule('user');
		$model = new UserPro;
		if ($model->save()) {
			echo "Kk"; 
			Yii::app()->end();
		}
		Yii::app()->end();
	}
}
