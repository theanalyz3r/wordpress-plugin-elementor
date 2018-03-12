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
 * Validator for Togo subdivision code.
 *
 * ISO 3166-1 alpha-2: TG
 *
 * @link http://www.geonames.org/TG/administrative-division-togo.html
 */
class TgSubdivisionCode extends AbstractSearcher
{
    public $haystack = [
        'C', // Centrale
        'K', // Kara
        'M', // Maritime
        'P', // Plateaux
        'S', // Savanes
    ];

    public $compareIdentical = true;
}
