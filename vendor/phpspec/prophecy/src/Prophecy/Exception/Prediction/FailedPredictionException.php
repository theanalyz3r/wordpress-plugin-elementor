<?php

/**
 *
 * PHP version 5 and 7
 *
 * @author Qordoba Team <support@qordoba.com>
 * @copyright 2018 Qordoba Team
 *
 */

namespace Prophecy\Exception\Prediction;

use RuntimeException;

/**
 * Basic failed prediction exception.
 * Use it for custom prediction failures.
 *
 * @author Konstantin Kudryashov <ever.zet@gmail.com>
 */
class FailedPredictionException extends RuntimeException implements PredictionException
{
}
