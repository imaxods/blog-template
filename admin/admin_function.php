<?
require_once '../mysqlconnection.php';





function getAdminCategory($id) 
{
    global $conection;
    $sql1 = "SELECT * FROM `categories` WHERE id={$id}";
    if (!$result1 = $conection->query($sql1)) {
        echo "Извините, возникла проблема в работе сайта.";
        echo $conection -> error;
        exit;
    }
    $category = $result1->fetch_assoc();
    return $category['name'];
}



?>
