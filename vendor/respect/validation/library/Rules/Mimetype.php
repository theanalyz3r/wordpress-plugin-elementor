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

/**
 * Validate file mimetypes.
 *
 * @author Henrique Moody <henriquemoody@gmail.com>
 */
class Mimetype extends AbstractRule
{
    /**
     * @var string
     */
    public $mimetype;

    /**
     * @var finfo
     */
    private $fileInfo;

    /**
     * @param string $mimetype
     * @param finfo  $fileInfo
     */
    public function __construct($mimetype, finfo $fileInfo = null)
    {
        $this->mimetype = $mimetype;
        $this->fileInfo = $fileInfo ?: new finfo(FILEINFO_MIME_TYPE);
    }

    /**
     * {@inheritdoc}
     */
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

        return ($this->fileInfo->file($input) == $this->mimetype);
    }
}
