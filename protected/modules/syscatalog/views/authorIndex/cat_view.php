<?php
    if ($cat!==null){
?>
<div class="form">
        <h3 style="margin:10px;">Информация о каталоге</h4>
        <div class='row' style="margin:10px;">
        <?php
        echo CHtml::label('Название: ', 'caption', array(
                'style' => 'display: inline;',
                'class'=>'labeled_text',
            ));
         echo CHtml::tag('span',
                        array('id'=>'cat_caption',
                            ),
                         $cat->caption
                );
        ?>
        </div>
        
        <?php
        if (!empty($cat->info)){
        ?>
        <div class='row' style="margin:10px;">
        <?php
 
        echo CHtml::activeLabelEx($cat, 'Примечание:');
        echo CHtml::tag('span',
                        array('id'=>'cat_info', 
                                            'rows'=>6, 
                                            'cols'=>60,
                                            'readonly'=>'readonly',),
                         $cat->info
                );
        ?>
               </div>
        <?php
        }
        ?>
</div>
<?php
    }
?>