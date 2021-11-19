<?php

use routes\base\Router;
use utils\SessionHelpers;

include("autoload.php");

foreach ( $_POST as $key => $value){
    $_POST[$key] = is_array($key) ? $_POST[$key] : strip_tags($_POST[$key]);
    $_POST[$key] = is_array($key) ? $_POST[$key] : htmlspecialchars($_POST[$key]);
    $_POST[$key] = is_array($key) ? $_POST[$key] : htmlentities($_POST[$key]);
}

foreach ($_GET as $key => $value) {
    $_GET[$key] = is_array($key) ? $_GET[$key] : strip_tags($_GET[$key]);
    $_POST[$key] = is_array($key) ? $_POST[$key] : htmlspecialchars($_GET[$key]);
    $_POST[$key] = is_array($key) ? $_POST[$key] : htmlentities($_GET[$key]);


}

SessionHelpers::init();

$router = new Router();
$router->LoadRequestedPath();