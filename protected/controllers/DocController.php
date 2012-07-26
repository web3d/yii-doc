<?php

class DocController extends Controller
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
	  $url = isset($_GET['url']) ? $_GET['url'] : 'index';

	  $content = Yii::app()->cache->get($url);
	  if(!$content){
		  $file_path = Yii::getPathOfAlias('application.data.docs.guide') 
			      . '/';//zh_cn
		  $content = @file_get_contents($file_path . 'zh_cn/' . $url . '.txt');
		  if(!$content) $content = @file_get_contents($file_path . $url . '.txt');
		  
		  $chapter = @file_get_contents($file_path . 'zh_cn/' . 'toc.txt');
		}
	  if(!$content) throw new CHttpException('The content what you are looking for is not existed:' . $url);
	  //echo $url;
	  //echo $chapter;
		$this->render('guide', array(
		  'content' => $content,
		  'chapter' => $chapter,
		  'url' => $url
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