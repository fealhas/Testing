<div id='ai'>
    <div class="splitterTree">
        <div style="background: #e3e3e3;">
            <?php
            $this->renderPartial('application.modules.newspaperFund.views.authorIndex.tree');
            ?>
        </div>
        <div>
            <?php
            $this->renderPartial('application.modules.newspaperFund.views.authorIndex.view', array(
                'model' => $model,
            ));
            ?>
        </div>
    </div>
</div>
