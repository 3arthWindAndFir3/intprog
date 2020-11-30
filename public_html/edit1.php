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
 $x=$_GET['id_ds'];
 $saveus = "SELECT name_ds, url_ds FROM dig_shop WHERE id_ds=".$x;
$rows=mysqli_query($link, $saveus); 
//'".$_GET['id_user']. "'"
 // запрос на выборку сведений о пользователях
while ($st=mysqli_fetch_array($rows)){
 $id_ds=$x;
 $name_ds = $st['name_ds'];
 $url_ds = $st['url_ds']; 
 }
 
print "<form action='save_edit1.php' metod='get'>";
print "Название: <input name='name_ds' size='34' type='text' value='".$name_ds."'>";
print "<br>Ссылка: <input name='url_ds' size='28' type='text' value='".$url_ds."'>";

print "<input type='hidden' name='id_ds' value='".$id_ds."'> <br>";
print "<input type='submit' name='' value='Сохранить'>";
print "</form>";
print "<p><a href=\"index.php\"> Вернуться к списку магазинов </a>";
?>
</body>
</html>
