<div id='search_tab'>
    <div class="splitterSearch">
        <div style="background: #e3e3e3;">
            <?php
            $this->renderPartial('application.modules.syscatalog.views.authorIndex.tree_search');
            ?>
        </div>
        <div>
            <?php
            $this->renderPartial('application.modules.syscatalog.views.authorIndex._search', array(
                'model' => $model,
            ));
            ?>
        </div>
    </div>
</div>
