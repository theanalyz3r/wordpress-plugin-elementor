<?php
/**
 *
 * PHP version 5 and 7
 *
 * @author Qordoba Team <support@qordoba.com>
 * @copyright 2018 Qordoba Team
 *
 */

/**
 * Builder interface for unique identifiers.
 *
 * Defines the interface for recording unique identifiers. The identifiers
 * can be used to define the invocation order of expectations. The expectation
 * is recorded using id() and then defined in order using
 * PHPUnit_Framework_MockObject_Builder_Match::after().
 */
interface PHPUnit_Framework_MockObject_Builder_Identity
{
    /**
     * Sets the identification of the expectation to $id.
     *
     * @note The identifier is unique per mock object.
     *
     * @param string $id Unique identification of expectation.
     */
    public function id($id);
}
