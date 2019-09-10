<?php
class UserController extends Controller
{

  public function actionView($parameters = [])
  {
    $userId = $_SESSION["user"]["user_id"];
    $user = new User($userId);
    $params["user"] = $user;
    $this->render('view', $params);
  }

  public function actionRegister($parameters = []) 
  {
    $params['title'] = "Реєстрація";
    $params['submit_text'] = "Зареєструватись";
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $user = new User;        
      $user->initObjectFromArray($_POST);
      if ($user->check()) {
        $user->create();
        $this->setFlash("success", "Реєстрація облікового запису успішно здійснена");
        header("Location: /login");
        die;
      } else {
        $this->log['danger'][] = 'Помилка реєстрації. Даний обліковий запис вже існує';
      }
    }
    $this->render("register");
  }
  
  public function actionEdit($parameters = [])
  {
    $userId = $_SESSION["user"]["user_id"];
    $user = new User($userId);
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $user->initObjectFromArray($_POST);
      $user->update();
      $user->setObjectToSession('user');
      $this->setFlash("success", "Профіль успішно змінено");
      header("Location: /profile");
    }
    $params["user"] = $user;
    $this->render('edit', $params);
  }

  public function actionLogin($parameters = []) 
  {
    if ($this->user->auth) {
      $this->setFlash("primary", "Ви вже авторизовані");
      header("Location: /");
      die;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $user = new User();
      if ($user->getUserByLoginForm($_POST)) {
        $user->setObjectToSession('user');
        $this->setFlash("success", "Вхід в систему здійснено");
        header("Location: /");
        die;
      } else {
        $this->log['danger'][] = "Неуспішний вхід. Спробуйте ще раз.";
      }
    }
    $this->render('login');
  }

  public function actionLogout($parameters = []) 
  {
    session_destroy();
    session_start();
    $this->setFlash("success", "Здійснено вихід із системи");
    header("Location: /login");
    die;
  }

}
