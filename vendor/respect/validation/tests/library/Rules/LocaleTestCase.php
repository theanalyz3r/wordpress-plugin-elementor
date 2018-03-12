<?php

/**
 *
 * PHP version 5 and 7
 *
 * @author Qordoba Team <support@qordoba.com>
 * @copyright 2018 Qordoba Team
 *
 */

namespace Respect\Validation\Rules;

use malkusch\bav\ConfigurationRegistry;

class LocaleTestCase extends \PHPUnit_Framework_TestCase
{
    protected function getBavMock()
    {
        $bavMock = $this->getMockBuilder('malkusch\bav\BAV')
            ->disableOriginalConstructor()
            ->getMock();

        return $bavMock;
    }

    protected function setUp()
    {
        $dataBackend = $this->getMockForAbstractClass('malkusch\bav\DataBackend');
        $dataBackendContainer = $this->getMockForAbstractClass('malkusch\bav\DataBackendContainer');
        $dataBackendContainer
            ->expects($this->any())
            ->method('makeDataBackend')
            ->will($this->returnValue($dataBackend));

        ConfigurationRegistry::getConfiguration()->setDataBackendContainer($dataBackendContainer);
        ConfigurationRegistry::getConfiguration()->setUpdatePlan(null);
    }
}
