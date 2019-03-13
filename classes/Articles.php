<?php
require_once 'Categories.php';
namespace\Articles::class;
class Articles
{

    /**
     * @var mysqli
     */
    protected $connect;

    public function __construct($connection)
    {
        $this->connect = $connection;
    }

    public function showArticlesText($categoryId = null)
    {

        if ($categoryId === null) {
            $sql = "SELECT * FROM `articles`";
        } else {
            $sql = "SELECT * FROM articles WHERE category_id={$categoryId}";
        }

        if (!$result = $this->connect->query($sql)) {
            echo 'Извините, возникла проблема в работе сайта.';
            echo $this->connect->error;
            exit;
        }

        $ret = '';
        while ($articles = $result->fetch_assoc()) {
            $category2 = new Categories($this->connect);
            $categoryName = $category2->getCategory($articles['category_id']);

            $ret = $ret . '<article class="article-block">
    <div class="article-block__body">
        <div class="article-block__title">
            <h2><a href="article.php?id=' . $articles['id'] . '"> ' .

                $articles['title'] .
                ' </a></h2>
        </div>
        <div class="article-block__category article-label">' .
                $categoryName .
                '</div>
        <div class="article-block__text">' .
                substr($articles['text'], 0, 200) .
                ' </div>
    </div>
    <div class="article-block__footer">
        <div class="article-block__date">' .
                $articles['date'] .
                '</div>
        <div class="article-block__comments"><a href="../comment.php?articles_id=' . $articles['id'] . '"><span>Comments &nbsp;</span><span></span></a></div>
    </div>
</article>';


        }
        return $ret;
    }

    public function getArticleFullText($id)
    {
        $sql = "SELECT * FROM `articles` WHERE `id`={$id}";

        if (!$result = $this->connect->query($sql)) {
            echo 'Извините, возникла проблема в работе сайта.';
            echo $this->connect->error;
            exit;
        }
        $text = $result->fetch_assoc();
        return $text;
    }

    public function GetArticleCategoryId()
    {
        $sql = "SELECT * FROM `articles`";

        if (!$result = $this->connect->query($sql)) {
            echo 'Извините, возникла проблема в работе сайта.';
            echo $this->connect->error;
            exit;
        }
        $text = $result->fetch_assoc();
        return $text['category_id'];
    }

    public function showAdminArticles($categoryId = null)
    {

        if ($categoryId === null) {
            $sql = "SELECT * FROM `articles`";
        } else {
            $sql = "SELECT * FROM articles WHERE category_id={$categoryId}";
        }

        if (!$result = $this->connect->query($sql)) {
            echo 'Извините, возникла проблема в работе сайта.';
            echo $this->connect->error;
            exit;
        }

        $ret = '';
        while ($articles = $result->fetch_assoc()) {
            $ret = $ret . '<ul>
    <li>' . $articles['title'] . ' <a href="edit_article.php?id=' . $articles['id'] . '">Edit</a></li></ul>
    <a href="delete_article.php?id=' . $articles['id'] . '">Delete</a>';


        }
        return $ret;
    }

    public function DeleteArticle($id)
    {
        $sql = "DELETE FROM articles WHERE id={$id}";

        if ($result = $this->connect->query($sql)) {
            echo 'Статья была удалена';
        } else {
            echo 'Извините, возникла проблема в работе сайта.';
            echo $this->connect->error;
            exit;
        }
    }

    public function selectCategories($selectedCategoryId = null)
    {
        $category = new Categories($this->connect);

        $result = $category->getCategories();
        $ret = '';
        $ret .= '<select name="category_id" id="category_id">';
        while ($category = $result->fetch_assoc()) {
            if ($category['id'] === $selectedCategoryId) {
                $ret .= "<option value=\"{$category['id']}\" selected ='selected'>{$category['name']}</option>";
            } else {
                $ret .= "<option value=\"{$category['id']}\">{$category['name']}</option>";
            }
        }

        $ret .= '</select>';
        return $ret;
    }
    public function addArticleAdding(){

    $title = $this->connect->real_escape_string($_POST['title']);
    $category = $this->connect->real_escape_string($_POST['category_id']);
    $date = $this->connect->real_escape_string($_POST['date']);
    $text = $this->connect->real_escape_string($_POST['text']);

    $sql = "INSERT INTO `articles` (`title`, `date`, `text`, `category_id`) VALUES ('{$title}', '{$date}','{$text}','{$category}')";

    if ($result = $this->connect->query($sql)) {
        echo "Cтатья была добавлена";
        $articleSaved = true;
    } else {
        echo "Извините, возникла проблема в работе сайта.";
        echo $this->connect->error;
        exit;
    }
}


    public function addArticleForm()
    {
        $articleSaved = false;

        $category1 = new Categories($this->connect);


        if (true === $articleSaved) {
            echo 'Cтатья была добавлена';
        } else {
            $ret = '';
            $ret .= '<form action="../admin/add_article.php" method="post">
                                <label for="title">Заголовок</label><br>
                                <input type="text" name="title" size="70"><br><br>
                                <label for="category">Категория</label><br>
                                <?php echo $this->' . $category1->selectCategories() . '<br><br>
                                <label for="date">Дата</label><br>
                                <input type="text" name="date" size="10" maxlength="10"><br><br>
                                <label for="text">Текст</label><br>
                                <textarea name="text" cols="100" rows="10"></textarea><br><br>
                                <input type="submit" name="submit"><br><br>
                            </form> ';
        }
        return $ret;
    }

    public function updateArticle($title, $id, $date, $text, $category_id)
    {
        $title = $this->connect->real_escape_string($title);
        $id = $this->connect->real_escape_string($id);
        $date = $this->connect->real_escape_string($date);
        $text = $this->connect->real_escape_string($text);
        $category_id = $this->connect->real_escape_string($category_id);

        $sql = "UPDATE `articles` SET `title`='{$title}',`date`='{$date}',`text`='{$text}',`category_id`='{$category_id}' WHERE `id`={$id}";

        if ($result = $this->connect->query($sql)) {
            echo 'Статья была изменена';
        } else {
            echo 'Извините, возникла проблема в работе сайта.';
            echo $this->connect->error;
            exit;
        }

    }

    public function editArticle($id)
    {


        $sql = "SELECT * FROM articles WHERE id={$id}";

        if (!$result = $this->connect->query($sql)) {
            echo 'Извините, возникла проблема в работе сайта.';
            echo $this->connect->error;
            exit;
        }
        $res = $result->fetch_assoc();
        $ret = '';
        $category1 = new Categories($this->connect);
        $ret .= ' <form action="../admin/edit_article.php" method="post">
                                <input type="hidden" name="id" value="' .
            $res['id'] .
            '">
                                <label for="title">Заголовок</label><br>
                                <input type="text" name="title" size="70" value=" ' .
            $res['title'] .
            '"><br><br>
                                <label for="date">Дата</label><br>
                                <input type="text" name="date" size="10 " maxlength="10"
                                       value="' .
            $res['date'] .
            '"><br><br>
                                <label for="category">Ктегория</label><br>' .


            $category1->selectCategories($res['category_id']) .
            ' <br><br>
                                <label for="text">Текст</label><br>
                                <textarea name="text" cols="100"
                                          rows="10"> ' .
            $res['text'] .
            ' </textarea><br><br>
                                <input type="submit" name="submit"><br><br>
                            </form>';


        return $ret;
    }
}



