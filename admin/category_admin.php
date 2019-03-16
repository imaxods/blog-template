<?php
require_once '../mysqlconnection.php';
require_once '../vendor/autoload.php';
?>

<h1>Categories list</h1>
<a href="add_category.php">Add category</a>

            <ul>
                <?php  $category=new classes\Categories($connection);
                $category->showAdminCategories();
                ?>

            </ul>
