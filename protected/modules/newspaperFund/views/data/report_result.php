<div id='rep_results' align='center'>

<table class='report_table'>
<tr><td class='report_value'>Наименование видов статистики</td><td class='report_value'>Поступило за текущий год в архив</td><td class='report_value'>Всего хранится в архиве</td></tr>
<tr><td class='report_value_num'>1</td><td class='report_value_num'>2</td><td class='report_value_num'>3</td></tr>
<tr><td>Количество подшивок дореволюционного периода</td><td class='report_value'><?php echo $report_res['year']['ДОРЕВОЛЮЦИОННЫЙ']; ?></td><td class='report_value'><?php echo $report_res['total']['ДОРЕВОЛЮЦИОННЫЙ']; ?></td></tr>
<tr><td>Количество подшивок советского периода</td><td class='report_value'><?php echo $report_res['year']['СОВЕТСКИЙ']; ?></td><td class='report_value'><?php echo $report_res['total']['СОВЕТСКИЙ']; ?></td></tr>
<tr><td>Количество подшивок постсоветского периода</td><td class='report_value'><?php echo $report_res['year']['ПОСТСОВЕТСКИЙ'] ?></td><td class='report_value'><?php echo $report_res['total']['ПОСТСОВЕТСКИЙ'] ?></td></tr>
<tr><td>Количество подшивок в электронном формате</td><td class='report_value'><?php echo $report_res['year']['ЭЛЕКТРОН'] ?></td><td class='report_value'><?php echo $report_res['total']['ЭЛЕКТРОН'] ?></td></tr>
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
<tr><td>Количество подшивок дореволюционного периода</td><td>'.$report_res['year']['ДОРЕВОЛЮЦИОННЫЙ'] .'</td><td>'.$report_res['total']['ДОРЕВОЛЮЦИОННЫЙ'].'</td></tr>
<tr><td>Количество подшивок советского периода</td><td>'.$report_res['year']['СОВЕТСКИЙ'].'</td><td>'.$report_res['total']['СОВЕТСКИЙ'].'</td></tr>
<tr><td>Количество подшивок постсоветского периода</td><td>'.$report_res['year']['ПОСТСОВЕТСКИЙ'] .'</td><td>'. $report_res['total']['ПОСТСОВЕТСКИЙ'].'</td></tr>
<tr><td>Количество подшивок в электронном формате</td><td>'.$report_res['year']['ЭЛЕКТРОН'].'</td><td>'.$report_res['total']['ЭЛЕКТРОН'].'</td></tr>
</table>
</body>

</html>';

$fileName = "Отчет по газетному фонду от ".Date("d.m.y, H:m:s").".doc";
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

