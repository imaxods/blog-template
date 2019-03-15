<?php
require_once 'vendor/autoload.php';
require_once 'perfectfunctions.inc.php';
require_once 'mysqlconnection.php';

?>
<!DOCTYPE html>

<html lang="ru">
<?php
head();
?>
<body>

<?php
showMenu();
?>
<main class="main">
    <div class="container">
        <h1 class="title">Main page title</h1>
        <div class="row">
            <div class="col col--center">
                <a href=""></a>
                <?php
                $article1 = new classes\Articles($connection);
               echo $article1->showArticlesText();
                ?>
            </div>
            <?php
            $category1 = new classes\Categories($connection);
           echo $category1->showCategories();
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