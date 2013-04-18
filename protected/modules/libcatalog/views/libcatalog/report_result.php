<div id='rep_results' align='center'>

<table class='report_table'>
<tr><td class='report_value'>Наименование видов статистики</td><td class='report_value'>Поступило за текущий год в архив</td><td class='report_value'>Всего хранится в архиве</td></tr>
<tr><td class='report_value_num'>1</td><td class='report_value_num'>2</td><td class='report_value_num'>3</td></tr>
<tr><td>Количество книг</td><td class='report_value'><?php echo $report_res['year']['КНИГА']; ?></td><td class='report_value'><?php echo $report_res['total']['КНИГА']; ?></td></tr>
<tr><td>Количество журналов</td><td class='report_value'><?php echo $report_res['year']['ЖУРНАЛ']; ?></td><td class='report_value'><?php echo $report_res['total']['ЖУРНАЛ']; ?></td></tr>
<tr><td>Количество методических пособий</td><td class='report_value'><?php echo $report_res['year']['МЕТОДИЧЕСКОЕ ПОСОБИЕ'] ?></td><td class='report_value'><?php echo $report_res['total']['МЕТОДИЧЕСКОЕ ПОСОБИЕ'] ?></td></tr>
<tr><td>Количество изданий с автографами</td><td class='report_value'><?php echo $report_res['year']['АВТОГРАФ'] ?></td><td class='report_value'><?php echo $report_res['total']['АВТОГРАФ'] ?></td></tr>
<tr><td>Количество ОЦД :</td><td class='report_value'><?php echo $report_res['year']['ОСОБО ЦЕННЫЕ'] ?></td><td class='report_value'><?php echo $report_res['total']['ОСОБО ЦЕННЫЕ'] ?></td></tr>
<tr><td>Количество УД :</td><td class='report_value'><?php echo $report_res['year']['УНИКАЛЬНЫЕ'] ?></td><td class='report_value'><?php echo $report_res['total']['УНИКАЛЬНЫЕ'] ?></td></tr>
</table>


<?php
// СОЗДАЕМ .DOC ФАЙЛ
$str = '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Windows-1252\">
<title>Saves as a Word Doc</title>
</head>
<body>
    <table>
<tr><td>Наименование видов статистики</td><td>Поступило за текущий год в архив</td><td>Всего хранится в архиве</td></tr>
<tr><td>1</td><td>2</td><td>3</td></tr>
<tr><td>Количество книг</td><td>'.$report_res['year']['КНИГА'] .'</td><td>'.$report_res['total']['КНИГА'].'</td></tr>
<tr><td>Количество журналов</td><td>'.$report_res['year']['ЖУРНАЛ'].'</td><td>'.$report_res['total']['ЖУРНАЛ'].'</td></tr>
<tr><td>Количество методических пособий</td><td>'.$report_res['year']['МЕТОДИЧЕСКОЕ ПОСОБИЕ'] .'</td><td>'. $report_res['total']['МЕТОДИЧЕСКОЕ ПОСОБИЕ'].'</td></tr>
<tr><td>Количество изданий с автографами</td><td>'.$report_res['year']['АВТОГРАФ'].'</td><td>'.$report_res['total']['АВТОГРАФ'].'</td></tr>
<tr><td>Количество ОЦД :</td><td>'.$report_res['year']['ОСОБО ЦЕННЫЕ'].'</td><td>'.$report_res['total']['ОСОБО ЦЕННЫЕ'].'</td></tr>
<tr><td>Количество УД :</td><td>'.$report_res['year']['УНИКАЛЬНЫЕ'].'</td><td>'.$report_res['total']['УНИКАЛЬНЫЕ'].'</td></tr>
</table>
</body>

</html>';

$fileName = "Отчет по библиотечному каталогу от ".Date("d.m.y, H:m:s").".doc";
$fp = fopen ("$fileName", "w");
fwrite($fp,$str);
fclose($fp);
$basePath = $this->getModule()->baseScriptUrl; //path to module assets folder
echo "<a href='$fileName'>";
		echo CHtml::imageButton("$basePath/img/icons/actions/word.png", array(
			'alt'=>'Сохранить в Word',
			'title'=>'Сохранить в Word',
            		'id'=>'saveWord',
			'class'=>'action_button',
			));
echo "</a>";
?>
</div>

