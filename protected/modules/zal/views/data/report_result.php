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
<table class='report_table'>
<tr><td class='report_value'></td><td class='report_value'></td><td class='report_value'></td></tr>
<tr><td class='report_value_num'>1</td><td class='report_value_num'>2</td><td class='report_value_num'>3</td></tr>
<tr><td></td><td class='report_value'>Кол-во посетителей за год</td><td class='report_value' id='totalVisitors'>0</td></tr>
<tr><td></td><td class='report_value'>Кол-во посещений за год</td><td class='report_value' id='totalVisits'>0</td></tr>
<tr><td></td><td class='report_value'>Цели: родословная</td><td class='report_value'><?php echo $report_res['родословная'] ?></td></tr>
<tr><td></td><td class='report_value'> научная</td><td class='report_value'><?php echo $report_res['научная'] ?></td></tr>
<tr><td></td><td class='report_value'> народохозяйственная</td><td class='report_value'><?php echo $report_res['народохозяйственная'] ?></td></tr>
<tr><td></td><td class='report_value'>Новые посетители</td><td class='report_value'><?php echo $report_res['н'] ?></td></tr>
</table>
</div>

