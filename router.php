<?php
    require_once 'config.php';
    require_once 'app/controllers/opinion.controller.php';

    define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');
    
    
    if (!empty($_GET['action'])) {
        $action = $_GET['action'];
    } else {
        $action = 'opinion';
    }

    $params = explode('/', $action);
    
    switch ($params[0]) {
        case 'opinion':
            $controller = new OpinionController();
            $controller->showOpiniones();
            break;
        case 'addOpinion':
            $controller = new OpinionController();
            $controller->insertOpinion();
            break;
        case 'filtrar':
            if (isset($params[1])) {
                $controller = new OpinionController();
                $controller->getOpinionXfecha($params[1]);
            } else {
                $controller->showError();
            }
            break;
        case 'borrar':
            if (isset($params[1])) {
                $controller = new OpinionController();
                $controller->eraseOpinion($params[1]);
            } else {
                $controller->showError();
            }
            break;
    }
?>
