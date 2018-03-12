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
 * Constraint that asserts that a string is valid JSON.
 */
class IsJson extends Constraint
{
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
        if ($other === '') {
            return false;
        }

        \json_decode($other);
        if (\json_last_error()) {
            return false;
        }

        return true;
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
        if ($other === '') {
            return 'an empty string is valid JSON';
        }

        \json_decode($other);
        $error = JsonMatchesErrorMessageProvider::determineJsonError(
            \json_last_error()
        );

        return \sprintf(
            '%s is valid JSON (%s)',
            $this->exporter->shortenedExport($other),
            $error
        );
    }

    /**
     * Returns a string representation of the constraint.
     *
     * @return string
     */
    public function toString()
    {
        return 'is valid JSON';
    }
}
