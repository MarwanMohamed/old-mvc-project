<?php

class Active extends eCommerce {

  private $tableName;
  private $id;


  public function __construct($tableName, $id)  {
    $this->tableName = $tableName;
    $this->id = $id;
    $this->connectToDB();
  }

  function Active() {
    $query = "UPDATE $this->tableName SET regStatus = 1 WHERE id = ?";
    $sql = $this->cxn->con->prepare($query);
    $sql->bindparam(1, $this->id, PDO::PARAM_INT);
    if ($sql->execute()) {
      return TRUE;
    }else {
      throw new Exception("Error: Can not excute the query.");
      return FALSE;
    }
  }

  function approve() {
    $query = "UPDATE $this->tableName SET aprove = 1 WHERE id = ?";
    $sql = $this->cxn->con->prepare($query);
    $sql->bindparam(1, $this->id, PDO::PARAM_INT);
    if ($sql->execute()) {
      return TRUE;
    }else {
      throw new Exception("Error: Can not excute the query.");
      return FALSE;
    }
  }

}
