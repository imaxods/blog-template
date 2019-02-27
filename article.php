<?php
require 'perfectfunctions.inc.php';
require_once './classes/Articles.php';
require_once './classes/Categories.php';
require_once 'mysqlconnection.php';

$article2 = new Articles($connection);
$category2 = new Categories($connection);
$article = $article2->getArticleFullText($_GET['id'])
?>
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
        <h1 class="title"> <?php
            echo $article['category_id']; ?></h1>
        <div class="row">
            <div class="col col--center">
                <a href=""></a>
                <article class="article-block">
                    <div class="article-block__body">
                        <div class="article-block__title">


                            <?php echo $article['title']; ?>
                            </a></h2
                        </div>
                        <div class="article-block__category article-label">
                            <?php
                            echo $category2->getCategory($article['category_id']); ?>
                        </div>
                        <div class="article-block__text">
                            <?php echo $article['text']; ?>
                        </div>
                    </div>
                    <div class="article-block__footer">
                        <div class="article-block__date">
                            <?php echo $article['date']; ?>
                        </div>
                        <div class="article-block__comments"><a href=""><span>Comments &nbsp;</span><span></span></a>
                        </div>
                    </div>
                </article>

            </div>
            <?php $category1 = new Categories($connection);
            echo $category1->showCategories(); ?>
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





















