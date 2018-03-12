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

class QordobaConnectionTest extends \PHPUnit\Framework\TestCase {

  public $apiUrl = "https://app.qordoba.com/api/";
  public $login  = "polina.popadenko@dev-pro.net";
  public $pass   = "WE54iloCKa";

  public function testConnectionAbsentParams() {
    $Conn = new Qordoba\Connection();

    $this->expectException("Qordoba\Exception\AuthException");
    $Conn->requestAuthToken();
  }

  public function testConnectionAbsentUsername() {
    $Conn = new Qordoba\Connection();

    $Conn->setPassword("password");
    $Conn->setApiUrl("http://app.qordoba.com");

    $this->expectException("Qordoba\Exception\AuthException");
    $Conn->requestAuthToken();
  }

  public function testConnectionAbsentPassword() {
    $Conn = new Qordoba\Connection();

    $Conn->setUsername("test");
    $Conn->setApiUrl("http://app.qordoba.com");

    $this->expectException("Qordoba\Exception\AuthException");
    $Conn->requestAuthToken();
  }

  public function testConnectionAbsentURL() {
    $Conn = new Qordoba\Connection();

    $Conn->setUsername("test");
    $Conn->setPassword("password");

    $this->expectException("Qordoba\Exception\ConnException");
    $Conn->requestAuthToken();
  }

  public function testConnection() {
    $Conn = new Qordoba\Connection();

    $Conn->setUsername($this->login);
    $Conn->setPassword($this->pass);
    $Conn->setApiUrl($this->apiUrl);

    $Conn->requestAuthToken();
  }
}