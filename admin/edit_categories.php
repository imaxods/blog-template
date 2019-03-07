<?php
require_once '../mysqlconnection.php';
require_once '../classes/Categories.php';
$category = new Categories($connection)
?>
<html lang="ru">
<body>
<main class="main">
    <div class="container">
        <h1 class="title">Main page title</h1>
        <div class="row">
            <div class="col col--center">
                <a href=""></a>
                <?php
                if (isset($_POST['name'])
                && ($_POST['id'])) {
                    $category->editCategoryIfSet($_POST['name'], $_POST['id']); }
                else{
                    echo $category->editCategory($_GET['id']);}

                ?>
            </div>
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


