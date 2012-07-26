<?php
/* @var $this YiiController */

$this->breadcrumbs=array(
	'Yii'=>array('/yii'),
	'Guide',
);
?>

<div class="span-5 last">
	<div id="sidebar">
	<?php
		$this->beginWidget('application.components.Markdown', 
			array('purifyOutput'=>true, 'urlPrefix'=>'/doc/guide/'));
		echo $chapter;
		$this->endWidget();
		?>
	
	</div><!-- sidebar -->
</div>
<div class="span-19">
	<div id="content">
		<?php

		$this->beginWidget('CMarkdown', array('purifyOutput'=>true));
		if($this->beginCache($url, array('varyByParam' => array('url')))) {
			echo $content;
			$this->endCache(); 
		}
		$this->endWidget();
		?>
	</div><!-- content -->
</div>

