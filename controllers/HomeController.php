<?php
class HomeController extends Controller
{
    
    public function actionIndex($parameters = [])
    {
        $this->render('home');
    }
    
    public function actionPageNotFound($parameters = [])
    {
        $this->render('page404');
    }
}
