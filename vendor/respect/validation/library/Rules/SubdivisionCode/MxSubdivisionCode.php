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
 * Validator for Mexico subdivision code.
 *
 * ISO 3166-1 alpha-2: MX
 *
 * @link http://www.geonames.org/MX/administrative-division-mexico.html
 */
class MxSubdivisionCode extends AbstractSearcher
{
    public $haystack = [
        'AGU', // Aguascalientes
        'BCN', // Baja California
        'BCS', // Baja California Sur
        'CAM', // Campeche
        'CHH', // Chihuahua
        'CHP', // Chiapas
        'COA', // Coahuila
        'COL', // Colima
        'DIF', // Distrito Federal
        'DUR', // Durango
        'GRO', // Guerrero
        'GUA', // Guanajuato
        'HID', // Hidalgo
        'JAL', // Jalisco
        'MEX', // Mexico
        'MIC', // Michoacan
        'MOR', // Morelos
        'NAY', // Nayarit
        'NLE', // Nuevo Leon
        'OAX', // Oaxaca
        'PUE', // Puebla
        'QUE', // Queretaro
        'ROO', // Quintana Roo
        'SIN', // Sinaloa
        'SLP', // San Luis Potosi
        'SON', // Sonora
        'TAB', // Tabasco
        'TAM', // Tamaulipas
        'TLA', // Tlaxcala
        'VER', // Veracruz
        'YUC', // Yucatan
        'ZAC', // Zacatecas
    ];

    public $compareIdentical = true;
}
