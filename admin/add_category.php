<?php

require_once '../mysqlconnection.php';
require_once '../classes/Categories.php';
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
                $category = new Categories($connection);
               echo $category->addCategory();
                ?>
                </form>
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