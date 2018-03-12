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
 * Builder interface for matcher of method names.
 */
interface PHPUnit_Framework_MockObject_Builder_MethodNameMatch extends PHPUnit_Framework_MockObject_Builder_ParametersMatch
{
    /**
     * Adds a new method name match and returns the parameter match object for
     * further matching possibilities.
     *
     * @param PHPUnit_Framework_Constraint $name Constraint for matching method, if a string is passed it will use the PHPUnit_Framework_Constraint_IsEqual
     *
     * @return PHPUnit_Framework_MockObject_Builder_ParametersMatch
     */
    public function method($name);
}
