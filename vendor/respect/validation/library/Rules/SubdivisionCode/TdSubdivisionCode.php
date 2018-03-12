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
 * Validator for Chad subdivision code.
 *
 * ISO 3166-1 alpha-2: TD
 *
 * @link http://www.geonames.org/TD/administrative-division-chad.html
 */
class TdSubdivisionCode extends AbstractSearcher
{
    public $haystack = [
        'BA', // Batha
        'BG', // Barh el Ghazel
        'BO', // Borkou
        'CB', // Chari-Baguirmi
        'EN', // Ennedi Est
        'EN', // Ennedi Quest
        'GR', // Guéra
        'HL', // Hadjer-Lamis
        'KA', // Kanem
        'LC', // Lac
        'LO', // Logone Occidental
        'LR', // Logone Oriental
        'MA', // Mandoul
        'MC', // Moyen-Chari
        'ME', // Mayo-Kebbi Est
        'MO', // Mayo-Kebbi Ouest
        'ND', // Ville de N'Djamena
        'OD', // Ouaddaï
        'SA', // Salamat
        'SI', // Sila
        'TA', // Tandjile
        'TI', // Tibesti
        'WF', // Wadi Fira
        'EN', // Ennedi
    ];

    public $compareIdentical = true;
}
