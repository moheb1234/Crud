<?php

use CRUD\Controller\PersonController;
use CRUD\Helper\DBConnector;


include ("loader.php");
$db = new DBConnector();
$request = $_REQUEST;

$controller = new PersonController($db);
$controller->switcher($_SERVER['REQUEST_URI'],$request);

// problem with get methods for parameters in uri
if (isset($_GET['read']))
    $controller->readAction($request);
if (isset($_GET['read_all']))
    $controller->readAllAction();

