<?php
require 'perfectfunctions.inc.php';
require_once 'mysqlconnection.php';
require_once 'vendor/autoload.php';

$article = new classes\Articles($connection);
$category = new classes\Categories($connection);
$article = $article->getArticleFullText($_GET['id'])
?>
<html lang="ru">
<?php head();
?>
<body>

<?php

showMenu();
?>
<main class="main">
    <div class="container">
        <h1 class="title"> <?php
              echo $category->getCategory($article['category_id']); ?></h1>
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
                            echo $category->getCategory($article['category_id']); ?>
                        </div>
                        <div class="article-block__text">
                            <?php echo $article['text']; ?>
                        </div>
                    </div>
                    <div class="article-block__footer">
                        <div class="article-block__date">
                            <?php echo $article['date']; ?>
                        </div>
                    </div>
                </article>
                <?php
                $comment = new classes\Comments($connection);
                echo $comment->showCommentText($article['id']);

                if (isset($_POST['author'])) {
                    $comment->addCommentAdding();
                } else {
                    echo $comment->addCommentForm();
                }


                // $comment = classes\Comments($connection);
                //article_id при добавлении
                //в add for article_id - GET[id]
                // в форме убрать action
                //$comment->showcommenttext($article[id]
                ?>


            </div>
            <?php
            echo $category->showCategories(); ?>
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





















