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
 * Validator for Burundi subdivision code.
 *
 * ISO 3166-1 alpha-2: BI
 *
 * @link http://www.geonames.org/BI/administrative-division-burundi.html
 */
class BiSubdivisionCode extends AbstractSearcher
{
    public $haystack = [
        'BB', // Bubanza
        'BL', // Bujumbura Rural
        'BM', // Bujumbura Mairie
        'BR', // Bururi
        'CA', // Cankuzo
        'CI', // Cibitoke
        'GI', // Gitega
        'KI', // Kirundo
        'KR', // Karuzi
        'KY', // Kayanza
        'MA', // Makamba
        'MU', // Muramvya
        'MW', // Mwaro
        'MY', // Muyinga
        'NG', // Ngozi
        'RT', // Rutana
        'RY', // Ruyigi
    ];

    public $compareIdentical = true;
}
