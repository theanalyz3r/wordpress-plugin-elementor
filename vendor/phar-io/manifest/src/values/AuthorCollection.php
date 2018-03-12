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

class AuthorCollection implements \Countable, \IteratorAggregate {
    /**
     * @var Author[]
     */
    private $authors = [];

    public function add(Author $author) {
        $this->authors[] = $author;
    }

    /**
     * @return Author[]
     */
    public function getAuthors() {
        return $this->authors;
    }

    /**
     * @return int
     */
    public function count() {
        return count($this->authors);
    }

    /**
     * @return AuthorCollectionIterator
     */
    public function getIterator() {
        return new AuthorCollectionIterator($this);
    }
}
