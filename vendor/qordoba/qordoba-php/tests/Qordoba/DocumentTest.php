<?php
/**
 *
 * PHP version 5 and 7
 *
 * @author Qordoba Team <support@qordoba.com>
 * @copyright 2018 Qordoba Team
 *
 */

namespace Qordoba\Test;

use Qordoba;
use Qordoba\Exception\DocumentException;
use Qordoba\Exception\ServerException;

class QordobaDocumentTest extends \PHPUnit\Framework\TestCase {

  public $apiUrl    = "https://app.qordoba.com/api/";
  public $login     = "polina.popadenko@dev-pro.net";
  public $pass      = "WE54iloCKa";
  public $projectId = 4910;
  public $orgId     = 3144;

  public $Doc       = null;

  public function setUp() {
    $this->Doc = new Qordoba\Document(
      $this->apiUrl,
      $this->login,
      $this->pass,
      $this->projectId,
      $this->orgId);
  }

  public function testGetName() {
    $this->assertEquals("", $this->Doc->getName());
  }

  public function testSetName() {
    $this->Doc->setName("UnitTestString");
    $this->assertEquals("UnitTestString", $this->Doc->getName());
  }

  public function testGetTag() {
    $this->assertEquals("New", $this->Doc->getTag());
  }

  public function testSetTag() {
    $this->Doc->setTag("WillBeTested");
    $this->assertEquals("WillBeTested", $this->Doc->getTag());
  }

  public function testGetType() {
    $this->assertEquals("default", $this->Doc->getType());
  }

  public function testSetType() {
    $this->Doc->setType("WillBeTestedType");
    $this->assertEquals("WillBeTestedType", $this->Doc->getType());
  }


  public function testGetTranslationString() {
    $this->assertFalse($this->Doc->getTranslationString("Test"));

    $this->Doc->addTranslationString("Test", "String for testing");
    $this->assertEquals("String for testing", $this->Doc->getTranslationString("Test"));
  }

  public function testAddTranslationString() {
    $this->assertFalse($this->Doc->getTranslationString("Test"));

    $Sec = $this->Doc->addSection("product");
    $Sec->addTranslationString("key1", "value");
    $Sec->addTranslationString("key2", "value");
    //$this->assertEquals("String for testing", $this->Doc->getTranslationString("Test"));

    //$this->expectException('\Qordoba\Exception\DocumentException');
    //$this->Doc->addTranslationString("Test", "String for testing");
  }

  public function testUpdateTranslationString() {
    $this->Doc->addTranslationString("Test", "String for testing");

    $this->Doc->updateTranslationString("Test", "String for testing updated");
    $this->assertEquals("String for testing updated", $this->Doc->getTranslationString("Test"));

    $this->expectException('\Qordoba\Exception\DocumentException');
    $this->Doc->updateTranslationString("Nya", "TEST");
  }

  public function testUpdateTranslationStrings() {
    //$this->assertTrue(empty($this->Doc->getTranslationStrings()));

    $this->Doc->addTranslationString("Test", "String for testing");
    $this->Doc->addTranslationString("Test2", "String for testing");

    $this->assertArrayHasKey("Test", $this->Doc->getTranslationStrings());
    $this->assertArrayHasKey("Test2", $this->Doc->getTranslationStrings());

    $this->assertEquals("String for testing", $this->Doc->getTranslationStrings()['Test']);
  }

  public function testRemoveTranslationString() {
    $this->Doc->addTranslationString("Test", "String for testing");
    $this->Doc->addTranslationString("Test2", "testing");
    $this->Doc->addTranslationString("Test3", "testing");
    $this->Doc->addTranslationString("Test4", "testing");

    $this->assertArrayHasKey("Test", $this->Doc->getTranslationStrings());
    $this->Doc->removeTranslationString("Test");

    $this->assertArrayNotHasKey("Test", $this->Doc->getTranslationStrings());

    $this->Doc->removeTranslationString("testing");
    $this->assertArrayNotHasKey("Test2", $this->Doc->getTranslationStrings());
  }

  public function testGetMetadata() {
    $meta = $this->Doc->getMetadata();
    $this->assertEquals(2, $this->Doc->getConnection()->getRequestCount());
    $this->assertArrayHasKey("languages", $meta);
  }

  public function testDocumentCreateHTML() {
    $this->Doc = new Qordoba\Document(
      $this->apiUrl,
      $this->login,
      $this->pass,
      $this->projectId,
      $this->orgId);

    $filename = "testdoc-html-2";
    $this->Doc->setType("html");
    $this->Doc->setTag("v4");
    $this->Doc->setName($filename);

    $this->Doc->addTranslationContent("<html><body><div>Testing Content</div><div>Another Testing Content</div></body></html>");
    $this->Doc->createTranslation();
  }

  public function testDocumentCheckHTML() {
    $this->Doc = new Qordoba\Document(
      $this->apiUrl,
      $this->login,
      $this->pass,
      $this->projectId,
      $this->orgId);

    $filename = "testdoc-html-5";
    $this->Doc->setType("html");
    $this->Doc->setTag("v4");
    $this->Doc->setName($filename);

    $languages = $this->Doc->getProjectLanguages();

    $checkLangs = [];
    foreach($languages as $key => $lang) {
      array_push($checkLangs, $lang->code);
    }
    $checkLang = "de-de";

    $result = $this->Doc->fetchTranslation($checkLang);
    var_dump($result);
  }

  public function testDocumentCreate() {
    $this->Doc = new Qordoba\Document(
      $this->apiUrl,
      $this->login,
      $this->pass,
      $this->projectId,
      $this->orgId);

    $DefSection = $this->Doc->addSection("data");

    $DefSection->addTranslationString("column1", "translate this for me");
    $DefSection->addTranslationString("column2", "others");
    $DefSection->addTranslationString("column3", "legends");
    $DefSection->addTranslationString("column4", "my country is beautiful");

    $filename = "testdoc";
    $this->Doc->setTag("v4");
    $this->Doc->setName($filename);
    $Meta = $this->Doc->getProject()->getMetadata();

    print_r("\n");
    print_r(json_encode($Meta, JSON_PRETTY_PRINT));

    print_r("\n\n");
    print_r(json_encode($this->Doc->_sections, JSON_PRETTY_PRINT));
    $fileId = $this->Doc->createTranslation();

    print_r("\n\n");
    print_r(json_encode($fileId, JSON_PRETTY_PRINT));
    $this->assertEquals(4, $this->Doc->getConnection()->getRequestCount());

    foreach($this->Doc->getConnection()->getRequests() as $key => $response) {
      $this->assertEquals("200", $response->getStatusCode());
    }

    $testLang = (array)$this->Doc->getProjectLanguages();
    $testLang = array_shift($testLang);

    //Searching for submitted doc
    $submittedDocs = $this->Doc->getConnection()->fetchProjectSearch($this->projectId, $testLang->id, $filename, "none");

    $this->assertTrue($submittedDocs->meta->paging->total_results  > 0);
  }

  public function testDocumentUpdate() {
    $this->Doc = new Qordoba\Document(
      $this->apiUrl,
      $this->login,
      $this->pass,
      $this->projectId,
      $this->orgId);

    $DefSection = $this->Doc->addSection("data");

    $DefSection->addTranslationString("column1", "translate this for me");
    $DefSection->addTranslationString("column2", "others");
    $DefSection->addTranslationString("column3", "legends");
    $DefSection->addTranslationString("column4", "my country is beautiful");

    $filename = "testdoc";
    $this->Doc->setTag("v10");
    $this->Doc->setName($filename);
    $Meta = $this->Doc->getProject()->getMetadata();

    $fileId = $this->Doc->createTranslation();

    $this->assertEquals(5, $this->Doc->getConnection()->getRequestCount());

    foreach($this->Doc->getConnection()->getRequests() as $key => $response) {
      $this->assertEquals("200", $response->getStatusCode());
    }

    $DefSection->addTranslationString("column5", "UPDATE");

    $this->Doc->setTag("Updated5");
    $this->Doc->updateTranslation();

    $testLang = (array)$this->Doc->getProjectLanguages();
    $testLang = array_shift($testLang);

    //Searching for submitted doc
    $submittedDocs = $this->Doc->getConnection()->fetchProjectSearch($this->projectId, $testLang->id, $filename, "none");
    print_r("\n\n");
    print_r(json_encode($submittedDocs, JSON_PRETTY_PRINT));

    $this->assertTrue($submittedDocs->meta->paging->total_results > 0);

    $lastVersion = array_shift($submittedDocs->pages);
    $this->assertEquals($lastVersion->version_tag, "Updated");
    $this->assertEquals($lastVersion->url, $filename . ".json");

    $this->expectException('\GuzzleHttp\Exception\ServerException');
    $this->Doc->updateTranslation();
  }

  public function testDocumentCheck() {
    $this->Doc->setName("Translation Test");
    $languages = $this->Doc->getProjectLanguages();
    $result = (array)$this->Doc->checkTranslation();
    $checkLangs = [];
    foreach($languages as $key => $lang) {
      array_push($checkLangs, $lang->code);
    }

    foreach($checkLangs as $key => $code) {
      $this->assertArrayHasKey($code, $result);
    }

    $checkLang = array_shift($checkLangs);

    $result = (array)$this->Doc->checkTranslation($checkLang);

    $this->assertArrayHasKey($checkLang, $result);
  }

  public function testDocumentFetch() {
    $this->Doc->setName("Translation Test");
    $languages = $this->Doc->getProjectLanguages();
    $result = (array)$this->Doc->fetchTranslation();
    $checkLangs = [];
    foreach($languages as $key => $lang) {
      array_push($checkLangs, $lang->code);
    }

    $checkLang = "es-es";

    $this->assertArrayHasKey($checkLang, $result);
    $result = (array)$this->Doc->fetchTranslation($checkLang);

    $this->assertArrayHasKey($checkLang, $result);
  }

}