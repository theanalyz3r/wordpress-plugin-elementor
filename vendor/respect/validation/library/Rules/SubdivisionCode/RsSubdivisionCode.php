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
 * Validator for Serbia subdivision code.
 *
 * ISO 3166-1 alpha-2: RS
 *
 * @link http://www.geonames.org/RS/administrative-division-serbia.html
 */
class RsSubdivisionCode extends AbstractSearcher
{
    public $haystack = [
        'KM', // Kosovo
        'VO', // Vojvodina
        '00', // Beograd
        '01', // Severnobački okrug
        '02', // Srednjebanatski okrug
        '03', // Severnobanatski okrug
        '04', // Južnobanatski okrug
        '05', // Zapadno-Bački Okrug
        '06', // Južnobački okrug
        '07', // Srem
        '08', // Mačvanski okrug
        '09', // Kolubarski okrug
        '10', // Podunavski okrug
        '11', // Braničevski okrug
        '12', // Šumadija
        '13', // Pomoravski okrug
        '14', // Borski okrug
        '15', // Zaječar
        '16', // Zlatibor
        '17', // Moravički okrug
        '18', // Raški okrug
        '19', // Rasinski okrug
        '20', // Nišavski okrug
        '21', // Toplica
        '22', // Pirotski okrug
        '23', // Jablanički okrug
        '24', // Pčinjski okrug
        '25', // Kosovski okrug
        '26', // Pećki okrug
        '27', // Prizrenski okrug
        '28', // Kosovsko-Mitrovački okrug
        '29', // Kosovsko-Pomoravski okrug
    ];

    public $compareIdentical = true;
}
