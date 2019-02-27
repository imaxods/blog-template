<?php

session_start();

if ($_POST['login'] === 'admin' && $_POST['pass'] === '12345') {
    $_SESSION['is_admin'] = true;
    $_SESSION['username'] = $_POST['login'];
    echo 'Auth complete
        <li class="nav__item"><a class="nav__link" href="articles_admin.php">articles</a></li>
         <li class="nav__item"><a class="nav__link" href="category_admin.php">categories</a></li>';

} else {
    $_SESSION['fail_count']++;
    echo 'Error login or password';
}
