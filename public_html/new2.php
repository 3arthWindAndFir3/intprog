<html>
<head> 
<meta charset = "utf-8">
<title> Добавление нового ключа </title> </head>
<body>
<H2>Добавление ключа в БД:</H2>
<form action="save_new2.php" metod="get">
<br>ID: <input name="id_dk" size="33" type="text">
<br>Дата покупки: <input name="buydate_dk" size="22" type="text">
<br>Дата истечения лицензии: <input name="expdate_dk" size="10" type="text">
<br>Код ОС: <input name="id_os" size="28" type="text">
<br>Код Магазина: <input name="id_ds" size="22" type="text">
<br>Цена ключа: <input name="cost_dk" size="24" type="text">
<br>Ключ: <input name="key_dk" size="30" type="text">

<p><input name="add" type="submit" value="Добавить">
<input name="b2" type="reset" value="Очистить"></p>
</form>
<p>
<a href="index.php"> Вернуться к списку ключей </a>
</body>
</html>
