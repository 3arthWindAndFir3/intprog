<html>
<head>
	<meta charset = "utf-8">
<title> Редактирование данных об ОС </title>
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
 $x=$_GET['id'];
 $saveus = "SELECT os_name, os_hwtype, os_x, os_dev, os_usnum FROM os WHERE id=".$x;
$rows=mysqli_query($link, $saveus); 
//'".$_GET['id_user']. "'"
 // запрос на выборку сведений о пользователях
while ($st=mysqli_fetch_array($rows)){
 $id=$x;
 $os_name = $st['os_name'];
 $os_hwtype = $st['os_hwtype'];
 $os_x = $st['os_x'];
 $os_dev = $st['os_dev'];
 $os_usnum = $st['os_usnum'];
 }
print "<form action='save_edit.php' metod='get'>";
print "Название: <input name='os_name' size='34' type='text' value='".$os_name."'>";
print "<br>Тип устройств: <input name='os_hwtype' size='28' type='text' value='".$os_hwtype."'>";
print "<br>Разрядность: <input name='os_x' size='30' type='text' value='".$os_x."'>";
print "<br>Разработчик: <input name='os_dev' size='30' type='text' value='".$os_dev."'>";
print "<br>Число пользователей: <input name='os_usnum' size='20' type='text' value='".$os_usnum."'>";

print "<input type='hidden' name='id' value='".$id."'> <br>";
print "<input type='submit' name='' value='Сохранить'>";
print "</form>";
print "<p><a href=\"index.php\"> Вернуться к списку
ОС </a>";
?>
</body>
</html>
