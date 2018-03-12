<?php
/**
 *
 * PHP version 5 and 7
 *
 * @author Qordoba Team <support@qordoba.com>
 * @copyright 2018 Qordoba Team
 *
 */
namespace PHPUnit\Framework\Constraint;

class ExceptionCode extends Constraint
{
    /**
     * @var int
     */
    protected $expectedCode;

    /**
     * @param int $expected
     */
    public function __construct($expected)
    {
        parent::__construct();

        $this->expectedCode = $expected;
    }

    /**
     * Evaluates the constraint for parameter $other. Returns true if the
     * constraint is met, false otherwise.
     *
     * @param \Throwable $other
     *
     * @return bool
     */
    protected function matches($other)
    {
        return (string) $other->getCode() == (string) $this->expectedCode;
    }

    /**
     * Returns the description of the failure
     *
     * The beginning of failure messages is "Failed asserting that" in most
     * cases. This method should return the second part of that sentence.
     *
     * @param mixed $other Evaluated value or object.
     *
     * @return string
     */
    protected function failureDescription($other)
    {
        return \sprintf(
            '%s is equal to expected exception code %s',
            $this->exporter->export($other->getCode()),
            $this->exporter->export($this->expectedCode)
        );
    }

    /**
     * @return string
     */
    public function toString()
    {
        return 'exception code is ';
    }
}
