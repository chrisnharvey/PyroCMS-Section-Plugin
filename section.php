<?php

/**
 * PyroCMS Section Plugin
 *
 * @package		PyroCMS
 * @subpackage	Section Plugin
 * @author		Chris Harvey
 * @link 		http://www.chrisnharvey.com/
 *
 */
class Plugin_Section extends Plugin
{
	public static $sections = array();

	public function __construct()
	{
		// Start an output buffer
		ob_start();

		// Regiser our shutdown function to parse our sections
		register_shutdown_function(array($this, 'parse'));
	}

	public function __call($section, $args)
	{
		if ($content = $this->content()) {
			if ( ! array_key_exists($section, static::$sections)) {
				static::$sections[$section] = '';
			}
			
			static::$sections[$section] .= $content;

			return null;
		}

		// Replace the lex tag with our cool syntax so we can easily replace it later
		return "{@ {$section} @}";
	}

	public function parse()
	{
		$output = ob_get_clean();

		foreach (static::$sections as $name => $section) {
			$output = str_replace("{@ {$name} @}", $section, $output);
		}

		echo $output;
	}
}