<?php

class User extends Model
{

  public $userId = 0;
  public $email = "";
  public $password = "";
  public $firstName =  "";
  public $lastName = "";
  public $middleName = "";
  public $phone = "";
  public $address = "";
  public $image = "";
  public $registrationDate = "1970-01-01 00:00:00";

  public $imageFullPath = "";

  public function __construct($userId = 0) 
  {
    if ($userId > 0) {
      $userArray = $this->getUserById($userId);
      $this->initObjectFromArray($userArray);
      $this->setImageFullPath();
    }
  }


  public function getUserById($userId) 
  {
    $result = [];
    $sql = "SELECT * FROM users WHERE user_id=?";
    $stmt = DataBase::$connection->prepare($sql);
    $stmt->execute([$userId]);
    return $stmt->fetch();
  }

  public function getUserByLoginForm($user = [])
  {
    if (isset($user)) {
      $sql = 'SELECT * FROM users WHERE email=? AND password=?';
      $stmt = DataBase::$connection->prepare($sql);
      $stmt->execute([$user['email'], $user['password']]);
      $userArray = $stmt->fetch();
      if (!empty($userArray)) {
        $this->initObjectFromArray($userArray);
        return true;
      }
      return false;
    }
    return false;
  }

  public function create() {
    $this->registrationDate = date('Y-m-d h:i:s');
    $sql = "INSERT INTO users("
    . "email, "
    . "password, "
    . "registration_date) "
    . "VALUES (?, ?, ?);";

    $stmt = DataBase::$connection->prepare($sql);
    $stmt->execute([
      $this->email,
      $this->password,
      $this->registrationDate
    ]);
    $this->userId = DataBase::$connection->lastInsertId();
    return $this->userId;
  }
  
  public function update() {
    $oldImage = $this->getImage();
    if ($newImage = Image::setImage('users/' . $this->userId, $oldImage)) {
      $this->image = $newImage;
    } else {
      $this->image = $oldImage;
    };
    $this->setImageFullPath();
    $sql = "UPDATE users SET email=?, first_name=?, last_name=?, middle_name=?, phone=?, address=?, image=? WHERE user_id=?";
    $stmt = DataBase::$connection->prepare($sql);
    $stmt->execute([
      $this->email,
      $this->firstName,
      $this->lastName,
      $this->middleName,
      $this->phone,
      $this->address,
      $this->image,
      $this->userId,
    ]);
  }

  public function check()
  {
    $sql = "SELECT user_id FROM users WHERE email=?";
    $stmt = DataBase::$connection->prepare($sql);
    $stmt->execute([$this->email]);
    $rows = $stmt->rowCount();
    if ($rows > 0) return false;
    return true;
  }
  
  private function updateImage()
  {
    $sql = "UPDATE users SET image=? WHERE user_id=?";
    $stmt = DataBase::$connection->prepare($sql);
    $stmt->execute([
      $this->image,
      $this->userId,
    ]);
    return $this->userId;        
  }
  
  private function getImage()
  {
    $sql = "SELECT image FROM users WHERE user_id=?";
    $stmt = DataBase::$connection->prepare($sql);
    $stmt->execute([$this->userId]);
    $result = $stmt->fetch();
    return $result['image'];
  }

  private function setImageFullPath()
  {
    $path = "/images/users/" . $this->userId. "/" . $this->image;
    $this->imageFullPath = is_file(ROOT . $path) ? $path : "/images/default.gif";
  }

}
