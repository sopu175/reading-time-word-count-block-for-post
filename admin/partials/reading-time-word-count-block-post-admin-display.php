<?php

/**
 * Provide an admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://devsopu.com
 * @since      1.0.0
 *
 * @package    Reading_Time_Word_Count_Block_Post
 * @subpackage Reading_Time_Word_Count_Block_Post/admin/partials
 */

// Retrieve current settings
$show_word_count = get_option('rtwc_show_word_count', 'yes');
$show_with_title = get_option('rtwc_show_with_title', 'yes');
$show_with_content = get_option('rtwc_show_with_content', 'yes');

?>

<div id="wpbody" role="main">
   <div id="wpbody-content">
      <h1 class="wp-heading-inline">Reading Time & Word Count Settings</h1>
      <p>Configure the settings for the Reading Time & Word Count plugin here.</p>

      <form id="rtwc-settings-form">
         <?php
            wp_nonce_field( 'rtwc_settings_nonce', 'rtwc_settings_nonce_field' );
            ?>

         <table class="form-table" role="presentation">
            <tbody>
               <tr>
                  <th scope="row">
                     <label
                        for="rtwc_show_word_count"><?php esc_html_e( 'Show Word Count', 'reading-time-word-count-block-post' ); ?></label>
                  </th>
                  <td>
                     <input type="checkbox" name="rtwc_show_word_count" id="rtwc_show_word_count" value="yes"
                        <?php checked( $show_word_count, 'yes' ); ?> />
                     <label
                        for="rtwc_show_word_count"><?php esc_html_e( 'Yes', 'reading-time-word-count-block-post' ); ?></label>
                  </td>
               </tr>

               <tr>
                  <th scope="row">
                     <label
                        for="rtwc_show_with_title"><?php esc_html_e( 'Show with Title', 'reading-time-word-count-block-post' ); ?></label>
                  </th>
                  <td>
                     <input type="checkbox" name="rtwc_show_with_title" id="rtwc_show_with_title" value="yes"
                        <?php checked( $show_with_title, 'yes' ); ?> />
                     <label
                        for="rtwc_show_with_title"><?php esc_html_e( 'Yes', 'reading-time-word-count-block-post' ); ?></label>
                  </td>
               </tr>

               <tr>
                  <th scope="row">
                     <label
                        for="rtwc_show_with_content"><?php esc_html_e( 'Show with Content', 'reading-time-word-count-block-post' ); ?></label>
                  </th>
                  <td>
                     <input type="checkbox" name="rtwc_show_with_content" id="rtwc_show_with_content" value="yes"
                        <?php checked( $show_with_content, 'yes' ); ?> />
                     <label
                        for="rtwc_show_with_content"><?php esc_html_e( 'Yes', 'reading-time-word-count-block-post' ); ?></label>
                  </td>
               </tr>
            </tbody>
         </table>

         <?php submit_button( __( 'Save Changes', 'reading-time-word-count-block-post' ), 'primary', 'submit', true, array( 'id' => 'rtwc-settings-submit' ) ); ?>


      </form>

      <p>
         <strong><?php esc_html_e( 'Note:', 'reading-time-word-count-block-post' ); ?></strong>
         <?php esc_html_e( 'You can also use the shortcode', 'reading-time-word-count-block-post' ); ?>
         <code>[reading_time]</code>
      </p>
      <div id="rtwc-settings-message"></div>
   </div>
</div>