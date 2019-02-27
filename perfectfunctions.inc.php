<?php
require_once 'mysqlconnection.php';
function showMenu()
{

    global $connection;

    $sql = "SELECT * FROM `menu`";
    if (!$result = $connection->query($sql)) {
        echo 'Извините, возникла проблема в работе сайта.';
        echo $connection->error;
        exit;
    }
    echo '<header class="header">
      <div class="container">  
	  <div class="row header__row"><a class="header__logo" href="/"><img src="img/logo.svg"></a>
	   <nav class="nav">
	   <ul class="nav__list">
	    
      ';

    while ($menu = $result->fetch_assoc()) {

        echo
            ' <li class="nav__item"><a class="nav__link" href="' . $menu['limk'] . '"target="_blank">' . $menu['title'] . '</a></li>';
    }
    echo
    ' </nav>
		 </ul>
		 </header>
		  </div>
		  </div>';

}

function head()
{
    echo ' <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home Page</title>
    <link rel="stylesheet" href="css/main.css">
</head>';
}
/*
function selectCategories($selectedCategoryId = null)
{
    $result = getCategories();

    echo '<select name="category_id" id="category_id">';
    while ($category = $result->fetch_assoc()) {
        if ($category['id'] == $selectedCategoryId) {
            echo "<option value=\"{$category['id']}\" selected='selected'>{$category['name']}</option>";
        } else {
            echo "<option value=\"{$category['id']}\">{$category['name']}</option>";
        }
    };

    echo '</select>';
}
*/

?>