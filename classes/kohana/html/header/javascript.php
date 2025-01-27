<?php defined('SYSPATH') or die('No direct script access.');
/**
 * A single javascript entity for HTML Header
 * @author Maciej Kwiatkowski <maciej.kwiatkowski@unicorn.net.pl>
 * @package Super Kohana
 * @category HTML Header
 */

class Kohana_HTML_Header_Javascript {

	protected
		$file = NULL,
		$attributes = array(),
		$protocol = NULL,
		$index = FALSE,
		$conditional = NULL;

	public $footer_script = FALSE;

	/**
	 * @param $file
	 * @param bool $footer_script Set to TRUE to call this script at the end of document
	 */
	public function __construct($file, $footer_script = FALSE)
	{
		$this->footer_script = (bool) $footer_script;

		if (is_array($file))
		{
			$this->file = Arr::get($file, 'file');
			$this->attributes = Arr::get($file, 'attributes');
			$this->protocol = Arr::get($file, 'protocol');
			$this->index = Arr::get($file, 'index');
			$this->conditional = Arr::get($file, 'conditional');
		}
		else
		{
			$this->file = (string) $file;
		}
	}

	public function __toString()
	{
		$html = "";
		if ( ! empty($this->conditional))
		{
			$html .= "<!--[if ".$this->conditional."]>\n";
		}

		$html .= HTML::script($this->file, $this->attributes, $this->protocol, $this->index)."\n";

		if ( ! empty($this->conditional))
		{
			$html .= "<![endif]-->";
		}
		return $html;
	}
}
