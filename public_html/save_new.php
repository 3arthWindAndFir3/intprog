<html>
<head>
<meta charset = "utf-8">
</head>
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
 // Строка запроса на добавление записи в таблицу:
 $sql_add = "INSERT INTO os (id, os_name, os_hwtype, os_x, os_dev, os_usnum) VALUES ('".$_GET['id']."','"
.$_GET['os_name']."', '".$_GET['os_hwtype']."' , '". $_GET['os_x']. "', '".$_GET['os_dev']. "', '".$_GET['os_usnum']."')";
 mysqli_query($link, $sql_add); // Выполнение запроса
 if (mysqli_affected_rows($link)>0) // если нет ошибок при выполнении запроса
 { print "<p>Спасибо, вы зарегистрировали свою ОС в базе данных.";
 print "<p><a href=\"index.php\"> Вернуться к списку ОС </a>"; }
 else { print "Ошибка сохранения. <a href=\"index.php\">
Вернуться к списку ОС </a>"; }
?>
</body>
</html>

