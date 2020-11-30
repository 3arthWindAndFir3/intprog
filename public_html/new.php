<html>
<head> 
<meta charset = "utf-8">
<title> Добавление новой ОС </title> </head>
<body>
<H2>Добавление ОС в БД:</H2>
<form action="save_new.php" metod="get">
<br>ID: <input name="id" size="42" type="text">
<br>Название: <input name="os_name" size="34" type="text">
<br>Тип устройств: <input name="os_hwtype" size="28" type="text">
<br>Разрядность: <input name="os_x" size="30" type="text">
<br>Разработчик: <input name="os_dev" size="30" type="text">
<br>Число пользователей: <input name="os_usnum" type="text">

<p><input name="add" type="submit" value="Добавить">
<input name="b2" type="reset" value="Очистить"></p>
</form>
<p>
<a href="index.php"> Вернуться к списку ОС </a>
</body>
</html>
