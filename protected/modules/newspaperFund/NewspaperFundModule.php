<?php
class NewspaperFundModule extends CWebModule
{
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
		$this->setImport(array(
			'newspaperFund.models.*',
			'newspaperFund.components.SDynaTree.*',
			'newspaperFund.controllers',
		));
		
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
				Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('newspaperFund.assets'), false, -1, true) :
				Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('newspaperFund.assets'))
			);
		}
		$this->_cs->registerCssFile('/elfinder2/css/elfinder.min.css');
		$this->_cs->registerScriptFile('/elfinder2/js/elFinder.js');
		$this->_cs->registerScriptFile('/elfinder2/js/i18n/elfinder.ru.js');
		$this->_cs->registerScriptFile($this->baseScriptUrl.'/js/authorIndex.js');
		$this->_cs->registerScriptFile($this->baseScriptUrl.'/js/jquery_masked_input.js');
		$this->_cs->registerScriptFile('/elfinder2/js/elFinder.version.js');
		$this->_cs->registerScriptFile('/elfinder2/js/jquery.elfinder.js');
		$this->_cs->registerScriptFile('/elfinder2/js/elFinder.resources.js');
		$this->_cs->registerScriptFile('/elfinder2/js/elFinder.options.js');
		$this->_cs->registerScriptFile('/elfinder2/js/elFinder.history.js');
		$this->_cs->registerScriptFile('/elfinder2/js/elFinder.command.js');

		$this->_cs->registerScriptFile('/elfinder2/js/proxy/elFinderSupportVer1.js');
		$this->_cs->registerScriptFile('/elfinder2/js/jquery.dialogelfinder.js');

		$this->_cs->registerScriptFile('/elfinder2/js/ui/overlay.js');
		$this->_cs->registerScriptFile('/elfinder2/js/ui/workzone.js');
		$this->_cs->registerScriptFile('/elfinder2/js/ui/navbar.js');
		$this->_cs->registerScriptFile('/elfinder2/js/ui/dialog.js');
		$this->_cs->registerScriptFile('/elfinder2/js/ui/tree.js');
		$this->_cs->registerScriptFile('/elfinder2/js/ui/cwd.js');
		$this->_cs->registerScriptFile('/elfinder2/js/ui/toolbar.js');
		$this->_cs->registerScriptFile('/elfinder2/js/ui/button.js');
		$this->_cs->registerScriptFile('/elfinder2/js/ui/uploadButton.js');
		$this->_cs->registerScriptFile('/elfinder2/js/ui/viewbutton.js');
		$this->_cs->registerScriptFile('/elfinder2/js/ui/searchbutton.js');
		$this->_cs->registerScriptFile('/elfinder2/js/ui/sortbutton.js');
		$this->_cs->registerScriptFile('/elfinder2/js/ui/panel.js');
		$this->_cs->registerScriptFile('/elfinder2/js/ui/contextmenu.js');
		$this->_cs->registerScriptFile('/elfinder2/js/ui/path.js');
		$this->_cs->registerScriptFile('/elfinder2/js/ui/stat.js');
		$this->_cs->registerScriptFile('/elfinder2/js/ui/places.js');

		$this->_cs->registerScriptFile('/elfinder2/js/commands/back.js');
		$this->_cs->registerScriptFile('/elfinder2/js/commands/forward.js');
		$this->_cs->registerScriptFile('/elfinder2/js/commands/reload.js');
		$this->_cs->registerScriptFile('/elfinder2/js/commands/up.js');
		$this->_cs->registerScriptFile('/elfinder2/js/commands/home.js');
		$this->_cs->registerScriptFile('/elfinder2/js/commands/copy.js');
		$this->_cs->registerScriptFile('/elfinder2/js/commands/cut.js');
		$this->_cs->registerScriptFile('/elfinder2/js/commands/paste.js');
		$this->_cs->registerScriptFile('/elfinder2/js/commands/open.js');
		$this->_cs->registerScriptFile('/elfinder2/js/commands/rm.js');
		$this->_cs->registerScriptFile('/elfinder2/js/commands/info.js');
		$this->_cs->registerScriptFile('/elfinder2/js/commands/duplicate.js');
		$this->_cs->registerScriptFile('/elfinder2/js/commands/rename.js');
		$this->_cs->registerScriptFile('/elfinder2/js/commands/help.js');
		$this->_cs->registerScriptFile('/elfinder2/js/commands/getfile.js');
		$this->_cs->registerScriptFile('/elfinder2/js/commands/mkdir.js');
		$this->_cs->registerScriptFile('/elfinder2/js/commands/mkfile.js');
		$this->_cs->registerScriptFile('/elfinder2/js/commands/upload.js');
		$this->_cs->registerScriptFile('/elfinder2/js/commands/download.js');
		$this->_cs->registerScriptFile('/elfinder2/js/commands/edit.js');
		$this->_cs->registerScriptFile('/elfinder2/js/commands/quicklook.js');
		$this->_cs->registerScriptFile('/elfinder2/js/commands/quicklook.plugins.js');
		$this->_cs->registerScriptFile('/elfinder2/js/commands/extract.js');
		$this->_cs->registerScriptFile('/elfinder2/js/commands/archive.js');
		$this->_cs->registerScriptFile('/elfinder2/js/commands/view.js');
		$this->_cs->registerScriptFile('/elfinder2/js/commands/search.js');
		$this->_cs->registerScriptFile('/elfinder2/js/jquery.smoothZoom.js');
		
		if($this->cssFile!==false) {
			if($this->cssFile===null)
				$this->cssFile= $this->baseScriptUrl.'/css/styles.css';
			$this->_cs->registerCssFile($this->cssFile);
			$this->_cs->registerScriptFile('/elfinder2/js/elFinder.js');
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
