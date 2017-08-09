(function ($) {

    $(function () {
        var counter = '';
        $(window).load(function () {

            /**
             * 
             * Seconds countdown timer
             */
            if ($('.flpl-count-secs').length > 0) {
                counter = setInterval(function () {
                    var seconds = $('.flpl-count-secs').html();
                    var new_second = seconds - 1;
                    if (new_second == 0) {
                        clearInterval(counter);
                        $('.flpl-front-locker-outerwarp').fadeOut(500);
                    } else {
                        $('.flpl-count-secs').html(new_second);
                    }
                }, 1000);
            }
            /**
             * 
             * Page like unlike callback
             */
            var page_unlike_callback = function (url, html_element) {
                if (counter != '') {
                    clearInterval(counter);
                }
                $('.flpl-front-locker-outerwarp').fadeOut(500);
                $.ajax({
                    type: post,
                    url: flpl_js_obj.ajax_url,
                    data: {
                        action: 'flpl_ajax_action',
                        _wpnonce: flpl_js_obj.ajax_nonce
                    },
                    success: function (res) {
                        console.log(res);
                    }
                });
            }

            var page_like_callback = function (url, html_element) {
               
                if (counter != '') {
                    clearInterval(counter);
                }
                $('.flpl-front-locker-outerwarp').fadeOut(500);
                $.ajax({
                    type: 'post',
                    url: flpl_js_obj.ajax_url,
                    data: {
                        action: 'flpl_ajax_action',
                        _wpnonce: flpl_js_obj.ajax_nonce
                    },
                    success: function (res) {
                        console.log(res);
                    }
                });

            }
            if ($('.flpl-front-locker-wrap').length > 0) {

                // In your onload handler
                FB.Event.subscribe('edge.create', page_like_callback);
                FB.Event.subscribe('edge.remove', page_like_callback);
            }
        });

        /**
         * Locker close action
         */
        $('.flpl-close-locker').click(function () {
            $('.flpl-front-locker-outerwarp').fadeOut(500);
            if (counter != '') {
                clearInterval(counter);
            }
        });

        $('.flpl-locker-overlay,.flpl-front-locker-wrap').click(function () {
            if ($('.flpl-close-locker').length > 0) {
                $('.flpl-front-locker-outerwarp').fadeOut(500);
                if (counter != '') {
                    clearInterval(counter);
                }
            }
        });
        

    });//document ready close
}(jQuery));
    