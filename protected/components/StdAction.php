<?php
/*
 @author vadim and DrunkNinja 2011
*/
abstract class StdAction extends CAction
{
    private $_modelName;
    private $_view;
    
    /**
     * Упрощенная переадресация по действиям контроллера
     * По-умолчанию переходим на основное действие контроллера
    */
    public function redirect($actionId = null)
    {
        if($actionId === null)
            $actionId = $this->controller->defaultAction;
        
        $this->controller->redirect(array($actionId));
    }

    /**
     * Рендер представление.
     * По-умолчанию рендерим одноименное представление
    */
    public function render($data, $return = false)
    {
        if($this->_view === null)
            $this->_view = $this->id;
        
        return $this->controller->render($this->_view, $data, $return);
    }
    
    public function renderPartial($view, $data=null, $return = false, $processOutput = false)
    {   
        return $this->controller->renderPartial($view, $data, $return, $processOutput);
    }
    
    /**
     * Возвращаем новую модель или пытаемся найти ранее
     * созданную запись, если известен id
    */
    public function getModel($id = null, $scenario = 'insert')
    {
        $id = ($id === null) ? Yii::app()->request->getParam('id') : $id;
        
        if ($id === null)
            $model = new $this->modelName($scenario);
        else if(($model = CActiveRecord::model($this->modelName)->resetScope()->findByPk($id)) === null)
            throw new CHttpException(404, Yii::t('base', 'The specified record cannot be found.'));
        
        return $model;
    }
    
    /*
     Создаём новую модель, даже если в параметрах экшена передан id модели
    */
    public function model ($scenario='insert')
    {
        $model = new $this->modelName($scenario);
        return $model;
    }
    
    /**
     * Возвращает имя модели, с которой работает контроллер
     * По-умолчанию имя модели совпадает с именем контроллера
    */
    public function getModelName()
    {
        if($this->_modelName === null)
            $this->_modelName = ucfirst($this->controller->id);
        
        return $this->_modelName;
    }
    
    public function setView($value)
    {
        $this->_view = $value;
    }
    
    public function setModelName($value)
    {
        $this->_modelName = $value;
    }
}
?>