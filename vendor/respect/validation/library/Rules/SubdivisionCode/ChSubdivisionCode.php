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
 * Validator for Switzerland subdivision code.
 *
 * ISO 3166-1 alpha-2: CH
 *
 * @link http://www.geonames.org/CH/administrative-division-switzerland.html
 */
class ChSubdivisionCode extends AbstractSearcher
{
    public $haystack = [
        'AG', // Aargau
        'AI', // Appenzell Innerhoden
        'AR', // Appenzell Ausserrhoden
        'BE', // Bern
        'BL', // Basel-Landschaft
        'BS', // Basel-Stadt
        'FR', // Fribourg
        'GE', // Geneva
        'GL', // Glarus
        'GR', // Graubunden
        'JU', // Jura
        'LU', // Lucerne
        'NE', // Neuchâtel
        'NW', // Nidwalden
        'OW', // Obwalden
        'SG', // St. Gallen
        'SH', // Schaffhausen
        'SO', // Solothurn
        'SZ', // Schwyz
        'TG', // Thurgau
        'TI', // Ticino
        'UR', // Uri
        'VD', // Vaud
        'VS', // Valais
        'ZG', // Zug
        'ZH', // Zurich
    ];

    public $compareIdentical = true;
}
