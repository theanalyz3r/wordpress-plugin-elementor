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
 * Validator for East Timor subdivision code.
 *
 * ISO 3166-1 alpha-2: TL
 *
 * @link http://www.geonames.org/TL/administrative-division-east-timor.html
 */
class TlSubdivisionCode extends AbstractSearcher
{
    public $haystack = [
        'AL', // Aileu
        'AN', // Ainaro
        'BA', // Baucau
        'BO', // Bobonaro
        'CO', // Cova Lima
        'DI', // Dili
        'ER', // Ermera
        'LA', // Lautem
        'LI', // Liquica
        'MF', // Manufahi
        'MT', // Manatuto
        'OE', // Oecussi
        'VI', // Viqueque
    ];

    public $compareIdentical = true;
}
