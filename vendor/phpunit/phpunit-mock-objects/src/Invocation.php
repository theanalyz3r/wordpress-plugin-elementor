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
 * Interface for invocations.
 */
interface PHPUnit_Framework_MockObject_Invocation
{
    /**
     * @return mixed Mocked return value.
     */
    public function generateReturnValue();
}
