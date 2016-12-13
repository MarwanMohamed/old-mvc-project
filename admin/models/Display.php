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

  function getDataByiD ($id) {
    $id = intval($id);
    $query = "SELECT * FROM $this->tableName WHERE id = ?";
    $sql = $this->cxn->con->prepare($query);
    $sql->execute(array($id));
    $data = $sql->fetch();
    return $data;
  }

  function getAllData () {
    $query = "SELECT * FROM $this->tableName WHERE groupid !=1";
    $sql = $this->cxn->con->prepare($query);
    $sql->execute();
    $data = $sql->fetchAll();
    return $data;
  }
  function getPanding () {
    $query = "SELECT * FROM $this->tableName WHERE groupid !=1 AND regStatus !=1";
    $sql = $this->cxn->con->prepare($query);
    $sql->execute();
    $data = $sql->fetchAll();
    return $data;
  }

  function getData ($sort) {
    $query = "SELECT * FROM $this->tableName ORDER BY ordaring $sort";
    $sql = $this->cxn->con->prepare($query);
    $sql->execute();
    $data = $sql->fetchAll();
    return $data;
  }

  function displayData () {
    $query = "SELECT items.*, categories.name AS categoryName , users.username FROM $this->tableName JOIN categories ON categories.id = items.catID JOIN users ON users.id = items.userID ORDER BY items.id DESC";
    $sql = $this->cxn->con->prepare($query);
    $sql->execute();
    $data = $sql->fetchAll();
    return $data;
  }

  function displayDataByID ($id) {
    $query = "SELECT items.*, categories.name AS categoryName , users.username FROM $this->tableName JOIN categories ON categories.id = items.catID JOIN users ON users.id = items.userID WHERE items.id = $id";
    $sql = $this->cxn->con->prepare($query);
    $sql->execute();
    $data = $sql->fetchAll();
    return $data;
  }

  function Latest ($select, $order, $limit) {
    $query = "SELECT $select FROM $this->tableName ORDER BY $order DESC LIMIT $limit ";
    $sql = $this->cxn->con->prepare($query);
    $sql->execute();
    $data = $sql->fetchAll();
    return $data;
  }

  function LatestUsers ($select, $order, $limit) {
    $query = "SELECT $select FROM $this->tableName WHERE groupID !=1 ORDER BY $order DESC LIMIT $limit ";
    $sql = $this->cxn->con->prepare($query);
    $sql->execute();
    $data = $sql->fetchAll();
    return $data;
  }

  function Comments ($limit) {
    $query = "SELECT comments.*, users.username  FROM $this->tableName JOIN users ON users.id = comments.userId ORDER BY id DESC LIMIT $limit";
    $sql = $this->cxn->con->prepare($query);
    $sql->execute();
    $data = $sql->fetchAll();
    return $data;
  }

  function CountItems ($table, $condition) {
    $sql = $this->cxn->con->prepare("SELECT count(id) FROM $table $condition");
    $sql->execute();
    $data = $sql->fetchColumn();
    return $data;
  }

  function getComments () {
    $query = "SELECT comments.*, users.username, items.name  FROM $this->tableName JOIN users ON users.id = comments.userId JOIN items ON items.id = comments.itemId ORDER BY id DESC";
    $sql = $this->cxn->con->prepare($query);
    $sql->execute();
    $data = $sql->fetchAll();
    return $data;
  }

}
