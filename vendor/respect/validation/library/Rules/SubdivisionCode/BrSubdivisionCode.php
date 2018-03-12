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
 * Validator for Brazil subdivision code.
 *
 * ISO 3166-1 alpha-2: BR
 *
 * @link http://www.geonames.org/BR/administrative-division-brazil.html
 */
class BrSubdivisionCode extends AbstractSearcher
{
    public $haystack = [
        'AC', // Acre
        'AL', // Alagoas
        'AM', // Amazonas
        'AP', // Amapa
        'BA', // Bahia
        'CE', // Ceara
        'DF', // Distrito Federal
        'ES', // Espirito Santo
        'GO', // Goias
        'MA', // Maranhao
        'MG', // Minas Gerais
        'MS', // Mato Grosso do Sul
        'MT', // Mato Grosso
        'PA', // Para
        'PB', // Paraiba
        'PE', // Pernambuco
        'PI', // Piaui
        'PR', // Parana
        'RJ', // Rio de Janeiro
        'RN', // Rio Grande do Norte
        'RO', // Rondonia
        'RR', // Roraima
        'RS', // Rio Grande do Sul
        'SC', // Santa Catarina
        'SE', // Sergipe
        'SP', // Sao Paulo
        'TO', // Tocantins
    ];

    public $compareIdentical = true;
}
