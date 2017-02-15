<?php
/**
 * Created by PhpStorm.
 * User: usver
 * Date: 26.01.2017
 * Time: 19:01
 */
session_start();

spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});

$app = new Module();

require "header.php";


switch ($_GET["action"]){
    case "start":
        $app->startTimer();
        break;
    case "status":
        $app->statusTimer();
        break;
    case "stop":
        $app->stopTimer();
        break;
    default:
        echo 'Массив $_GET пуст';
        break;
}
echo "<pre>";
print_r($_GET);
echo "</pre>";


require "footer.php"
?>

