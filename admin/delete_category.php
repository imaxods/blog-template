<?php
require_once '../mysqlconnection.php';
require_once '../classes/Categories.php';
$category=new Categories($connection);
$category->DeleteCategory($_GET['id']);


