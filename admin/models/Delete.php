<?php

class Delete extends eCommerce {
  private $tableName;

   function __construct($tableName) {
    $this->tableName = $tableName;
    $this->connectToDB();
  }

  function Delete($id) {
    try {
      $query = "DELETE FROM $this->tableName WHERE id = $id";
      $sql = $this->cxn->con->prepare($query);
      $exe = $sql->execute();
      if ($exe) {
        return True;
      }
    } catch (Exception $e) {
      echo $e->getMessage();
    }


  }
}
