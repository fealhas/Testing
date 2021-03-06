<?php

class SDynaTreeEditorModule extends CWebModule
{
	public $defaultController = "DocTree";
	public $curModule = 'author_index';
        
	public $juiScriptUrl;
	/**
	* @property string The root URL that contains all JUI theme folders.
	* If NULL (default) the JUI package included with Yii is published and used to
	* infer the root theme URL. You should set this property if you intend to use
	* a theme that is not found in the JUI package included in Yii.
	* There must be a directory (case-sensitive) whose name is specified by
	* {@link juiTheme} under this URL.
	* Do not append any slash character to the URL.
	*/
	public $juiThemeUrl;
	/**
	* @property string The JUI theme name.
	* There must be a directory whose name is the same as this property value
	* (case-sensitive) under the URL specified by {@link juiThemeUrl}.
	*/
	public $juiTheme = 'base';
	/**
	* @property string The main JUI JavaScript file.
	* The file must exist under the URL specified by {@link juiScriptUrl}.
	* To include multiple script files (e.g. during development, to include
	* individual plugin script files rather than the minimized JUI script file),
	* set this property as an array of the script file names.
	* If === FALSE a JUI script file must be explicitly included, e.g. in the layout.
	*/
	public $juiScriptFile = 'jquery-ui.min.js';
	/**
	* @property mixed The JUI theme CSS file name.
	* The file must exist under the URL specified by
	* {@link juiThemeUrl}/{@link juiTheme}.
	* To include multiple theme CSS files (e.g. during development, to include
	* individual plugin CSS files), set this property as an array of the CSS file
	* names.
	* If === FALSE a JUI CSS file must be explicitly included, e.g. in the layout.
	*/
	public $juiCssFile = 'jquery-ui.css';
	/**
	* @property string The base script URL for all module resources (e.g. javascript,
	* CSS file, images).
	* If NULL (default) the integrated module resources (which are published as
	* assets) are used.
	*/
	public $baseScriptUrl;
	/**
	* @property string The URL of the CSS file used by this module.
	* If NULL (default) the integrated CSS file is used.
	* If === FALSE a CSS file must be explicitly included, e.g. in the layout.
	*/
	public $cssFile;
	/**
	* @property string The base URL used to access RBAM.
	* If NULL (default) the baseUrl is: '/parentModule1Id/…/parentModuleNId/rbam'.
	* Do not append any slash character to the URL.
	*/
	public $baseUrl;
	
	public $development = false;
	private $_cs;
	
	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'SDynaTreeEditor.models.*',
			'SDynaTreeEditor.controllers.*',
			'SDynaTreeEditor.components.SDynaTree.*',
		));
		
                $curMod = Yii::app()->user->getState('curModule');
                if ($curMod!==null)
                {
                    $this->curModule = $curMod;
                }
                
		$this->_setBaseUrl();
		$this->_publishCoreAssets();
		$this->_publishModuleAssets();
	}

	/**
	* Determine the base url from parent module(s)
	*/
	private function _setBaseUrl() {
		if (empty($this->baseUrl)) {
			$this->baseUrl='';
			$m = $this;
			do {
				$this->baseUrl = '/'.$m->getId().$this->baseUrl;
				$m = $m->getParentModule();
			} while (!is_null($m));
		}
		if (substr($this->baseUrl, -1)==='/') $this->baseUrl = substr($this->baseUrl, 0, -1);
	}
	
	/**
	* Publish jquery and JUI JavaScript files and the theme CSS file.
	*/
	private function _publishCoreAssets() {
		if (is_null($this->_cs))
			$this->_cs = Yii::app()->getClientScript();

		/**
		* Determine the JUI package installation path.
		* This method will identify the JavaScript root URL and theme root URL.
		* If they are not explicitly specified, it will publish the included JUI package
		* and use that to resolve the needed paths.
		*/
	 		if($this->juiScriptFile===null || $this->juiThemeUrl===null) {
			if($this->juiScriptUrl===null)
				$this->juiScriptUrl=$this->_cs->getCoreScriptUrl().'/jui/js';
			if($this->juiThemeUrl===null)
				$this->juiThemeUrl=$this->_cs->getCoreScriptUrl().'/jui/css';
		}

		/**
		* Register jquery and JUI JavaScript files and the theme CSS file.
		*/
		if(is_string($this->juiCssFile))
			$this->_cs->registerCssFile($this->juiThemeUrl.'/'.$this->juiTheme.'/'.$this->juiCssFile);
		else if(is_array($this->juiCssFile)) {
			foreach($this->juiCssFile as $cssFile)
				$this->_cs->registerCssFile($this->juiThemeUrl.'/'.$this->juiTheme.'/'.$cssFile);
		}

		$this->_cs->registerCoreScript('jquery');
		$this->_cs->registerCoreScript('bbq');
		if(is_string($this->juiScriptFile))
			$this->_registerScriptFile($this->juiScriptFile);
		else if(is_array($this->juiScriptFile)) {
			foreach($this->juiScriptFile as $scriptFile)
				$this->_cs->registerScriptFile($scriptFile);
		}
	}
	
	/*
	 Publish module JavaScript and CSS files.
	*/
	public function _publishModuleAssets()
	{
		if (is_null($this->_cs))
			$this->_cs = Yii::app()->getClientScript();

		if (!is_string($this->baseScriptUrl)) {
			// Republish if in development mode
			$this->baseScriptUrl = ($this->development ?
				Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('SDynaTreeEditor.assets'), false, -1, true) :
				Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('SDynaTreeEditor.assets'))
			);
		}
		
		$this->_cs->registerScriptFile($this->baseScriptUrl.'/js/treeEditor.js');
		
		if($this->cssFile!==false) {
			if($this->cssFile===null)
				$this->cssFile= $this->baseScriptUrl.'/css/styles.css';
			$this->_cs->registerCssFile($this->cssFile);
		}
	}
	
	/**
	* Registers a JavaScript file under {@link scriptUrl}.
	* Note that by default, the script file will be rendered at the end of a page to improve page loading speed.
	* @param string $fileName JavaScript file name
	* @param integer $position the position of the JavaScript file. Valid values include the following:
	* <ul>
	* <li>CClientScript::POS_HEAD : the script is inserted in the head section right before the title element.</li>
	* <li>CClientScript::POS_BEGIN : the script is inserted at the beginning of the body section.</li>
	* <li>CClientScript::POS_END : the script is inserted at the end of the body section.</li>
	* </ul>
	*/
	private function _registerScriptFile($fileName,$position=CClientScript::POS_END)	{
		$this->_cs->registerScriptFile($this->juiScriptUrl.'/'.$fileName,$position);
	}
}
