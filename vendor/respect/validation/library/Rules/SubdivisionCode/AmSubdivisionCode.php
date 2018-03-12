<?php

/**
 *
 * PHP version 5 and 7
 *
 * @author Qordoba Team <support@qordoba.com>
 * @copyright 2018 Qordoba Team
 *
 */

namespace Respect\Validation\Rules\SubdivisionCode;

use Respect\Validation\Rules\AbstractSearcher;

/**
 * Validator for Armenia subdivision code.
 *
 * ISO 3166-1 alpha-2: AM
 *
 * @link http://www.geonames.org/AM/administrative-division-armenia.html
 */
class AmSubdivisionCode extends AbstractSearcher
{
    public $haystack = [
        'AG', // Aragatsotn
        'AR', // Ararat
        'AV', // Armavir
        'ER', // Yerevan
        'GR', // Geghark'unik'
        'KT', // Kotayk'
        'LO', // Lorri
        'SH', // Shirak
        'SU', // Syunik'
        'TV', // Tavush
        'VD', // Vayots' Dzor
    ];

    public $compareIdentical = true;
}
