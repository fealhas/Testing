<div align='center' class="content" id='report_result' style='display: block;'>
<?php
$basePath = $this->getModule()->baseScriptUrl; //path to module assets folder
        echo CHtml::link(CHtml::image("$basePath/img/icons/actions/word.png", 'Опись'), 
                array('data/doc'),
                array('target'=>'_blank',
		      'title' => 'Сохранить в Word',
              	      'id' => 'word',
                      'onClick'=>'doc(this, "Отчет", "#rep_results");'
                    ));
        ?>
<div id='rep_results' align='center'>
<center>
<table class='report_table'>
<tr>
	<td style='text-align:center'>n/n</td>
	<td style='text-align:center'>Наименование видов статистики</td>
	<td style='text-align:center'><?php echo $period; ?></td>
</tr>
<tr>
	<td style='text-align:center'>1</td>
	<td style='text-align:center'>2</td>
	<td style='text-align:center'>3</td>
</tr>
<tr>
	<td>1</td>
	<td class='report_value' style='text-align:left'>Количество посещений читального зала</td>
	<td class='report_value'><?php echo $totalVisits; ?></td>
</tr>
<tr>
	<td>2</td>
	<td class='report_value' style='text-align:left'>Количество посетителей читального зала</td>
	<td class='report_value'><?php echo $totalVisitors; ?></td>
</tr>
<tr>
	<td>3</td>
	<td class='report_value' style='text-align:left'>Количество новых посетителей</td>
	<td class='report_value'><?php echo $totalNewVisitors; ?></td>
</tr>
<tr>
	<td>4</td>
	<td class='report_value' style='text-align:left'>Количество посещений читального зала с целью: 
	<ul style='text-align:left'>
		<li><strong>&nbsp&nbsp&nbsp&nbsp &#149 </strong>родословная</li>
		<li><strong>&nbsp&nbsp&nbsp&nbsp &#149 </strong>научная</li>
		<li><strong>&nbsp&nbsp&nbsp&nbsp &#149 </strong>народохояйственная</li>
	</ul>
	</td>
	<td class='report_value'>
		<ul><li><?php echo $totalRodosl; ?></li>
			<li><?php echo $totalScience; ?></li>
			<li><?php echo $totalNarhoz; ?></li>
		</ul>
	</td>
</tr>
<tr>
	<td>5</td>
	<td class='report_value' style='text-align:left'> <p>
	Количество ед.хр. электронного фонда пользования, выданных посетителям читального зала:</p></td>
	<td class='report_value'>
		<?php echo $totalFund; ?>
	</td>
</tr>
</table>
</center>
</div>
</div>
