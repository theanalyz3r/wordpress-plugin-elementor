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
    $('.qordoba-bulk').each(function () {
        var progressBarTest = false;

        var self = this,
            items = $('.qordoba-status', self).data('items'),
            remaining = items,
            info = $('.qordoba-info', self),
            progress = $('.qordoba-progress', self),
            action = $(this).data('action'),
            timestamp = $(this).data('timestamp'),
            qor_nonce = $("#qor_nonce").val(),
            update = function (response) {
                if (response && response.error) {
                    stop(response.errorMessage);
                    return;
                } else if (!response || !response.hasOwnProperty('updated')) {
                    stop('Error: got wrong response from background process');
                    return;
                }

                remaining -= response.updated;
                var percent = 100 - ((remaining * 100) / items);

                progress.css('width', percent + '%');

                if (remaining > 0 && response.total > 0) {
                    request();
                } else {
                    stop('Done.');
                }
            };

        var request = function () {
            if (progressBarTest) {
                var updated = Math.floor(Math.random() * remaining + 1);
                setTimeout(function () {
                    update({updated: updated, total: remaining});
                }, 2000);
            } else {
                $.ajax({
                    url: ajaxurl,
                    data: {
                        action: action,
                        max_items: remaining,
                        timestamp: timestamp,
                        qor_nonce: qor_nonce
                    }
                })
                    .success(update)
                    .fail(function () {
                        stop('Error: failed to send request.');
                    });
            }
        };

        var start = function (text) {
            var info_text = text ? text : 'Processing...';
            $('.qordoba-loading', self).show();
            info.text(info_text);
            progress.css('border-width', 1);

            request();
        };

        var stop = function (text) {
            var info_text = text ? text : '';
            info.text(info_text);
            $('.qordoba-loading', self).hide();

            progress.hide();
        };

        $('.qordoba_request', self).click(function () {
            $(this).attr('disabled', 'disabled');
            start();
        });
    });

}(jQuery));
