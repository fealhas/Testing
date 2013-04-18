<?php

class ProfileController extends Controller {

    public function actionIndex() {
        //$this->render('index');
        $this->render('view', array(
            'model' => User::model()->findByPk(Yii::app()->user->id),
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate() {
        $model = User::model()->findByPk(Yii::app()->user->id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['User'])) {
            $old = $model->password;
            $model->attributes = $_POST['User'];
            if ($old != $model->password)
                $model->password = md5($model->password);
            if ($model->save())
                $this->redirect(array('index'));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    // Uncomment the following methods and override them if needed
    /*
      public function filters()
      {
      // return the filter configuration for this controller, e.g.:
      return array(
      'inlineFilterName',
      array(
      'class'=>'path.to.FilterClass',
      'propertyName'=>'propertyValue',
      ),
      );
      }

      public function actions()
      {
      // return external action classes, e.g.:
      return array(
      'action1'=>'path.to.ActionClass',
      'action2'=>array(
      'class'=>'path.to.AnotherActionClass',
      'propertyName'=>'propertyValue',
      ),
      );
      }
     */
}