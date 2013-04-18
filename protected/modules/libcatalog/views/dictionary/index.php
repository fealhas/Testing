<div id='dictionary_menu' style="display: inline;">
	<div id='dict_names' style="float: left; overflow-y: visible;">
		<h1>Словари</h1>
		<div class='dict_div'>
			<?php
			$auth_index = new Libcatalog();
			$dict_names = $auth_index->getAllowLabels();
			
			if (is_array($dict_names))
			{
				foreach ($dict_names as $key=>$name)
				{
					echo "<div id='$key'; class='dict_name'; >$name</div>";
				}
			}
			?>
		</div>
	</div>

	<div id='dictionary_content' style="float:left;">
	<div id="save_update_dict" class='hidden'>Данные успешно сохранены!</div>
		<?php
			$this->renderPartial($this->dictCtrlViewPath.'._form',
					     array('model'=>$model));
		?>
	</div>
</div>
