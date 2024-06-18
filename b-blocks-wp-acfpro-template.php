<?php

/**
 * Plugin Name:       bblocks - bootstrap
 * Description:       Bootstrap pour plugin avec blocks FSE avec ACF pro.
 * Requires at least: 6.1
 * Requires PHP:      7.0
 * Version:           0.1.0
 * Author:            Bergall
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       bergall-wp-blocks-acfpro-template
 *
 * @package CreateBlock
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}


// BLOCKS ACF
function register_my_blocks_acf_pro()
{
    $blocks = array(
        'first-block'
    );

    foreach ($blocks as $block) {
        register_block_type(__DIR__ . "/src/{$block}");
    }
}

add_action('acf/init', 'register_my_blocks_acf_pro');



/********************************/
// Save and load plugin specific ACF field groups via the /acf-json folder.
/********************************/

// Save
function my_plugin_update_field_group($group) {
    // list of field groups that should be saved to my-plugin/acf-json
    
    // ICI : ajouter les noms des champs dans du dossier acf-json
    $groups = array('group_6671a2757c269');
  
    if (in_array($group['key'], $groups)) {
      add_filter('acf/settings/save_json', function() {
        return dirname(__FILE__) . '/acf-json';
      });
    }
  }
  add_action('acf/update_field_group', 'my_plugin_update_field_group', 1, 1);
  
  // Load - includes the /acf-json folder in this plugin to the places to look for ACF Local JSON files
  add_filter('acf/settings/load_json', function($paths) {
    $paths[] = dirname(__FILE__) . '/acf-json';
    return $paths;
  });