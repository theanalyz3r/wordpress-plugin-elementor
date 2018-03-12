<?php
/**
 *
 * PHP version 5 and 7
 *
 * @author Qordoba Team <support@qordoba.com>
 * @copyright 2018 Qordoba Team
 *
 */

namespace PharIo\Manifest;

class CopyrightInformation {
    /**
     * @var AuthorCollection
     */
    private $authors;

    /**
     * @var License
     */
    private $license;

    public function __construct(AuthorCollection $authors, License $license) {
        $this->authors = $authors;
        $this->license = $license;
    }

    /**
     * @return AuthorCollection
     */
    public function getAuthors() {
        return $this->authors;
    }

    /**
     * @return License
     */
    public function getLicense() {
        return $this->license;
    }
}
