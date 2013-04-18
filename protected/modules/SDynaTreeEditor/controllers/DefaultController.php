<?php

class DefaultController extends Controller
{
	public $layout = '//layouts/tree_editor';
	
	public function actionIndex()
	{
		$this->render('index');
	}
	
	
}