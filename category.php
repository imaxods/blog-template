<?php
require_once 'perfectfunctions.inc.php';
require_once './classes/Categories.php';
require_once './classes/Articles.php';
?>
<html lang="ru">

<?php head();
$article3=new Articles($connection);
$category3=new Categories($connection);
?>

<body>
 

<?php showMenu()  ?>

<main class="main">
    <div class="container">
        <h1 class="title"> <?php
           echo   $category3->getCategoryName(); ?></h1>
        <div class="row">
            <div class="col col--center">
                <a href=""></a>
          <?php  $article2=new Articles($connection);
        echo  $article2->showArticlesText($_GET['category_id']);
           ?>

            </div>

            <?php
            $category2=new Categories($connection);
           echo $category2->showCategories()
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


