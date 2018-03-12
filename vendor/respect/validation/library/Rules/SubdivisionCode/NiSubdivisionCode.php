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
 * Validator for Nicaragua subdivision code.
 *
 * ISO 3166-1 alpha-2: NI
 *
 * @link http://www.geonames.org/NI/administrative-division-nicaragua.html
 */
class NiSubdivisionCode extends AbstractSearcher
{
    public $haystack = [
        'AN', // Region Autonoma del Atlantico Norte
        'AS', // Region Autonoma del Atlantico Sur
        'BO', // Boaco
        'CA', // Carazo
        'CI', // Chinandega
        'CO', // Chontales
        'ES', // Esteli
        'GR', // Granada
        'JI', // Jinotega
        'LE', // Leon
        'MD', // Madriz
        'MN', // Managua
        'MS', // Masaya
        'MT', // Matagalpa
        'NS', // Nueva Segovia
        'RI', // Rivas
        'SJ', // Rio San Juan
    ];

    public $compareIdentical = true;
}
