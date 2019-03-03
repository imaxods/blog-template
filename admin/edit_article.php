<?php
require_once '../mysqlconnection.php';
require_once '../classes/Articles.php';
require_once '../classes/Categories.php';
$article=new Articles($connection);
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
if (isset($_POST['title'])
&& ($_POST['category_id'])
&& ($_POST['date'])
&& ($_POST['text'])) {
 $article->updateArticle(); }
else{
echo $article->editArticle();
}
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
