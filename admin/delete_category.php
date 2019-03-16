<?php
require_once '../mysqlconnection.php';
require_once '../vendor/autoload.php';
$category=new classes\Categories($connection);
$category->DeleteCategory($_GET['id']);


