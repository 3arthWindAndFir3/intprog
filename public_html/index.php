<html>
<head>
	<meta charset = "utf-8">
 <title> OS </title> </head>
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

?>
<h1>Вараксин Л.Д. ПИ-318 Вариант 8</h1>
<h2>Сведения об ОС:</h2>
<table border="1">
<tr>
  <th> ID </th> <th> os_name </th> <th> os_hwtype </th>  <th> os_x </th>  <th> os_dev </th>  <th> os_usnum </th> 
 <th> Редактировать </th> <th> Уничтожить </th> </tr>
<?php
$result=mysqli_query($link, "SELECT id, os_name, os_hwtype, os_x, os_dev, os_usnum FROM os"); // запрос на выборку сведений об ос
while ($row=mysqli_fetch_array($result)){// для каждой строки из запроса
 echo "<tr>";
 echo "<td>" . $row['id'] . "</td>";
  echo "<td>" . $row['os_name'] . "</td>";
    echo "<td>" . $row['os_hwtype'] . "</td>";
 echo "<td>" . $row['os_x'] . "</td>";
 echo "<td>" . $row['os_dev'] . "</td>";
  echo "<td>" . $row['os_usnum'] . "</td>";
 echo "<td><a href='edit.php?id=" . $row['id']
. "'>Редактировать</a></td>"; // запуск скрипта для редактирования
 echo "<td><a href='delete.php?id=" . $row['id']
. "'>Удалить</a></td>"; // запуск скрипта для удаления записи
 echo "</tr>";
}
print "</table>";
$num_rows = mysqli_num_rows($result); // число записей в таблице БД
print("<P>Всего ОС: $num_rows </p>");
?>
<p> <a href="new.php"> Добавить ОС </a>

<h2>Цифровые магазины: </h2>

<table border="1">
<tr>
  <th> id_ds </th> <th> name_ds </th> <th> url_ds </th>  <th> Редактировать </th> <th> Уничтожить </th>
</tr>
<?php
$result1=mysqli_query($link, "SELECT * FROM dig_shop"); // запрос на выборку сведений о магазинах
while ($row1 = mysqli_fetch_array($result1)) {
	echo "<tr>";
	echo "<td>" . $row1['id_ds'] . "</td>";
	echo "<td>" . $row1['name_ds'] . "</td>";
    echo "<td>" . $row1['url_ds'] . "</td>";
	echo "<td><a href='edit1.php?id_ds=" . $row1['id_ds']
	. "'>Редактировать</a></td>"; // запуск скрипта для редактирования
	echo "<td><a href='delete1.php?id_ds=" . $row1['id_ds']
	. "'>Удалить</a></td>"; // запуск скрипта для удаления записи
	echo "</tr>";
}
?>
</table>
<p> <a href="new1.php"> Добавить магазин </a>

<h2>Цифровые ключи: </h2>

<table border="1">
<tr>
  <th> id_dk </th> <th> buydate_dk </th> <th> expdate_dk </th> 
	<th> id_os </th> <th> id_ds </th> <th> cost_dk </th> <th> key_dk </th>
  <th> Редактировать </th> <th> Уничтожить </th>
</tr>
<?php	
$result2=mysqli_query($link, "SELECT * FROM dig_keys"); // запрос на выборку сведений о ключах
while ($row2 = mysqli_fetch_array($result2)) {
	echo "<tr>";
	
	echo "<td>" . $row2['id_dk'] . "</td>";
	echo "<td>" . date('d-m-Y', strtotime($row2['buydate_dk'])). "</td>";
	echo "<td>" . date ('d-m-Y', strtotime($row2['expdate_dk'])) . "</td>";
	echo "<td>" . $row2['id_os'] . "</td>";
	echo "<td>" . $row2['id_ds'] . "</td>";
	echo "<td>" . $row2['cost_dk'] . "</td>";
	echo "<td>" . $row2['key_dk'] . "</td>";
	
	echo "<td><a href='edit2.php?id_dk=" . $row2['id_dk']
	. "'>Редактировать</a></td>"; // запуск скрипта для редактирования
	echo "<td><a href='delete2.php?id_dk=" . $row2['id_dk']
	. "'>Удалить</a></td>"; // запуск скрипта для удаления записи
	echo "</tr>";
}
?>
</table>
<p> <a href="new2.php"> Добавить ключ </a>
<h3>Вывод данных из БД в виде отчета: </h3>
<p> <a href="gen_pdf.php"> Сгенерировать отчет в .PDF </a>
<p> <a href="gen_xls.php"> Сгенерировать отчет в .XLS </a>

</body>
 </html>