<?php

class Update extends eCommerce {

  private $tableName;
  private $data;


  public function __construct($tableName, $data)  {
    if (is_array($data)) {
      $this->data = $data;
    }else {
      throw new Exception("data must be in an array");
    }
    $this->tableName = $tableName;

    $this->connectToDB();
  }

  function Update($id) {
    $query = "UPDATE $this->tableName SET ";
    foreach ($this->data as $key => $value) {
      $query .= "$key = :$key, ";
    }
    $ptr = '++ ';
    $query .= $ptr;
    $query = str_replace(', '.$ptr , '', $query);
    $query .= " WHERE id = $id";
    $sql = $this->cxn->con->prepare($query);
    foreach ($this->data as $key => $value) {
      $sql->bindparam(":$key",$this->data[$key]);
    }
    if ($sql->execute()) {
      return TRUE;
    }else {
      throw new Exception("Error: Can not excute the query.");
      return FALSE;
    }
  }

}
