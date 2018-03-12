<?php
/**
 *
 * PHP version 5 and 7
 *
 * @author Qordoba Team <support@qordoba.com>
 * @copyright 2018 Qordoba Team
 *
 */

namespace SebastianBergmann\CodeCoverage;

/**
 * Exception that is raised when @covers must be used but is not.
 */
class MissingCoversAnnotationException extends RuntimeException
{
}
