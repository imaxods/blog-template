<?php
require_once '../mysqlconnection.php';
require_once '../classes/Articles.php';
?>


    <h2>Articles list</h2>
    <a href="add_article.php">Add article</a>
<?php $article = new classes\Articles($connection);
echo  $article->showAdminArticles();

