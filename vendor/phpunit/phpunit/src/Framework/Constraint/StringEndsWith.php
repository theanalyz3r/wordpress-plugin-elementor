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

/**
 * Constraint that asserts that the string it is evaluated for ends with a given
 * suffix.
 */
class StringEndsWith extends Constraint
{
    /**
     * @var string
     */
    protected $suffix;

    /**
     * @param string $suffix
     */
    public function __construct($suffix)
    {
        parent::__construct();
        $this->suffix = $suffix;
    }

    /**
     * Evaluates the constraint for parameter $other. Returns true if the
     * constraint is met, false otherwise.
     *
     * @param mixed $other Value or object to evaluate.
     *
     * @return bool
     */
    protected function matches($other)
    {
        return \substr($other, 0 - \strlen($this->suffix)) == $this->suffix;
    }

    /**
     * Returns a string representation of the constraint.
     *
     * @return string
     */
    public function toString()
    {
        return 'ends with "' . $this->suffix . '"';
    }
}
