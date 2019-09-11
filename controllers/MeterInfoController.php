<?php

class MeterInfoController extends Controller 
{

  public function actionView($parameters = []) 
  {
    $account = new Account($parameters[0]);
    $this->title = "Рахунок № " . $account->accountId;
    $params['account'] = $account;
    $params['user'] = $this->user;
    $this->render('view', $params);
  } 

  
  public function actionList($parameters = []) 
  {
    $this->title = 'Покази лічильника';
    $params['accounts'] = Account::getAccountsByUser($this->user->userId);
    $params['user'] = $this->user;
    $this->render('list', $params);
  }  

  
  public function actionEdit($parameters = []) 
  {
    $this->title = 'Редагування рахунку';
    $params['account'] = new Account($parameters[0]);
    $params['action'] = 'edit';
    $params['title'] = $this->title;
    $this->render('form', $params);
  }
  
  
  public function actionCreate()
  {
    $this->title = 'Додавання рахунку';
    $params['action'] = 'create';
    $params['title'] = $this->title;
    $this->render('form', $params);
  }

  public function actionSubmit($parameters = []) 
  {
    $account = new Account;
    $action = $_POST['action'];
    $account->userId = $this->user->userId;
    $account->initObjectFromArray($_POST);

    if ($action == 'edit') {
      $account->update();
      $this->setFlash("success", "Рахунок успішно змінено");
    } elseif ($action == 'create') {
      $account->create();
      $this->setFlash("success", "Рахунок успішно додано");
    }
    header('Location: /accounts');
  }

  public function actionDelete($parameters = [])
  {
    $account = new Account($parameters[0]);
    
    if (isset($parameters[1]) && $parameters[1] == "submit") {
      $account->delete();
      $this->setFlash("success", "Рахунок успішно видалено");
      header("Location: /accounts");
    }
    $params["account"] = $account;
    $params['user'] = $this->user;
    $this->title = 'Видалення рахунку';
    $this->render('delete', $params);
  }
  
}
