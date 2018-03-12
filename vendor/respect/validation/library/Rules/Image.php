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

use finfo;
use SplFileInfo;

class Image extends AbstractRule
{
    public $fileInfo;

    public function __construct(finfo $fileInfo = null)
    {
        $this->fileInfo = $fileInfo ?: new finfo(FILEINFO_MIME_TYPE);
    }

    public function validate($input)
    {
        if ($input instanceof SplFileInfo) {
            $input = $input->getPathname();
        }

        if (!is_string($input)) {
            return false;
        }

        if (!is_file($input)) {
            return false;
        }

        return (0 === strpos($this->fileInfo->file($input), 'image/'));
    }
}
