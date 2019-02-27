<?php
require_once '../mysqlconnection.php';
require_once '../classes/Categories.php';
?>

<h1>Categories list</h1>
<a href="add_category.php">Add category</a>

            <ul>
                <?php  $category=new Categories($connection);
                $category->showAdminCategories();
                ?>

            </ul>
