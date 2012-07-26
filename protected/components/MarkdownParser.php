<?php

class MarkdownParser extends CMarkdownParser
{
	private $_blockquoteType='';

	private $_urlPrefix = '/doc/guide/';

	public function __construct($urlPrefix)
	{
		if($urlPrefix) 
			$this->_urlPrefix = $urlPrefix;
		parent::__construct();
	}

	/**
	 * @overrived
	 * 重载生成链接的回调函数，生成带指定前缀的链接
	 */
	public function _doAnchors_inline_callback($matches) {
		$whole_match	=  $matches[1];
		$link_text		=  $this->runSpanGamut($matches[2]);
		$url			=  $matches[3] == '' ? $matches[4] : $matches[3];
		$title			=& $matches[7];

		$url = $this->encodeAttribute($this->_urlPrefix . $url);

		$result = "<a href=\"$url\"";
		if (isset($title)) {
			$title = $this->encodeAttribute($title);
			$result .=  " title=\"$title\"";
		}

		$link_text = $this->runSpanGamut($link_text);
		$result .= ">$link_text</a>";

		return $this->hashPart($result);
	}
}