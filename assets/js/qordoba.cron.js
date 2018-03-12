/*
 *
 * PHP version 5 and 7
 *
 * @author Qordoba Team <support@qordoba.com>
 * @copyright 2018 Qordoba Team
 *
 */

'use strict';
(function () {
    if (qordoba && qordoba.ajaxurl) {
        jQuery.ajax({
            url: qordoba.ajaxurl,
            data: {action: 'qordoba_cron', pll_ajax_backend: 1}
        });
    }
}());
