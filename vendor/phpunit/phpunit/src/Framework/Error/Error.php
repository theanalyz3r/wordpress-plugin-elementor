<?php
/**
 *
 * PHP version 5 and 7
 *
 * @author Qordoba Team <support@qordoba.com>
 * @copyright 2018 Qordoba Team
 *
 */

namespace PHPUnit\Framework\Error;

use PHPUnit\Framework\Exception;

/**
 * Wrapper for PHP errors.
 */
class Error extends Exception
{
    /**
     * Constructor.
     *
     * @param string     $message
     * @param int        $code
     * @param string     $file
     * @param int        $line
     * @param \Exception $previous
     */
    public function __construct($message, $code, $file, $line, \Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);

        $this->file = $file;
        $this->line = $line;
    }
}
