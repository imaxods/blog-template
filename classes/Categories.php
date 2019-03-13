<?php
namespace\Categories::class;
class Categories
{
    /**
     * @var mysqli
     */
    protected $connect;

    public function __construct($connection)
    {
        $this->connect = $connection;
    }

    public function showCategories()
    {


        $sql = "SELECT * FROM `categories`";
        if (!$result = $this->connect->query($sql)) {
            echo 'Извините, возникла проблема в работе сайта.';
            echo $this->connect->error;
            exit;
        }
        $ret = '';
        $ret .='<div class="col col--side">
    <div class="category-block">
        <div class="category-block__title">categories</div>';

        while ($categories = $result->fetch_assoc()) {


            $ret = $ret . '<div class="category-block">' .
                '<div class="category-block__item">
                <a href="category.php?category_id=' . $categories['id'] . '">' . $categories['name'] . '</a></div>
        </div> ';
        }
        return $ret;
    }


    public function getCategory($id)
    {
        $sql1 = "SELECT * FROM `categories` WHERE id={$id}";
        if (!$result1 = $this->connect->query($sql1)) {
            echo 'Извините, возникла проблема в работе сайта.';
            echo $this->connect->error;
            exit;
        }
        $category = $result1->fetch_assoc();
        return $category['name'];
    }

    public function getCategoryName($category_id)
    {

        $sql1 = "SELECT * FROM `categories` WHERE id={$category_id}";
        if (!$result1 = $this->connect->query($sql1)) {
            echo 'Извините, возникла проблема в работе сайта.';
            echo $this->connect->error;
            exit;
        }
        $category = $result1->fetch_assoc();
        return $category['name'];
    }

    public function getCategories()
    {

        $sql = "SELECT * FROM categories";
        if (!$result = $this->connect->query($sql)) {
            echo "Извините, возникла проблема в работе сайта. <br>";
            echo $this->connect->error;
            exit;
        }
        return $result;

    }

    public function GetCategoryId()
    {
        $sql = "SELECT * FROM `category` WHERE `id`={$_GET['id']}";

        if (!$result = $this->connect->query($sql)) {
            echo 'Извините, возникла проблема в работе сайта.';
            echo $this->connect->error;
            exit;
        }
    }

    public function DeleteCategory($id)
    {
        $sql = "DELETE FROM categories WHERE id={$id}";

        if ($result = $this->connect->query($sql)) {
            echo "Категория была удалена";
        } else {
            echo 'Извините, возникла проблема в работе сайта.';
            echo $this->connect->error;
            exit;
        }
    }

    public function selectCategories($selectedCategoryId = null)
    {
        $result = $this->getCategories();
        $ret = '';
        $ret = $ret . '<select name="category_id" id="category_id">';
        while ($category = $result->fetch_assoc()) {
            if ($category['id'] == $selectedCategoryId) {
                $ret = $ret . "<option value=\"{$category['id']}\" selected='selected'>{$category['name']}</option>";
            } else {
                $ret = $ret . "<option value=\"{$category['id']}\">{$category['name']}</option>";
            }
        };

        $ret = $ret . '</select>';
        return $ret;
    }

    public function showAdminCategories()
    {


        $sql = 'SELECT * FROM `categories`';
        if (!$result = $this->connect->query($sql)) {
            echo 'Извините, возникла проблема в работе сайта.';
            echo $this->connect->error;
            exit;
        }

        echo '<div class="col col--side">
    <div class="category-block">
        <div</div>';
        while ($categories = $result->fetch_assoc()) {

            echo
                '<div class="category-block">' .
                '<div class="category-block__item">
            <div class="category-block__title">' . $categories['name'] . '  <a href="../admin/edit_categories.php?id=' . $categories['id'] . '">edit</a></div>
              <div class="article-block__edit"><a href="../admin/delete_category.php?id=' . $categories['id'] . '"><span>delete</span><span></span></a></div>';
        }
    }

    public function addCategoryIfIsset($name)
    {
        $name = $this->connect->real_escape_string($name);

        $sql = "INSERT INTO `categories` (`name`) VALUES ('{$name}')";

        if ($result = $this->connect->query($sql)) {
            echo 'Категория была добавлена';

        } else {
            echo 'Извините, возникла проблема в работе сайта.';
            echo $this->connect->error;
            exit;
        }
    }


    public function addCategoryElse()
    {

        $ret = ' <form action="../admin/add_category.php" method="post">
                                <label for="category">Категория</label><br>
                                <input type="text" name="name" size="10" maxlength="10"><br><br>
                                <input type="submit" name="submit"><br><br>
                                </form>';


        return $ret;
    }

    public function editCategoryIfSet($name, $id)
    {
        $name = $this->connect->real_escape_string($name);
        $id = $this->connect->real_escape_string($id);

        $sql = "UPDATE `categories` SET `name`='{$name}' WHERE `id`={$id}";

        if ($result = $this->connect->query($sql)) {
            echo "Статья была изменена";
        } else {
            echo "Извините, возникла проблема в работе сайта.";
            echo $this->connect->error;
            exit;
        }
    }

    public function editCategory($id)
    {


        $sql = "SELECT * FROM categories WHERE id={$_GET['id']}";

        if (!$result = $this->connect->query($sql)) {
            echo "Извините, возникла проблема в работе сайта.";
            echo $this->connect->error;
            exit;
        }
        $a = $result->fetch_assoc();


        $ret = '';


        $ret .= '  <form action="../admin/edit_categories.php" method="post">
                        <input type="hidden" name="id" value="' . $a['id'] . '">
                        <label for="categories">Заголовок</label><br>
                        <input type="text" name="name" size="70" value="' . $a['name'] . '"><br><br>
                        <input type="submit" name="submit"><br><br>
                    </form>';


        return $ret;
    }
}

?>

