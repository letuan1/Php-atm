<?php
/**
 * Created by PhpStorm.
 * User: tuan
 * Date: 25/09/2018
 * Time: 17:50
 */
require(__DIR__ . "/model/AtmDB.php");
require(__DIR__ . "/model/Atm.php");
require(__DIR__ . "/model/Database.php");
require(__DIR__ . "/model/User.php");
require(__DIR__ . "/controller/AtmController.php");

use \Controller\AtmController;

$controller = new \Controller\AtmController();
$page = isset($_REQUEST['page']) ? $_REQUEST['page'] : NULL;

switch ($page) {
    case 'user':
        $controller->user();
        break;
    case 'add':
        $controller->add();
        break;
    default:
        $controller->index();
        break;
}
?>
