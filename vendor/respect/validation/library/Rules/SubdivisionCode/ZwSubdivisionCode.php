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
 * Validator for Zimbabwe subdivision code.
 *
 * ISO 3166-1 alpha-2: ZW
 *
 * @link http://www.geonames.org/ZW/administrative-division-zimbabwe.html
 */
class ZwSubdivisionCode extends AbstractSearcher
{
    public $haystack = [
        'BU', // Bulawayo (city)
        'HA', // Harare (city)
        'MA', // Manicaland
        'MC', // Mashonaland Central
        'ME', // Mashonaland East
        'MI', // Midlands
        'MN', // Matabeleland North
        'MS', // Matabeleland South
        'MV', // Masvingo
        'MW', // Mashonaland West
    ];

    public $compareIdentical = true;
}
