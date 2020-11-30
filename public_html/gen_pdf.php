<?php
require('tfpdf.php');    
$pdf=new tFPDF();
$pdf->AddPage();
$pdf->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
$pdf->SetFont('DejaVu','',5);
$pdf->Cell(190,10,'Вараксин Л.Д. ПИ-318 Вариант 8',0,1,'C');
$pdf->Cell(190,10,'PDF файл сгенерирован с помощью библиотеки tFPDF',0,1,'C');
//testing output
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
	    $pdf->Cell(10,4,"№",1,0,'C',0);
        $pdf->Cell(20,4,"Название",1,0,'L',0);
		$pdf->Cell(25,4,"Тип оборудования",1,0,'L',0);
        $pdf->Cell(17,4,"Разрядность",1,0,'C',0);
        $pdf->Cell(17,4,"Разработчик",1,0,'C',0);
        $pdf->Cell(13,4,"Число юзеров",1,0,'C',0,1);
		$pdf->Cell(23,4,"Ключ",1,0,'C',0,1);
		$pdf->Cell(16,4,"Дата покупки",1,0,'C',0,1);
		$pdf->Cell(16,4,"Дата истечения",1,0,'C',0,1);
		$pdf->Cell(40,4,"Ссылка",1,0,'C',0,1);
	$pdf->Ln();
	$result=mysqli_query($link, "SELECT id_dk, os_name, os_hwtype, os_x, os_dev, os_usnum, key_dk, buydate_dk, expdate_dk, url_ds FROM dig_keys
	INNER JOIN os ON os.id = dig_keys.id_os INNER JOIN dig_shop ON dig_shop.id_ds=dig_keys.id_ds"); // запрос на выборку сведений об ос
		while ($row=mysqli_fetch_array($result)){
        $pdf->Cell(10,4,$row['id_dk'],1,0,'C',0);
        $pdf->Cell(20,4,$row['os_name'],1,0,'L',0);
		$pdf->Cell(25,4,$row['os_hwtype'],1,0,'L',0);
        $pdf->Cell(17,4,$row['os_x'],1,0,'C',0);
        $pdf->Cell(17,4,$row['os_dev'],1,0,'C',0);
        $pdf->Cell(13,4,$row['os_usnum'],1,0,'C',0,1);
		$pdf->Cell(23,4,$row['key_dk'],1,0,'C',0,1);
		$pdf->Cell(16,4,date('d-m-Y', strtotime($row['buydate_dk'])),1,0,'C',0,1);
		$pdf->Cell(16,4,date ('d-m-Y', strtotime($row['expdate_dk'])),1,0,'C',0,1);
		$pdf->Cell(40,4,$row['url_ds'],1,0,'C',0,1);
        $pdf->Ln();
		}
		$pdf->Output('doc.pdf', 'D');
		exit();
?>