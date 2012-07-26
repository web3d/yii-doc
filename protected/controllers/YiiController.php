<?php

class YiiController extends Controller
{
	public $layout='//layouts/main';
	
	public function actionApi()
	{
		$this->render('api');
	}

	public function actionBlog()
	{
		$this->render('blog');
	}

	public function actionGuide()
	{
		//echo $urlx;
		
	  $url = isset($_GET['url']) ? $_GET['url'] : 'index';
	  $file_path = Yii::getPathOfAlias('application.data.docs.guide') 
		      . '/';//zh_cn
	  $content = @file_get_contents($file_path . 'zh_cn/' . $url . '.txt');
	  if(!$content) $content = @file_get_contents($file_path . $url . '.txt');
	  
	  $chapter = @file_get_contents($file_path . 'zh_cn/' . 'toc.txt');
	  if(!$content) throw new CHttpException('The content yon look for is not existed.');
	  //echo $url;
	  //echo $chapter;
		$this->render('guide', array(
		  'content' => $content,
		  'chapter' => $chapter
		));
	}

	public function actionIndex()
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