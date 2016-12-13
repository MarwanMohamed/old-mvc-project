<?php

class Add extends eCommerce {

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


  function insert() {
    try {
      foreach ($this->data as $key => $value) {
        $keys[] = $key;
        $values[] = $value;
      }
      $dataKeys = implode($keys, ', ');
      $dataVal = ':'.implode($keys, ', :');
      $query = "INSERT INTO $this->tableName ($dataKeys) VALUES ($dataVal)";
      $sql = $this->cxn->con->prepare($query);
      foreach ($this->data as $key => $value) {
        $sql->bindparam(":$key",$this->data[$key]);
      }
      $exe = $sql->execute();
      if ($exe) {
        return TRUE;
      }else {
        throw new Exception("Error: Can not excute the query");
      }

    } catch (Exception $e) {
        echo $e->getMessage();
    }

  }

}
