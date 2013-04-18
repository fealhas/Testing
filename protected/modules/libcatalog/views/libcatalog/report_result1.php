<div id='rep_results' align='center'>

<table class='report_table'>
<tr><td class='report_value'>Наименование видов статистики</td><td class='report_value'>Поступило за текущий год в архив</td><td class='report_value'>Всего хранится в архиве</td></tr>
<tr><td class='report_value'>1</td><td class='report_value'>2</td><td class='report_value'>3</td></tr>
<tr><td>Количество книг</td><td class='report_value'><?php echo $report_res['year']['КНИГА']; ?></td><td class='report_value'><?php echo $report_res['total']['КНИГА']; ?></td></tr>
<tr><td>Количество журналов</td><td class='report_value'><?php echo $report_res['year']['ЖУРНАЛ']; ?></td><td class='report_value'><?php echo $report_res['total']['ЖУРНАЛ']; ?></td></tr>
<tr><td>Количество методических пособий</td><td class='report_value'><?php echo $report_res['year']['МЕТОДИЧЕСКОЕ ПОСОБИЕ'] ?></td><td class='report_value'><?php echo $report_res['total']['МЕТОДИЧЕСКОЕ ПОСОБИЕ'] ?></td></tr>
<tr><td>Количество изданий с автографами</td><td class='report_value'><?php echo $report_res['year']['АВТОГРАФ'] ?></td><td class='report_value'><?php echo $report_res['total']['АВТОГРАФ'] ?></td></tr>
<tr><td>Количество ОЦД :</td><td class='report_value'><?php echo $report_res['year']['ОСОБО ЦЕННЫЕ'] ?></td><td class='report_value'><?php echo $report_res['total']['ОСОБО ЦЕННЫЕ'] ?></td></tr>
<tr><td>Количество УД :</td><td class='report_value'><?php echo $report_res['year']['УНИКАЛЬНЫЕ'] ?></td><td class='report_value'><?php echo $report_res['total']['УНИКАЛЬНЫЕ'] ?></td></tr>
</table>

</div>
