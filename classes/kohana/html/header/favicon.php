<?php defined('SYSPATH') or die('No direct script access.');
/**
 * A favicon entity for HTML Header
 * @author Maciej Kwiatkowski <maciek@unicorn.net.pl>
 * @package Super Kohana
 * @category HTML Header
 */

class Kohana_HTML_Header_Favicon {
	protected
		$attributes = array(
			'rel' => 'icon',
			'type' => 'image/ico',
			'href' => '/favicon.ico',
		);

	/**
	 * Header favicon tag constructor
	 * @param string|array $name Examples: 'keywords', 'description', 'copyright', or an associative array ('name' => 'keywords', 'content' => 'example keyword list')
	 * @param string $content
	 * @throws Kohana_Exception
	 */
	public function __construct($href)
	{
		if ( ! is_array($href))
		{
			$this->attributes['href'] = (string) $href;
		}
		else
		{
			$this->attributes = Arr::overwrite($this->attributes, $href);
		}
	}

	public function __toString()
	{
		return "<link ".HTML::attributes($this->attributes)." />";
	}
}