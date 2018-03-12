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

use ReflectionClass;

/**
 * Constraint that asserts that the class it is evaluated for has a given
 * attribute.
 *
 * The attribute name is passed in the constructor.
 */
class ClassHasAttribute extends Constraint
{
    /**
     * @var string
     */
    protected $attributeName;

    /**
     * @param string $attributeName
     */
    public function __construct($attributeName)
    {
        parent::__construct();
        $this->attributeName = $attributeName;
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
        $class = new ReflectionClass($other);

        return $class->hasProperty($this->attributeName);
    }

    /**
     * Returns a string representation of the constraint.
     *
     * @return string
     */
    public function toString()
    {
        return \sprintf(
            'has attribute "%s"',
            $this->attributeName
        );
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
            '%sclass "%s" %s',
            \is_object($other) ? 'object of ' : '',
            \is_object($other) ? \get_class($other) : $other,
            $this->toString()
        );
    }
}
