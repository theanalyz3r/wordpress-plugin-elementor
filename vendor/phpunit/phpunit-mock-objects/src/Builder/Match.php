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
 * Builder interface for invocation order matches.
 */
interface PHPUnit_Framework_MockObject_Builder_Match extends PHPUnit_Framework_MockObject_Builder_Stub
{
    /**
     * Defines the expectation which must occur before the current is valid.
     *
     * @param string $id The identification of the expectation that should
     *                   occur before this one.
     *
     * @return PHPUnit_Framework_MockObject_Builder_Stub
     */
    public function after($id);
}
