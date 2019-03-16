<?php
require_once 'vendor/autoload.php';
require_once 'perfectfunctions.inc.php';
?>
<html lang="ru">

<?php head();
$article=new classes\Articles($connection);
$category=new classes\Categories($connection);
?>

<body>
 

<?php showMenu()  ?>

<main class="main">
    <div class="container">
        <h1 class="title"> <?php
           echo   $category->getCategoryName($_GET['category_id']); ?></h1>
        <div class="row">
            <div class="col col--center">
                <a href=""></a>
          <?php
        echo  $article->showArticlesText($_GET['category_id']);
           ?>

            </div>

            <?php

           echo $category->showCategories()
             ?>
        </div>
    </div>

</main>
<footer class="footer">
    <div class="container">
        <div>Copyright &copy; 2018</div>
    </div>
</footer>
</body>
</html>


