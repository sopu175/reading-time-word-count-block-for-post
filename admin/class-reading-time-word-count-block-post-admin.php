<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://devsopu.com
 * @since      1.0.0
 *
 * @package    Reading_Time_Word_Count_Block_Post
 * @subpackage Reading_Time_Word_Count_Block_Post/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Reading_Time_Word_Count_Block_Post
 * @subpackage Reading_Time_Word_Count_Block_Post/admin
 * @author     Saif Islam <sopu175@gmail.com>
 */
class Reading_Time_Word_Count_Block_Post_Admin
{

    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string $plugin_name The ID of this plugin.
     */
    private $plugin_name;

    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string $version The current version of this plugin.
     */
    private $version;

    /**
     * Initialize the class and set its properties.
     *
     * @param string $plugin_name The name of this plugin.
     * @param string $version The version of this plugin.
     * @since    1.0.0
     */
    public function __construct($plugin_name, $version)
    {

        $this->plugin_name = $plugin_name;
        $this->version = $version;

    }

    /**
     * Register the stylesheets for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_styles()
    {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Reading_Time_Word_Count_Block_Post_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Reading_Time_Word_Count_Block_Post_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */

        wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/reading-time-word-count-block-post-admin.css', array(), $this->version, 'all');

    }

    /**
     * Register the JavaScript for the admin area.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts()
    {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Reading_Time_Word_Count_Block_Post_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Reading_Time_Word_Count_Block_Post_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */

        wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/reading-time-word-count-block-post-admin.js', array('jquery'), $this->version, false);

    }


    public function add_admin_menu()
    {
        add_menu_page(
            'Reading Time & Word Count', // Page title
            'Reading Time',              // Menu title
            'manage_options',            // Capability
            $this->plugin_name,          // Menu slug
            array($this, 'display_admin_page'), // Callback function
            'dashicons-clock',           // Icon
            20                           // Position
        );
    }

    public function display_admin_page()
    {
        require plugin_dir_path(__FILE__) . 'partials/reading-time-word-count-block-post-admin-display.php';
    }


    public function register_ajax_hooks()
    {
        add_action('wp_ajax_rtwc_save_settings', array($this, 'save_settings'));
    }

    public function save_settings() {
        // Verify user capability
        if ( ! current_user_can( 'manage_options' ) ) {
            wp_send_json_error( array( 'message' => 'You do not have permission to perform this action.' ) );
        }

        // Verify nonce
        if (
            ! isset( $_POST['nonce'] ) ||
            ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['nonce'] ) ), 'rtwc_settings_nonce' )
        ) {
            wp_send_json_error( array( 'message' => 'Invalid nonce.' ) );
        }

        // Sanitize and validate inputs
        $word_count   = isset( $_POST['rtwc_show_word_count'] ) && $_POST['rtwc_show_word_count'] === 'yes' ? 'yes' : 'no';
        $with_title   = isset( $_POST['rtwc_show_with_title'] ) && $_POST['rtwc_show_with_title'] === 'yes' ? 'yes' : 'no';
        $with_content = isset( $_POST['rtwc_show_with_content'] ) && $_POST['rtwc_show_with_content'] === 'yes' ? 'yes' : 'no';

        // Save settings to the database
        $updated_word_count   = update_option( 'rtwc_show_word_count', $word_count );
        $updated_with_title   = update_option( 'rtwc_show_with_title', $with_title );
        $updated_with_content = update_option( 'rtwc_show_with_content', $with_content );

        // Send response
        if ( $updated_word_count || $updated_with_title || $updated_with_content ) {
            wp_send_json_success( array( 'message' => 'Settings saved successfully!' ) );
        } else {
            wp_send_json_error( array( 'message' => 'No changes were made to the settings.' ) );
        }
    }


}