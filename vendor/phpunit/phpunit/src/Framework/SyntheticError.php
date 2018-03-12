<?php
/**
 *
 * PHP version 5 and 7
 *
 * @author Qordoba Team <support@qordoba.com>
 * @copyright 2018 Qordoba Team
 *
 */

namespace PHPUnit\Framework;

/**
 * Creates a synthetic failed assertion.
 */
class SyntheticError extends AssertionFailedError
{
    /**
     * The synthetic file.
     *
     * @var string
     */
    protected $syntheticFile = '';

    /**
     * The synthetic line number.
     *
     * @var int
     */
    protected $syntheticLine = 0;

    /**
     * The synthetic trace.
     *
     * @var array
     */
    protected $syntheticTrace = [];

    /**
     * Constructor.
     *
     * @param string $message
     * @param int    $code
     * @param string $file
     * @param int    $line
     * @param array  $trace
     */
    public function __construct($message, $code, $file, $line, $trace)
    {
        parent::__construct($message, $code);

        $this->syntheticFile  = $file;
        $this->syntheticLine  = $line;
        $this->syntheticTrace = $trace;
    }

    /**
     * @return string
     */
    public function getSyntheticFile()
    {
        return $this->syntheticFile;
    }

    /**
     * @return int
     */
    public function getSyntheticLine()
    {
        return $this->syntheticLine;
    }

    /**
     * @return array
     */
    public function getSyntheticTrace()
    {
        return $this->syntheticTrace;
    }
}
