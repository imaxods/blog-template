<?php

namespace classes;


class Comments
{
    /**
     * @var \mysqli
     */
    protected $connect;

    public function __construct($connection)
    {
        $this->connect = $connection;
    }

    public function getComment($id)
    {
        $sql1 = "SELECT * FROM `comments` WHERE id={$id}";
        if (!$result1 = $this->connect->query($sql1)) {
            echo 'Извините, возникла проблема в работе сайта.';
            echo $this->connect->error;
            exit;
        }
        $comment = $result1->fetch_assoc();
        return $comment;
    }


    public function showCommentText($articles_id)
    {

        $sql = "SELECT * FROM comments WHERE articles_id={$articles_id}";


        if (!$result = $this->connect->query($sql)) {
            echo 'Извините, возникла проблема в работе сайта.';
            echo $this->connect->error;
            exit;
        }

        $ret = '';
        while ($comment = $result->fetch_assoc()) {


            $ret = $ret . '<article class="article-block">
    <div class="article-block__body">
        <div class="article-block__title">
           
        </div>
        <div class="article-block__category article-label">' .
                $comment['author'] .
                '</div>
        <div class="article-block__text">' .
                $comment['text'] .
                ' </div>
    </div>
    <div class="article-block__footer">
        <div class="article-block__date">' .
                $comment['date'] .
                '</div>
        <div class="article-block__comments"><a href="../delete_comment.php?id=' .  $comment['id'] . '"><span>Delete Comments</span><span></span></a></div>
    </div>
</article>';


        }
        return $ret;
    }

    public function addCommentAdding()
    {

        $author = $this->connect->real_escape_string($_POST['author']);
        $date = $this->connect->real_escape_string($_POST['date']);
        $text = $this->connect->real_escape_string($_POST['text']);
        $articles_id = $_GET['id'];
        $sql = "INSERT INTO `comments` (`text`,`date`,`author`,`articles_id`) VALUES ('{$text}','{$date}','{$author}','{$articles_id}')";

        if ($result = $this->connect->query($sql)) {
            echo 'Коментарий была добавлена';
            $articleSaved = true;
        } else {
            echo 'Извините, возникла проблема в работе сайта.';
            echo $this->connect->error;
            exit;
        }
    }


    public function addCommentForm()
    {
        $articleSaved = false;


        if (true === $articleSaved) {
            echo 'Cтатья была добавлена';
        } else {
            $ret = '';
            $ret .= '<form      method="post">
                                <label for="title">Имя</label><br>
                                <input type="text" name="author" size="70"><br><br>
                                <label for="date">Дата</label><br>
                                <input type="text" name="date" size="10" maxlength="10"><br><br>
                                <label for="text">Текст</label><br>
                                <textarea name="text" cols="100" rows="10"></textarea><br><br>
                                <input type="submit" name="submit"><br><br>
                            </form> ';
        }
        return $ret;
    }
    public function deleteComment($id)
    {
        $sql = "DELETE FROM comments WHERE id={$id}";

        if ($result = $this->connect->query($sql)) {
            echo 'Коментарий был удален';
        } else {
            echo 'Извините, возникла проблема в работе сайта.';
            echo $this->connect->error;
            exit;
        }
    }

}
