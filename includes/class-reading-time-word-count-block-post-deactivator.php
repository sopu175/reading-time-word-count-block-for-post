<?php

/**
 * Fired during plugin deactivation
 *
 * @link       https://devsopu.com
 * @since      1.0.0
 *
 * @package    Reading_Time_Word_Count_Block_Post
 * @subpackage Reading_Time_Word_Count_Block_Post/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Reading_Time_Word_Count_Block_Post
 * @subpackage Reading_Time_Word_Count_Block_Post/includes
 * @author     Saif Islam <sopu175@gmail.com>
 */
class Reading_Time_Word_Count_Block_Post_Deactivator
{

    /**
     * Short Description. (use period)
     *
     * Long Description.
     *
     * @since    1.0.0
     */
    public static function deactivate()
    {
        // Delete options
        delete_option('rtwc_show_word_count');
        delete_option('rtwc_show_with_title');
        delete_option('rtwc_show_with_content');
    }

}