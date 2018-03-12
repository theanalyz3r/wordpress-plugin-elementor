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
 * Validator for Suriname subdivision code.
 *
 * ISO 3166-1 alpha-2: SR
 *
 * @link http://www.geonames.org/SR/administrative-division-suriname.html
 */
class SrSubdivisionCode extends AbstractSearcher
{
    public $haystack = [
        'BR', // Brokopondo
        'CM', // Commewijne
        'CR', // Coronie
        'MA', // Marowijne
        'NI', // Nickerie
        'PM', // Paramaribo
        'PR', // Para
        'SA', // Saramacca
        'SI', // Sipaliwini
        'WA', // Wanica
    ];

    public $compareIdentical = true;
}
