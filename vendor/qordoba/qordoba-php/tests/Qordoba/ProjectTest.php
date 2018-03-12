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

class QordobaProjectTest extends \PHPUnit\Framework\TestCase {

  public $apiUrl    = "https://app.qordoba.com/api/";
  public $login     = "polina.popadenko@dev-pro.net";
  public $pass      = "WE54iloCKa";
  public $projectId = 4910;
  public $orgId     = 3144;

  public function testProjectFetchMetadata() {
    $Conn = new Qordoba\Connection($this->apiUrl,$this->login, $this->pass);
    $Proj = new Qordoba\Project($this->projectId, $this->orgId, $Conn);

    $data = $Proj->getMetadata();
  }

  public function testProjectTypeCheck() {
    $Conn = new Qordoba\Connection($this->apiUrl,$this->login, $this->pass);
    $Proj = new Qordoba\Project($this->projectId, $this->orgId, $Conn);

    $data = $Proj->getMetadata();

    $Proj->upload("test", "<html><body><div>TESTING SHIT</div></body></html>", null, "html");

    var_dump($data);
  }
}