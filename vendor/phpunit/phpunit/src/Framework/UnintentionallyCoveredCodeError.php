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
 * Extension to PHPUnit\Framework\AssertionFailedError to mark the special
 * case of a test that unintentionally covers code.
 */
class UnintentionallyCoveredCodeError extends RiskyTestError
{
}
