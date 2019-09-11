<?php
    
    define("ROOT", __DIR__);
    
    include(ROOT . "/config/config.php");
    
    spl_autoload_register(function($className){
        $dirs = [
            ROOT . "/core/",
            ROOT . "/controllers/",
            ROOT . "/models/",
        ];
        foreach($dirs as $dir) {
            if (is_file($dir . $className . ".php")) {
                include $dir . $className . ".php";
                break;
            }
        }
    });
    
    DataBase::connect();
    session_start();
    $app = new Application();
    
    $app->run();

    