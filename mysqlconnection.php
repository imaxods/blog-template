<?php
if ($_SERVER['REMOTE_ADDR'] == '127.0.0.1') {
    $user = 'root';
    $password = '';
    $database = 'blog';

} else {
    //$connection = mysqli_connect('localhost', 'nikosid_imaxods', 'F%{*T2;{eeti', 'nikosid_imaxods');
    // $connection = mysqli_connect('localhost', 'max@max.nikosid.com', '123123Max', 'nikosid_imaxods');
    $user = 'nikosid_imaxods';
    $password = 'F%{*T2;{eeti';
    $database = 'nikosid_imaxods';

}
$connection = mysqli_connect('localhost', $user, $password, $database);
if ($connection->connect_errno) {

    echo 'Извините, возникла проблема на сайте';
    echo 'Ошибка: Не удалась создать соединение с базой MySQL и вот почему: \n';
    echo 'Номер ошибки: ' . $connection->connect_errno . '\n';
    echo 'Ошибка: ' . $connection->connect_error . '\n';
}
$connection->set_charset('utf8');
?>