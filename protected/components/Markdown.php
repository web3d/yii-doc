<?php

require_once(dirname(__FILE__).'/MarkdownParser.php');

class Markdown extends CMarkdown
{
	public $urlPrefix = '/doc/guide/';

	protected function createMarkdownParser()
	{
		return new MarkdownParser($this->urlPrefix);
	}
}