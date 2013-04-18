<?php
/*
 @author DrunkNinja 2011
*/
class StdController extends RController
{
    public $defaultAction = '';
    public $layout = '';
    public $name;
    
    public function filters()
    {
            return array(
                    'rights',
            );
    }
    
    public function actions ()
    {
        return array (
            'delete' => 'application.controllers.std.actions.DeleteAction',
            'update' => 'application.controllers.std.actions.UpdateAction',
            'search' =>  'application.controllers.std.actions.SearchAction',
	    'report' =>  'application.controllers.std.actions.ReportAction',
            'viewRec' => 'application.controllers.std.actions.ViewRecAction',
            'viewCat' => 'application.controllers.std.actions.ViewCatAction',
            'findNode' => 'application.controllers.std.actions.FindNodeAction',
	    'getPic' => 'application.controllers.std.actions.GetPicAction',
	    'list' => 'application.controllers.std.actions.ListAction',
	    'logzal' => 'application.controllers.std.actions.LogzalAction',
	    'reportzal' => 'application.controllers.std.actions.ReportzalAction',
	    'doc' => 'application.controllers.std.actions.DocAction',
	    'checkfile' => 'application.controllers.std.actions.CheckFileAction',
        );
    }
    
    public function allowedActions()
    {
            return 'index';
    }

}
?>
