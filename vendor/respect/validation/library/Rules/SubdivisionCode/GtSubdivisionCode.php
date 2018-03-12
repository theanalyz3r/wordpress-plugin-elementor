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
 * Validator for Guatemala subdivision code.
 *
 * ISO 3166-1 alpha-2: GT
 *
 * @link http://www.geonames.org/GT/administrative-division-guatemala.html
 */
class GtSubdivisionCode extends AbstractSearcher
{
    public $haystack = [
        'AV', // Alta Verapaz
        'BV', // Baja Verapaz
        'CM', // Chimaltenango
        'CQ', // Chiquimula
        'ES', // Escuintla
        'GU', // Guatemala
        'HU', // Huehuetenango
        'IZ', // Izabal
        'JA', // Jalapa
        'JU', // Jutiapa
        'PE', // El Peten
        'PR', // El Progreso
        'QC', // El Quiche
        'QZ', // Quetzaltenango
        'RE', // Retalhuleu
        'SA', // Sacatepequez
        'SM', // San Marcos
        'SO', // Solola
        'SR', // Santa Rosa
        'SU', // Suchitepequez
        'TO', // Totonicapan
        'ZA', // Zacapa
    ];

    public $compareIdentical = true;
}
