<?php
/**
 * @package Editor_Width
 * @version 1.0.0
 * Plugin Name: Editor Width
 * Plugin URI: https://github.com/traed/editor-width
 * Description: A very simple wordpress plugin that lets you customize your wodpress editor width. Nothing more, nothing less.
 * Author: Mattias Forsman
 * Version: 1.0.0
 * Author URI: https://github.com/traed
*/

namespace Editor_Width;

class Plugin
{
	const SLUG = 'editor_assets';
	const WIDTH = 1200;
	const VERSION = '1.0.0';

	public function __construct()
	{
		add_action('admin_head', array($this, 'add_styles'));
	}
	
	public function add_styles()
	{
		?>
			<style>
				/* Main column width */
				.wp-block {
					max-width: <?php echo self::WIDTH; ?>px;
				}
				
				/* Width of "wide" blocks */
				.wp-block[data-align="wide"] {
					max-width: <?php echo self::WIDTH * 1.2; ?>px;
				}
				
				/* Width of "full-wide" blocks */
				.wp-block[data-align="full"] {
					max-width: none;
				}
			</style>
		<?php
	}
}

if(is_admin()) {
	new Plugin();
}
