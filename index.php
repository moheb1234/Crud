<?php

use CRUD\Controller\PersonController;
use CRUD\Helper\DBConnector;


include ("loader.php");

$db = new DBConnector();
$controller = new PersonController($db);
$request = $_REQUEST;

if (isset($_POST['create']))
    $controller->createAction($request);
if (isset($_GET['read']))
    $controller->readAction($request);
if (isset($_GET['read_all']))
    $controller->readAllAction($request);
if (isset($_POST['delete']))
    $controller->deleteAction($request);
if (isset($_POST['update']))
    $controller->updateAction($request);


