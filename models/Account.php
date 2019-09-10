<?php

class Account extends Model
{
  public $accountId = 0;
  public $userId = 0;
  public $city = "";
  public $street = "";
  public $house = "";
  public $appartment = "";
  public $creationDate = "1970-01-01 00:00:00";

  public function __construct($accountId = 0) 
  {
    if ($accountId > 0) {
      $accountArray = $this->getAccountById($accountId);
      $this->initObjectFromArray($accountArray);
    }
  }

  public function getAccountById($accountId) 
  {
    $result = [];
    $sql = "SELECT * FROM accounts WHERE account_id=?";
    $stmt = DataBase::$connection->prepare($sql);
    $stmt->execute([$accountId]);
    return $stmt->fetch();
  }

  public static function getAccountsByUser($userId) 
  {
    $sql = "SELECT * FROM accounts WHERE user_id=?";
    $stmt = DataBase::$connection->prepare($sql);
    $stmt->execute([$userId]);
    return $stmt->fetchAll();
  }
  
  public function create() 
  {
    $this->creationDate = date('Y-m-d h:i:s');
    $sql = "INSERT INTO accounts("
    . "user_id, "
    . "city, "
    . "street, "
    . "house, "
    . "appartment, "
    . "creation_date) "
    . "VALUES (?, ?, ?, ?, ?, ?);";

    $stmt = DataBase::$connection->prepare($sql);
    $stmt->execute([
      $this->userId,
      $this->city,
      $this->street,
      $this->house,
      $this->appartment,
      $this->creationDate
    ]);
    $this->accountId = DataBase::$connection->lastInsertId();
    return $this->accountId;
  }
  
  public function update() 
  {
    $sql = "UPDATE accounts SET city=?, street=?, house=?, appartment=? WHERE account_id=?";
    $stmt = DataBase::$connection->prepare($sql);
    $stmt->execute([
      $this->city,
      $this->street,
      $this->house,
      $this->appartment,
      $this->accountId,
    ]);
  }
  
  public function delete()
  {
    $sql = "DELETE FROM accounts WHERE account_id=?";
    $stmt = DataBase::$connection->prepare($sql);
    $stmt->execute([$this->accountId]);
  }

}
