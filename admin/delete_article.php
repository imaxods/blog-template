<?php
require_once '../mysqlconnection.php';
require_once '../vendor/autoload.php';
$article=new classes\Articles($connection);
$article->DeleteArticle($_GET['id']);
