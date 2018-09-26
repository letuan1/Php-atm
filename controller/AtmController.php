<?php
/**
 * Created by PhpStorm.
 * User: tuan
 * Date: 26/09/2018
 * Time: 08:57
 */

namespace Controller;

use \mondel\Database;
use \mondel\AtmDB;
use \mondel\Atm;
use \mondel\User;
use \mondel\Amount;

class AtmController
{
    public $postDB;

    public function __construct()
    {
        $connection = new Database();
        $this->postDB = new AtmDB($connection->connect());
    }

    public function index(){
        $posts = $this->postDB->getAll();
        include 'view/list.php';
    }

    public function user() {
        $posts = $this->postDB->getAllUser();
        include 'view/user.php';
    }

    public function add(){
        if($_SERVER['REQUEST_METHOD'] === 'GET'){
            include 'view/add.php';
        } else {
            $date = date('Y-m-d H:i:s');
            $this->postDB->create($_POST['user1'], $_POST['amount'], $_POST['user2'], $date, $_POST['content']);
            include 'view/list.php';
        }
    }
}