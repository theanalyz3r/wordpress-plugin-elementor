<?php
/**
 *
 * PHP version 5 and 7
 *
 * @author Qordoba Team <support@qordoba.com>
 * @copyright 2018 Qordoba Team
 *
 */

namespace phpDocumentor\Reflection;

/**
 * Interface for files processed by the ProjectFactory
 */
interface File
{
    /**
     * Returns the content of the file as a string.
     *
     * @return string
     */
    public function getContents();

    /**
     * Returns md5 hash of the file.
     *
     * @return string
     */
    public function md5();

    /**
     * Returns an relative path to the file.
     *
     * @return string
     */
    public function path();
}
