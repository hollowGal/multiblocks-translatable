<?php
/**
 * Plugin Name:       	Multiblocks Translatable
 * Description:       	Example block - scaffolded with Create Block tool and made multiple, translatable and possibly dynamic.
 * Requires at least: 	5.8
 * Requires PHP:      	7.0
 * Version:           	0.1.0
 * Author:            	The WordPress Contributors
 * License:           	GPL-2.0-or-later
 * License URI:       	https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       	multiblocks-translatable
 * Domain Path:     	/languages
 * @package           	multiblocks-translatable
 */

if(!defined('ABSPATH')) exit;


function create_block_multiblocks_translatable_block_init() {
	$blocks = array(
		array("block1", array()),
		array("block2", array()),
		array("blockdynamic", array('render_callback' => 'multiblocks_translatable_render'))
	);
	
	foreach($blocks as $block){

		/* enqueuing editor-script manually et retrieving handle instead of block.json */
		$handle = 'multiblocks-translatable-'.$block[0];
		$block[1]['editor_script'] = $handle;
		$asset_file = include(plugin_dir_path(__FILE__).'build/'.$block[0].'/'.$block[0].'.asset.php');
		$path='build/'.$block[0].'/'.$block[0].'.js';
		wp_enqueue_script($handle, plugins_url($path, __FILE__), $asset_file['dependencies'], $asset_file['version']);

		/*  Register the block from json  */
		register_block_type( plugin_dir_path(__FILE__) . '/include/blocks/'.$block[0].'/', $block[1] );
		/*  With handle set block translation */
        wp_set_script_translations($handle, 'multiblocks-translatable', plugin_dir_path(__FILE__).'/languages' );
	}

}
add_action( 'init', 'create_block_multiblocks_translatable_block_init' );
function multiblocks_translatable_render($attributes) {
	$savedcontent = '<div class="wp-block-multiblocks-translatable-blockdynamic"><p>';
	$savedcontent .=__('I am rendered by the server dynamically', 'multiblocks-translatable' );
	$savedcontent .='</p></div>';
	return $savedcontent;
}

function multiblocks_translatable_load_translations( $mofile, $domain ) {
    if ( 'multiblocks-translatable' === $domain && false !== strpos( $mofile, WP_LANG_DIR . '/plugins/' ) ) {
        $locale = apply_filters( 'plugin_locale', determine_locale(), $domain );
        $mofile = WP_PLUGIN_DIR . '/' . dirname( plugin_basename( __FILE__ ) ) . '/languages/' . $domain . '-' . $locale . '.mo';
    }
    return $mofile;
}
add_filter( 'load_textdomain_mofile', 'multiblocks_translatable_load_translations', 10, 2 );

// translation of the dynamic bloc :
function load_myplugin_textdomain_multiblocks_translatable() {
    load_plugin_textdomain( 'multiblocks-translatable', FALSE, dirname(plugin_basename( __FILE__ ) ) . 'languages' );
  }
  add_action( 'plugins_loaded', 'load_myplugin_textdomain_multiblocks_translatable' ); 

?>