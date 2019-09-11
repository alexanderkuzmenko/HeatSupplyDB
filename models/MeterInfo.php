<?php

class MeterInfo extends Model
{
  public $meterinfoId = 0;
  public $accountId = 0;
  public $userId = 0;
  public $meterDate = "1970-01-01 00:00:00";
  public $amount = "";

  public function __construct($meterinfoId = 0) 
  {
    if ($meterinfoId > 0) {
      $meterinfoArray = $this->getMeterInfoById($meterinfoId);
      $this->initObjectFromArray($meterinfoArray);
    }
  }

  public function getMeterInfoById($meterinfoId) 
  {
    $result = [];
    $sql = "SELECT * FROM meter_info WHERE meter_info_id=?";
    $stmt = DataBase::$connection->prepare($sql);
    $stmt->execute([$meterinfoId]);
    return $stmt->fetch();
  }

  public static function getMeterInfoByAccount($accountId) 
  {
    $sql = "SELECT * FROM meter_info WHERE account_id=?";
    $stmt = DataBase::$connection->prepare($sql);
    $stmt->execute([$accountId]);
    return $stmt->fetchAll();
  }
  
  public function create() 
  {
    $sql = "INSERT INTO meter_info("
    . "account_id, "
    . "meter_date, "
    . "amount) "
    . "VALUES (?, ?, ?);";

    $stmt = DataBase::$connection->prepare($sql);
    $stmt->execute([
      $this->accountId,
      $this->meterDate,
      $this->amount
    ]);
    $this->meterInfoId = DataBase::$connection->lastInsertId();
    return $this->meterInfoId;
  }
  
  public function update() 
  {
    $sql = "UPDATE meter_info SET account_=?, street=?, house=?, appartment=? WHERE meterinfo_id=?";
    $stmt = DataBase::$connection->prepare($sql);
    $stmt->execute([
      $this->city,
      $this->street,
      $this->house,
      $this->appartment,
      $this->meterinfoId,
    ]);
  }
  
  public function delete()
  {
    $sql = "DELETE FROM meter_info WHERE meterinfo_id=?";
    $stmt = DataBase::$connection->prepare($sql);
    $stmt->execute([$this->meterinfoId]);
  }

}
