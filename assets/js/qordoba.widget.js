/*
 *
 * PHP version 5 and 7
 *
 * @author Qordoba Team <support@qordoba.com>
 * @copyright 2018 Qordoba Team
 *
 */

'use strict';

(function ($) {
    var wrap, gif, btnDownload, btnSend, save_button, timer, object_type, object_id;

    switch (adminpage) {
        case 'post-php':
            object_type = 'post';
            object_id = $('#post_ID').val();
            save_button = $('#save');
            break;
        case 'term-php':
            object_type = 'term';
            object_id = $('#tag_ID').val();
            save_button = $('#submit');
            break;
    }

    $(function () {
        wrap = $('#qordoba_metabox');
        btnSend = $('button.qordoba-send', wrap);
        btnDownload = $('button.qordoba-download', wrap);
        gif = $('img.qordoba-loading', wrap);
        btnSend.on('click', send_translation);
        btnDownload.on('click', download_translation);
    });

    function send_translation(e) {
        save_button.val('qordoba_send').trigger('click');
        e.preventDefault();
        return false;
    }

    function download_translation(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: ajaxurl,
            complete: function () {
                animationStop();
                window.location.reload();
            },
            data: {
                action: 'qordoba_ajax_download',
                object_type: qor_widget_data.object_type,
                object_id: qor_widget_data.object_id,
                qor_nonce: $('#qor_nonce').val(),
                languages: []
            }
        });
        animationStart();
    }

    function animationStart() {
        gif.show();
        btnSend.attr('disabled', 'disabled');
        btnDownload.attr('disabled', 'disabled');
    }

    function animationStop() {
        gif.hide();
        btnSend.removeAttr('disabled');
        btnDownload.removeAttr('disabled');
        clearTimeout(timer);
    }

}(jQuery));
