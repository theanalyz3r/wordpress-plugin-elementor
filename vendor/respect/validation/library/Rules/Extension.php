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

use SplFileInfo;

/**
 * Validate file extensions.
 *
 * @author Henrique Moody <henriquemoody@gmail.com>
 */
class Extension extends AbstractRule
{
    /**
     * @var string
     */
    public $extension;

    /**
     * @param string $extension
     */
    public function __construct($extension)
    {
        $this->extension = $extension;
    }

    /**
     * {@inheritdoc}
     */
    public function validate($input)
    {
        if ($input instanceof SplFileInfo) {
            return ($input->getExtension() == $this->extension);
        }

        if (!is_string($input)) {
            return false;
        }

        return (pathinfo($input, PATHINFO_EXTENSION) == $this->extension);
    }
}
