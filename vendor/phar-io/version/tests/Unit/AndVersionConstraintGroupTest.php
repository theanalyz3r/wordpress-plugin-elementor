<?php
/**
 *
 * PHP version 5 and 7
 *
 * @author Qordoba Team <support@qordoba.com>
 * @copyright 2018 Qordoba Team
 *
 */

namespace PharIo\Version;

use PHPUnit\Framework\TestCase;

/**
 * @covers PharIo\Version\AndVersionConstraintGroup
 */
class AndVersionConstraintGroupTest extends TestCase {
    public function testReturnsFalseIfOneConstraintReturnsFalse() {
        $firstConstraint  = $this->createMock(VersionConstraint::class);
        $secondConstraint = $this->createMock(VersionConstraint::class);

        $firstConstraint->expects($this->once())
            ->method('complies')
            ->will($this->returnValue(true));

        $secondConstraint->expects($this->once())
            ->method('complies')
            ->will($this->returnValue(false));

        $group = new AndVersionConstraintGroup('foo', [$firstConstraint, $secondConstraint]);

        $this->assertFalse($group->complies(new Version('1.0.0')));
    }

    public function testReturnsTrueIfAllConstraintsReturnsTrue() {
        $firstConstraint  = $this->createMock(VersionConstraint::class);
        $secondConstraint = $this->createMock(VersionConstraint::class);

        $firstConstraint->expects($this->once())
            ->method('complies')
            ->will($this->returnValue(true));

        $secondConstraint->expects($this->once())
            ->method('complies')
            ->will($this->returnValue(true));

        $group = new AndVersionConstraintGroup('foo', [$firstConstraint, $secondConstraint]);

        $this->assertTrue($group->complies(new Version('1.0.0')));
    }
}
