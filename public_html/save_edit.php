<html>
<head> <meta charset = "utf-8"> </head> 
<body>
<?php
$link = mysqli_connect("127.0.0.1", "d996108w_opersys", "TaylorSwift#1", "d996108w_opersys");
mysqli_query($link, 'SET NAMES utf-8');
 if (!$link) {
    echo "Ошибка: Невозможно установить соединение с MySQL." . PHP_EOL;
    echo "Код ошибки errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Текст ошибки error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
 // подключение к базе данных:
 mysqli_select_db($link, "d996108w_opersys");
 $x=$_GET['id'];
 $anotherquery = "UPDATE os SET os_name='".$_GET['os_name'].
"', os_hwtype='".$_GET['os_hwtype']."', os_x='"
.$_GET['os_x']."', os_dev='".$_GET['os_dev'].
"', os_usnum='".$_GET['os_usnum']."' WHERE id=".$_GET['id'];
 mysqli_query($link, $anotherquery);
 if (mysqli_affected_rows($link)>0) {
 echo 'Все сохранено. <a href="index.php"> Вернуться к списку
ОС </a>'; }
 else { echo 'Ошибка сохранения. <a href="index.php">
Вернуться к списку ОС</a> '; } 
//$saveus = "SELECT os_name, os_hwtype, os_x, os_dev, os_usnum FROM os WHERE id=".$x;
?>
</body>
 </html>
