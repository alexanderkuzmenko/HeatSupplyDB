<?php
class Controller 
{   
    protected $controllerID;
    protected $view;
    protected $title;
    protected $content;
    protected $user;
    protected $log;
    
    public function __construct($controllerID) 
    {
        $this->controllerID = $controllerID;
        $this->user = new User;
        if (isset($_SESSION['user'])) {
            $this->user->initObjectFromArray($_SESSION['user']);
            $this->user->auth = true;
        } else {
            $this->user->auth = false;
        }
        $this->flashToLog();
    }
    
    public function render($template, $params = [])
    {
        $this->view = new View('index');
        
        $this->content = (new View($this->controllerID . '/' . $template, $params))->getHTML(); 
        $this->view->setParam('content', $this->content);
        
        $this->view->setParam('user', $this->user);
        $this->view->setParam('title', $this->title);
        $this->view->setParam('log', $this->log);
        
        $this->view->render();
    }
    
    protected function setFlash($type, $message)
    {
      $_SESSION["flash"][$type][] = $message;
    }
    
    protected function flashToLog()
    {
      if (!empty($_SESSION["flash"])) {
        foreach($_SESSION["flash"] as $logType => $logItem) {
          foreach ($logItem as $logValue) {
            $this->log[$logType][] = $logValue;
          }
        }
        unset($_SESSION["flash"]);
      }
    }
}
