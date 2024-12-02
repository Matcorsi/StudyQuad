<?php
    require_once 'libs/response.php';
    require_once 'config.php';
    require_once 'app/controllers/opinion.controller.php';

    define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');
    
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    $res = new Response();

    if (!empty($_GET['action'])) {
        $action = $_GET['action'];
    } else {
        $action = 'home';
    }

    $params = explode('/', $action);
    
    switch ($params[0]) {
        case 'opinion':
            $controller = new OpinionController();
            $controller->AddOpinion();
            break;
            
        default:
            $controller->showError();
            break;
    }
?>
