<?php
require_once '../mysqlconnection.php';
require_once '../classes/Articles.php';
$article=new Articles($connection);
$article->addArticle();
