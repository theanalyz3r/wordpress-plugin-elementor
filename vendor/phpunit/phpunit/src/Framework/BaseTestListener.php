<?php
/**
 *
 * PHP version 5 and 7
 *
 * @author Qordoba Team <support@qordoba.com>
 * @copyright 2018 Qordoba Team
 *
 */
namespace PHPUnit\Framework;

/**
 * Implementation of the TestListener interface that does not do anything.
 *
 * @deprecated Use TestListenerDefaultImplementation trait instead
 */
abstract class BaseTestListener implements TestListener
{
    use TestListenerDefaultImplementation;
}
