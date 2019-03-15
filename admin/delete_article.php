<?php
require_once '../mysqlconnection.php';
require_once '../classes/Articles.php';
$article=new classes\Articles($connection);
$article->DeleteArticle($_GET['id']);
