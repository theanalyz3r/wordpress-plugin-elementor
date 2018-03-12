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
 * Validator for Namibia subdivision code.
 *
 * ISO 3166-1 alpha-2: NA
 *
 * @link http://www.geonames.org/NA/administrative-division-namibia.html
 */
class NaSubdivisionCode extends AbstractSearcher
{
    public $haystack = [
        'CA', // Caprivi
        'ER', // Erongo
        'HA', // Hardap
        'KA', // Karas
        'KH', // Khomas
        'KU', // Kunene
        'OD', // Otjozondjupa
        'OH', // Omaheke
        'ON', // Oshana
        'OS', // Omusati
        'OT', // Oshikoto
        'OW', // Ohangwena
        'OK', // Kavango
    ];

    public $compareIdentical = true;
}
