=== Reading Time & Word Count Block for Post ===
Contributors: sopu175
Donate link: https://devsopu.com/
Tags: reading time, word count, content tools, SEO, readability
Requires at least: 5.0
Tested up to: 6.8
Requires PHP: 7.2
Stable tag: 1.0.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Display reading time and word count for posts and also simple use shortcode ['reading-time']. Automatically or via shortcode. Simple and SEO-friendly.

== Description ==

This plugin adds a dynamic block or shortcode to show estimated reading time and word count for WordPress posts, pages, or custom post types.

**Features:**
* Automatically appends reading time and word count to the top of posts
* Optional display under title
* Shortcode: [reading_time]
* Uses average reading speed of 200 WPM
* Admin settings to enable/disable sections

Great for improving user experience, accessibility, and SEO readability metrics.

== Installation ==

1. Upload the plugin folder to the `/wp-content/plugins/` directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. Click on **Reading Time** in the WordPress admin menu (clock icon on the left sidebar).
4. On the **Reading Time & Word Count Settings** screen, configure the following options:
   - **Show Word Count** – Toggle display of total word count.
   - **Show with Title** – Display reading time below the post title.
   - **Show with Content** – Display reading time above the post content.
5. Optionally insert the shortcode `[reading_time]` anywhere in your content or theme template.

Note: The plugin uses an average reading speed of 200 words per minute.

== Frequently Asked Questions ==

= Can I change the reading speed calculation? =
Not in the current version, but support for custom WPM is planned.

= Will it work with custom post types? =
Yes, reading time can be shown for any `is_singular()` post type.

== Screenshots ==

1. Upload or download the plugin first
screenshot-1.png
2. Active the plugin
screenshot-2.png
3. Admin Settings page and Output
screenshot-3.png
screenshot-4.png
4. Change Settings and Output
screenshot-5.png
screenshot-6.png

Shortcode usage
screenshot-7.png
screenshot-8.png

Example output above a blog post
screenshot-4.png
screenshot-6.png

== Changelog ==

= 1.0.0 =
* Initial stable release
* Settings page with toggle options
* Frontend display + shortcode support

== Upgrade Notice ==

= 1.0.0 =
First public version with shortcode and admin settings for flexible display.

== Arbitrary section ==

This plugin was built with performance in mind. All logic is based on server-side rendering — no page builders or heavy frontend JavaScript.

== A brief Markdown Example ==

1. Automatic reading time on top of content
2. Optional word count toggle
3. Clean and safe output

* Easy to use
* Customizable
* Lightweight

Visit [devsopu.com](https://devsopu.com/) for more.