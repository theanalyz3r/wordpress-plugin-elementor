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
 * Validator for Mauritania subdivision code.
 *
 * ISO 3166-1 alpha-2: MR
 *
 * @link http://www.geonames.org/MR/administrative-division-mauritania.html
 */
class MrSubdivisionCode extends AbstractSearcher
{
    public $haystack = [
        '01', // Hodh Ech Chargui
        '02', // Hodh El Gharbi
        '03', // Assaba
        '04', // Gorgol
        '05', // Brakna
        '06', // Trarza
        '07', // Adrar
        '08', // Dakhlet Nouadhibou
        '09', // Tagant
        '10', // Guidimaka
        '11', // Tiris Zemmour
        '12', // Inchiri
        'NKC', // Nouakchott
    ];

    public $compareIdentical = true;
}
