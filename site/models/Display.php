<?php

class Display extends  eCommerce{

  private $tableName;

  function __construct($tableName) {
    $this->tableName = $tableName;
    $this->connectToDB();
  }

  function Data () {
    $query = "SELECT * FROM $this->tableName";
    $sql = $this->cxn->con->prepare($query);
    $sql->execute();
    $data = $sql->fetchAll();
    return $data;
  }

  function info ($username) {
    $query = "SELECT * FROM $this->tableName WHERE username = ?";
    $sql = $this->cxn->con->prepare($query);
    $sql->execute(array($username));
    $data = $sql->fetch();
    return $data;
  }

  function getDataByiD ($id) {
    $id = intval($id);
    $query = "SELECT * FROM $this->tableName WHERE id = ?";
    $sql = $this->cxn->con->prepare($query);
    $sql->execute(array($id));
    $data = $sql->fetch();
    return $data;
  }


  function categories () {
    $query = "SELECT * FROM $this->tableName WHERE visbility != 0";
    $sql = $this->cxn->con->prepare($query);
    $sql->execute();
    $data = $sql->fetchAll();
    return $data;
  }

  function items () {
    $query = "SELECT * FROM $this->tableName WHERE aprove = 1 ORDER BY id DESC";
    $sql = $this->cxn->con->prepare($query);
    $sql->execute();
    $data = $sql->fetchAll();
    return $data;
  }

  function userStat ($username) {

    $sql = $this->cxn->con->prepare("SELECT username, regStatus FROM users WHERE username = ? AND regStatus = 0");
    $sql->execute(array($username));
    $reg = $sql->rowCount();
    return $reg;
  }

  function Myitems ($id) {
    $query = "SELECT * FROM $this->tableName WHERE userID = ?";
    $sql = $this->cxn->con->prepare($query);
    $sql->execute(array($id));
    $data = $sql->fetchAll();
    return $data;
  }

  function comments ($id) {
    $query = "SELECT comments FROM $this->tableName WHERE userID = ?";
    $sql = $this->cxn->con->prepare($query);
    $sql->execute(array($id));
    $data = $sql->fetchAll();
    return $data;
  }
  function displayData ($id) {
    $query = "SELECT items.*, categories.name As catigoryName, users.username FROM items INNER JOIN categories ON categories.id = items.catId INNER JOIN users ON users.id = items.userId WHERE items.id =?";
    $sql = $this->cxn->con->prepare($query);
    $sql->execute(array($id));
    $data = $sql->fetch();
    return $data;
  }

  function CatItems ($id) {
    $query = "SELECT * FROM $this->tableName WHERE catID = ? AND aprove = 1 ORDER BY id DESC";
    $sql = $this->cxn->con->prepare($query);
    $sql->execute(array($id));
    $data = $sql->fetchAll();
    return $data;
  }

  function AllComments ($id) {
    $query = "SELECT comments.*, users.username  FROM comments JOIN users ON users.id = comments.userId  where itemId = ? ORDER BY id DESC";
    $sql = $this->cxn->con->prepare($query);
    $sql->execute(array($id));
    $data = $sql->fetchAll();
    return $data;
  }

}
