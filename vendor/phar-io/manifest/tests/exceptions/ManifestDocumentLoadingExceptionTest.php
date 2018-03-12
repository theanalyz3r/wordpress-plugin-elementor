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

use DOMDocument;
use LibXMLError;

class ManifestDocumentLoadingExceptionTest extends \PHPUnit_Framework_TestCase {
    public function testXMLErrorsCanBeRetrieved() {
        $dom  = new DOMDocument();
        $prev = libxml_use_internal_errors(true);
        $dom->loadXML('<?xml version="1.0" ?><broken>');
        $exception = new ManifestDocumentLoadingException(libxml_get_errors());
        libxml_use_internal_errors($prev);

        $this->assertContainsOnlyInstancesOf(LibXMLError::class, $exception->getLibxmlErrors());
    }

}