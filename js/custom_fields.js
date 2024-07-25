(function ($, Drupal) {
    Drupal.behaviors.customFields = {
      attach: function (context, settings) {
        console.log('Custom fields JavaScript is attached.');

        // Disable specific options
        $('input[name="who_can_submit[admins]"]', context).prop('disabled', true);
        $('input[name="who_can_submit[mentors]"]', context).prop('disabled', true);
        $('input[name="who_can_view[admins]"]', context).prop('disabled', true);
        $('input[name="who_can_view[mentors]"]', context).prop('disabled', true);
        $('input[name="who_can_edit[admins]"]', context).prop('disabled', true);
        $('input[name="who_can_edit[mentors]"]', context).prop('disabled', true);
      }
    };
  })(jQuery, Drupal);  

  console.log("custom fields");