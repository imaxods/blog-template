<?php

session_start();

if (
    isset($_SESSION['is_admin'])
    && $_SESSION['is_admin'] === true
) {

} else {
    $newURL = './login-form.php';
    header('Location: '.$newURL);
    die;
}
?>
