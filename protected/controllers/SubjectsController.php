<?php

class SubjectsController extends Controller
{
	public function actionCreate()
	{
		
	}

	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}
	
	public function loadModel($id)
	{
		$model=Subjects::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	
	public function actionIndex()
	{
		$model = new Subjects;
		if(isset($_POST['Subjects']))
		{
			$model->attributes=$_POST['Subjects'];
			if($model->validate())
			{
				//lägg in i databas
			
				$model->save();
				
				unset($_POST['Subjects']);
				$model = new Subjects;
			}
			
		}

		$data = new Subjects;
		
		$this->render('index',array(
			'model'=>$model,
			'data'=>$data,
		//	'dataProvider'=>$dataProvider,
		));
		
	}
	public function actionUpdate()
	{
		$this->render('index');
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