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

use PHPUnit\Util\InvalidArgumentHelper;

/**
 * Constraint that evaluates against a specified closure.
 */
class Callback extends Constraint
{
    private $callback;

    /**
     * @param callable $callback
     *
     * @throws \PHPUnit\Framework\Exception
     */
    public function __construct($callback)
    {
        if (!\is_callable($callback)) {
            throw InvalidArgumentHelper::factory(
                1,
                'callable'
            );
        }

        parent::__construct();

        $this->callback = $callback;
    }

    /**
     * Evaluates the constraint for parameter $value. Returns true if the
     * constraint is met, false otherwise.
     *
     * @param mixed $other Value or object to evaluate.
     *
     * @return bool
     */
    protected function matches($other)
    {
        return \call_user_func($this->callback, $other);
    }

    /**
     * Returns a string representation of the constraint.
     *
     * @return string
     */
    public function toString()
    {
        return 'is accepted by specified callback';
    }
}
