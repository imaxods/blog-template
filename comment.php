<?php
require_once 'mysqlconnection.php';
require 'perfectfunctions.inc.php';
require_once './classes/Articles.php';
require_once './classes/Categories.php';
require_once './classes/Comments.php';
$comment = new Comments($connection);
$article = new Articles($connection);
$category = new Categories($connection);
?>
<html lang="ru">

<?php head();
$category=new Categories($connection);
?>

<body>


<?php showMenu()  ?>

<main class="main">
    <div class="container">
        <h1 class="title"> <?php
           echo   $category->getCategoryName($_GET['articles_id']); ?></h1>
        <div class="row">
            <div class="col col--center">
                <a href=""></a>
          <?php
        echo  $comment->showCommentText($_GET['articles_id']);
           ?>

            </div>

            <?php
            $category=new Categories($connection);
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

