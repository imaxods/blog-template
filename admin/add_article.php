<?php
require_once '../mysqlconnection.php';
require_once '../classes/Articles.php';
$article = new classes\Articles($connection);
?>

<html lang="ru">


<body>

<main class="main">
    <div class="container">
        <h1 class="title">Main page title</h1>
        <div class="row">
            <div class="col col--center">

                <?php
                if (isset($_POST['title'])
                    && isset($_POST['category_id'])
                    && isset($_POST['date'])
                    && isset($_POST['text'])
                ) {

                    $article->addArticleAdding();
                } else {
                    echo $article->addArticleForm();
                }

                ?>

            </div
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