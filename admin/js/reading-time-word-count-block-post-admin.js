(function ($) {
   "use strict";

   /**
    * All of the code for your admin-facing JavaScript source
    * should reside in this file.
    *
    * Note: It has been assumed you will write jQuery code here, so the
    * $ function reference has been prepared for usage within the scope
    * of this function.
    *
    * This enables you to define handlers, for when the DOM is ready:
    *
    * $(function() {
    *
    * });
    *
    * When the window is loaded:
    *
    * $( window ).load(function() {
    *
    * });
    *
    * ...and/or other possibilities.
    *
    * Ideally, it is not considered best practise to attach more than a
    * single DOM-ready or window-load handler for a particular page.
    * Although scripts in the WordPress core, Plugins and Themes may be
    * practising this, we should strive to set a better example in our own work.
    */
   jQuery(document).ready(function ($) {
      $("#rtwc-settings-submit").on("click", function (e) {
         e.preventDefault();

         if (!confirm("Are you sure you want to save these settings?")) {
            return; // Cancelled by user
         }

         const data = {
            action: "rtwc_save_settings",
            rtwc_show_word_count: $("#rtwc_show_word_count").is(":checked") ? "yes" : "no",
            rtwc_show_with_title: $("#rtwc_show_with_title").is(":checked") ? "yes" : "no",
            rtwc_show_with_content: $("#rtwc_show_with_content").is(":checked") ? "yes" : "no",
            nonce: $("#rtwc_settings_nonce_field").val(),
         };

         $.post(ajaxurl, data, function (response) {
            const messageBox = $("#rtwc-settings-message");
            let messageHtml = "";

            if (response.success) {
               messageHtml = '<div class="notice notice-success"><p>' + response.data.message + "</p></div>";
            } else {
               messageHtml = '<div class="notice notice-error"><p>' + response.data.message + "</p></div>";
            }

            messageBox
                .stop(true, true)
                .hide()
                .html(messageHtml)
                .fadeIn(500); // show with fade in

            // Auto hide after 4 seconds
            setTimeout(function () {
               messageBox.fadeOut(700, function () {
                  $(this).html("").show(); // reset for next use
               });
            }, 2000);
         });
      });
   });


})(jQuery);
