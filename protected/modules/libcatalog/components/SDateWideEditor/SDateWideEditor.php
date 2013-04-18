<?php

/**
 * @author DrunkNinja
 */

/**
 * Base class.
 */
Yii::import('zii.widgets.jui.CJuiInputWidget');

class SDateWideEditor extends CJuiInputWidget
{
	public $model;
	public $attribute;
	
	public function setCalendar ()
	{
		$script = '$(function() {
		$("#period_'.$this->attribute.'").dialog({
		    autoOpen: false,
		    open: function() {
			$("#period_'.$this->attribute.' #periodBegin_'.$this->attribute.'").datepicker($.datepicker.regional["ru"]);
			$("#period_'.$this->attribute.' #periodEnd_'.$this->attribute.'").datepicker($.datepicker.regional["ru"]);
			$("#period_'.$this->attribute.' #closePeriod").click(function() {
			    $("#period_'.$this->attribute.').dialog("close");
			    return false;
			});
			$("#period_'.$this->attribute.' #clearPeriod").click(function() {
			    $("#period_'.$this->attribute.' input[type=text]").each(function(){$(this).val("");});
			    $("#period_'.$this->attribute.'").dialog("close");
			    return false;
			});
		    }
		});
	    
		$("#setPeriod").click(function() {
		    $("#period_'.$this->attribute.'").dialog("open");
		});
	    
		$("#date_begin, #periodBegin_'.$this->attribute.', #periodEnd_'.$this->attribute.'").mask({
		    mask: "dd.mm.yyyy",
		    definitions: {
			dd: function(value) {
			    value = parseInt(value, 10) % 32;
			    if (value >= 1 && value <= 31) return (value < 10 ? "0" : "") + (value);
			    return "__";
			},
			mm: function(value) {
			    value = parseInt(value, 10) % 13;
			    if (value >= 1 && value <= 12) return (value < 10 ? "0" : "") + (value);
			    return "__";
			},
			yyyy: function(value) {
			    value = parseInt(value, 10);
			    if (value >= 1 && value <= 9) return "200" + (value);
			    if (value >= 10 && value <= 99) return "19" + (value);
			    if (value >= 100 && value <= 999) return "1" + (value);
			    return value;
			}
		    }
		}).datepicker({showOn: "button",
				buttonImage: "/img/calendar.gif",
				buttonImageOnly: true},$.datepicker.regional["ru"]);
	    
		$("#setPeriod").button();
		});';
		
		$cs = Yii::app()->getClientScript();
		$cs->registerScript('sdate_'.$this->attribute,$script);
	}
	
	public function init()
	{
		parent::init();
	}

	/**
	 * Run this widget.
	 * This method registers necessary javascript and renders the needed HTML code.
	 */
	public function run()
	{			   
		//list ($name, $id) = $this->resolveNameId();
		echo CHtml::activeTextField($this->model, $this->attribute);
		echo CHtml::button('Set');
		echo CHtml::activeHiddenField($this->model, 'periodBegin_'.$this->attribute);
		echo CHtml::activeHiddenField($this->model, 'periodEnd_'.$this->attribute);
		echo "<div id='period_'".$this->attribute.">";
			echo "<h2>Период</h2>";
			echo CHtml::activeTextField($this->model, 'periodBegin_'.$this->attribute);
			echo CHtml::activeTextField($this->model, 'periodEnd_'.$this->attribute);
			echo CHtml::button('Очистить', array('id'=>'clearPeriod'));
			echo CHtml::button('Сохранить', array('id'=>'savePeriod'));
			echo CHtml::link('Закрыть', '#', array('id'=>'closePeriod'));
		echo "<div>";

	}

}
