(function ($) {
    $(function () {
        $('.flpl-like-type').change(function () {
            var like_type = $(this).val();
            if (like_type == 'like_button') {
                $('.flpl-like-box-ref').hide();
                $('.flpl-like-button-ref').show();
            } else {
                $('.flpl-like-box-ref').show();
                $('.flpl-like-button-ref').hide();
            }
        });

        $('.flpl-message .notice-dismiss').click(function () {
            $(this).parent().remove();
        });

        $('.flpl-nav').click(function () {
            var tab_id = $(this).data('tab');
            $('.flpl-nav').removeClass('nav-tab-active');
            $(this).addClass('nav-tab-active');
            $('.flpl-tab-content-wrap').hide();
            $('#flpl-tab-' + tab_id).show();
        });

        $('.flpl-delete a').click(function () {
            $(this).closest('.row-actions').find('.flpl-delete-confirmation').slideDown(500);

        });

        $('.flpl-delete-cancel').click(function () {
            $(this).parent().slideUp(500);
        });
        $('.flpl-delete-yes').click(function () {
            var selector = $(this);
            var locker_id = $(this).data('locker-id');
            $.ajax({
                type: 'post',
                url: flpl_js_object.admin_ajax_url,
                data: {
                    _wpnonce: flpl_js_object.ajax_nonce,
                    locker_id: locker_id,
                    action: 'flpl_delete_locker_action'
                },
                beforeSend: function () {
                    selector.closest('tr').fadeOut(500);
                },
                success: function (res) {

                }
            });
        });

        

        /**
         * Locker Type Change
         */
        $('.flpl-enable-locker-type').change(function () {
            if ($(this).val() == 'all' || $(this).val()=='specific_pages') {
                $('.flpl-locker-post-types input[type="checkbox"]').attr('disabled', 'disabled');
            } else {
                $('.flpl-locker-post-types input[type="checkbox"]').removeAttr('disabled');

            }
        });

        /**
         * Design Type Change
         */
        $('.flpl-design-trigger').change(function () {
            if ($(this).val() == 'custom') {
                $('.flpl-custom-design-ref').show();
            } else {
                $('.flpl-custom-design-ref').hide();

            }
        });
        
       
    });//document.ready close
}(jQuery));