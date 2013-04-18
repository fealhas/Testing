<?php
class DefaultController extends Controller
{
	public $layout=	'//layouts/top';
	public $dictCtrlViewPath = 'application.modules.zags_wedding.views.dictionary';
	
	public function actionIndex()
	{
		$this->render('index');
	}
}