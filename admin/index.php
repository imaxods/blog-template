<?php
require 'auth-check.php';
?>

<h1>Hello <?= $_SESSION['username']?>!</h1>

<ul>
    <li><a href="articles_admin.php">Articles</a></li>
    <li><a href="category_admin.php">Categories</a></li>
</ul>
