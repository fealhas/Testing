<?php
class DefaultController extends Controller
{
	public $layout=	'//layouts/top';
	public $dictCtrlViewPath = 'application.modules.author_index.views.dictionary';
	
	public function actionIndex()
	{
		$this->render('index');
	}
}