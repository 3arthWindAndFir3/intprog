<?php

require_once ('PHPExcel.php');
require_once __DIR__ . '/PHPExcel/Writer/Excel2007.php';
 
$xls = new PHPExcel();
$xls->setActiveSheetIndex(0);
$sheet = $xls->getActiveSheet();
$sheet->setTitle('OS');
$sheet->getPageSetup()->SetPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
$sheet->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

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
	
	$result=mysqli_query($link, "SELECT 
	id_dk, os_name, os_hwtype, os_x, os_dev, os_usnum,
	key_dk, buydate_dk, expdate_dk, url_ds FROM dig_keys
	INNER JOIN os ON os.id = dig_keys.id_os 
	INNER JOIN dig_shop ON dig_shop.id_ds=dig_keys.id_ds"); 
	// запрос на выборку сведений об ос
	
$sheet->getColumnDimension("B")->setWidth(10);	
$sheet->getColumnDimension("C")->setWidth(25);
$sheet->getColumnDimension("D")->setWidth(25);
$sheet->getColumnDimension("E")->setWidth(20);
$sheet->getColumnDimension("F")->setWidth(20);
$sheet->getColumnDimension("G")->setWidth(15);
$sheet->getColumnDimension("H")->setWidth(20);
$sheet->getColumnDimension("I")->setWidth(16);
$sheet->getColumnDimension("J")->setWidth(16);
$sheet->getColumnDimension("K")->setWidth(40);

$bg = array(
	'fill' => array(
		'type' => PHPExcel_Style_Fill::FILL_SOLID,
		'color' => array('rgb' => '00cd78')
	)
);

$sheet->getStyle("B1")->applyFromArray($bg);
$sheet->getStyle("C1")->applyFromArray($bg);
$sheet->getStyle("D1")->applyFromArray($bg);
$sheet->getStyle("E1")->applyFromArray($bg);
$sheet->getStyle("F1")->applyFromArray($bg);
$sheet->getStyle("G1")->applyFromArray($bg);
$sheet->getStyle("H1")->applyFromArray($bg);
$sheet->getStyle("I1")->applyFromArray($bg);
$sheet->getStyle("J1")->applyFromArray($bg);
$sheet->getStyle("K1")->applyFromArray($bg);

$sheet->setCellValue("B1", "№");
$sheet->setCellValue("C1", "Название");
$sheet->setCellValue("D1", "Тип оборудования");
$sheet->setCellValue("E1", "Разрядность");
$sheet->setCellValue("F1", "Разработчик");
$sheet->setCellValue("G1", "Число юзеров ");
$sheet->setCellValue("H1", "Ключ");
$sheet->setCellValue("I1", "Дата покупки");
$sheet->setCellValue("J1", "Дата истечения");
$sheet->setCellValue("K1", "Ссылка");


        $r = 2;
        // Для каждой строки из запроса
        while ($row = $result->fetch_row()){
            $c = 0;

            $sheet->setCellValueByColumnAndRow($c,$r);
            $c++;

            foreach ($row as $cell){
                if ($c==8 || $c==9 ){
                    $cell = date('d-m-Y', strtotime($cell));
                }
                $sheet->setCellValueByColumnAndRow($c,$r,$cell);
                $c++;
            }
            $r++;
        }
		for ($i=1; $i<=($r-1); $i++) {
			$sheet->getStyle("A".$i)->applyFromArray($bg);
		}

header("Expires: Mon, 1 Apr 1974 05:00:00 GMT");
header("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
header("Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
header("Content-Disposition: attachment; filename=file.xlsx");
 
$objWriter = new PHPExcel_Writer_Excel2007($xls);
$objWriter->save('php://output'); 
exit();	
?>

