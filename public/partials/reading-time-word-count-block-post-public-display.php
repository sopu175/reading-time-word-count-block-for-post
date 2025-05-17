<?php
/**
 * Public-facing display template for the plugin
 *
 * This file outputs the reading time and word count block.
 * It follows WordPress plugin development best practices.
 *
 * @package    Reading_Time_Word_Count_Block_Post
 * @subpackage Reading_Time_Word_Count_Block_Post/public/partials
 * @author     Saif Islam
 * @link       https://devsopu.com
 * @since      1.0.0
 */

// Prevent output on admin pages, non-single posts, or secondary queries
if ( is_admin()  || ! is_main_query()  ) {
    return;
}

// Get global post object
global $post;

// Safety check in case post is not available
if ( ! $post ) {
    return;
}

// Optional setting: whether to show word count (default: yes)
$show_word_count = get_option( 'rtwc_show_word_count', 'yes' );

// Calculate word count and reading time
$word_count   = str_word_count( wp_strip_all_tags( $post->post_content ) );
$reading_time = ceil( $word_count / 200 ); // Average reading speed: 200 WPM

?>

<!-- Reading Time & Word Count Display Block -->
<div class="count-word-wrapper" style="margin-bottom: 10px; font-size: 0.9em; color: #555;">
    <p><b><?php echo esc_html( $reading_time ); ?> min read</b></p>

    <?php if ( 'yes' === $show_word_count ) : ?>
        <p><?php echo esc_html( $word_count ); ?> words</p>
    <?php endif; ?>
</div>
