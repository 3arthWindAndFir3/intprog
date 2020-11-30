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
 $x=$_GET['id_dk'];
 $saveus = "SELECT buydate_dk, expdate_dk, id_os, id_ds, cost_dk, key_dk FROM dig_keys WHERE id_dk=".$x;
$rows=mysqli_query($link, $saveus); 
//'".$_GET['id_user']. "'"
 // запрос на выборку сведений о пользователях
while ($st=mysqli_fetch_array($rows)){
 $id_dk=$x;
 $buydate_dk = $st['buydate_dk'];
 $expdate_dk = $st['expdate_dk'];
 $id_os = $st['id_os'];
 $id_ds = $st['id_ds'];
 $cost_dk = $st['cost_dk'];
 $key_dk = $st['key_dk'];
 }
print "<form action='save_edit2.php' metod='get'>";
print "Дата покупки: <input name='buydate_dk' size='34' type='text' value='".$buydate_dk."'>";
print "<br>Дата истечения лицензии: <input name='expdate_dk' size='22' type='text' value='".$expdate_dk."'>";
print "<br>Код ОС: <input name='id_os' size='39' type='text' value='".$id_os."'>";
print "<br>Код Магазина: <input name='id_ds' size='33' type='text' value='".$id_ds."'>";
print "<br>Цена ключа: <input name='cost_dk' size='35' type='text' value='".$cost_dk."'>";
print "<br>Ключ: <input name='key_dk' size='41' type='text' value='".$key_dk."'>";
print "<input type='hidden' name='id_dk' value='".$id_dk."'> <br>";
print "<input type='submit' name='' value='Сохранить'>";
print "</form>";
print "<p><a href=\"index.php\"> Вернуться к списку
ОС </a>";
?>
</body>
</html>
