<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://devsopu.com
 * @since      1.0.0
 *
 * @package    Reading_Time_Word_Count_Block_Post
 * @subpackage Reading_Time_Word_Count_Block_Post/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Reading_Time_Word_Count_Block_Post
 * @subpackage Reading_Time_Word_Count_Block_Post/public
 * @author     Saif Islam <sopu175@gmail.com>
 */
class Reading_Time_Word_Count_Block_Post_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url(__FILE__) . 'css/reading-time-word-count-block-post-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url(__FILE__) . 'js/reading-time-word-count-block-post-public.js', array( 'jquery' ), $this->version, false );

	}



/**
 * Register the shortcode for reading time.
 */
public function register_shortcodes() {
	add_shortcode( 'reading_time', array( $this, 'rtwc_shortcode_handler' ) );
}



    /**
     * Get the reading time HTML block.
     *
     * @return string
     */
    private function get_reading_time_html() {
        ob_start();
        require plugin_dir_path(__FILE__) . 'partials/reading-time-word-count-block-post-public-display.php';
        return ob_get_clean();
    }

/**
 * Shortcode handler for reading time.
 */
public function rtwc_shortcode_handler() {
    return $this->get_reading_time_html();
}





    /**
     * Add reading time before the post content.
     *
     * @param string $content Post content.
     * @return string Modified content.
     */
    public function add_reading_time_bottom_of_content( $content ) {
        if ( is_singular() && in_the_loop() && is_main_query() ) {
            return $this->get_reading_time_html() . $content;
        }
        return $content;
    }

    /**
     * Add reading time after the post title.
     *
     * @param string $title Post title.
     * @param int    $id    Post ID.
     * @return string Modified title.
     */
    public function add_reading_time_title_of_content( $title, $id = null ) {
        if ( is_admin() || ! in_the_loop() || empty( $id ) || get_post_type( $id ) !== 'post' ) {
            return $title;
        }

        // Get correct post content using the $id
        $post = get_post( $id );
        if ( ! $post || empty( $post->post_content ) ) {
            return $title;
        }

        // Append reading time HTML after the title
        return $title . $this->get_reading_time_html();
    }



}