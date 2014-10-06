<?php

namespace WS;

class app extends \slimClass\service {

  private $dbDetails = array('username' => 'skiJumping',
    'password' => 'xDNUqSx9P2D7BpNy',
    'database' => 'skiJumping');
  private $dbHandle;

  public function __construct($app, $path) {
    parent::__construct($app, $path);
    $this->dbHandle = new \database\sql($this->dbDetails['database'], $this->dbDetails['username'], $this->dbDetails['password']);
  }

  public function getRecentjumps($from = 0) {
    $this->setCT(self::CT_JSON);
    $query = $this->dbHandle->prepare("select * from jumpData order by time desc limit :num,30");
    $query->bindValue(':num', (int) trim($from), \PDO::PARAM_INT);
    $data = $this->dbHandle->getData($query);
    $this->response->body(json_encode($data, JSON_NUMERIC_CHECK));
  }

  public function getJumpdata($id) {
    $this->setCT(self::CT_JSON);
    $jumpData = $this->dbHandle->getById('jumpData', $id);
    $jumpMeasurement = $this->dbHandle->getById('jumpMeasurement', $id, 'jumpData_id');
    $jumpMeasurement['data'] = json_decode($jumpMeasurement['data'], true);
    $jumpAnalysis = $this->dbHandle->getById('jumpAnalysis', $jumpMeasurement['id'], 'jumpMeasurement_id');
    $jumpAnalysis['data'] = json_decode($jumpAnalysis['data'], true);

    $details = array();

    if ($jumpData['event_id'] != 0) {
      $details['event'] = $this->dbHandle->getById('event', $jumpData['event_id']);
    }
    if ($jumpData['hill_id'] != 0) {
      $details['hill'] = $this->dbHandle->getById('hill', $jumpData['hill_id']);
    }
    if ($jumpData['jumper_id'] != 0) {
      $details['jumper'] = $this->dbHandle->getById('jumper', $jumpData['jumper_id']);
    }
    $data = array(
      'data' => $jumpData,
      'measurement' => $jumpMeasurement,
      'analysis' => $jumpAnalysis,
      'details' => $details,
    );
    $this->response->body(json_encode($data, JSON_NUMERIC_CHECK));
  }
  public function getLatestjump($skip=0){
    $query = $this->dbHandle->prepare('select id from jumpData order by id desc limit :skip,1');
    $query->bindValue(':skip', (int) trim($skip), \PDO::PARAM_INT);
    $data = $this->dbHandle->getData($query);
    $this->getJumpdata($data[0]['id']);
  }

}

?>
