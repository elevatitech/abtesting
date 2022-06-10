<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AccessLog $accessLog
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Access Log'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="accessLog form content">
            <?= $this->Form->create($accessLog) ?>
            <fieldset>
                <legend><?= __('Add Access Log') ?></legend>
                <?php
                    echo $this->Form->control('page');
                    echo $this->Form->control('version');
                    echo $this->Form->control('referrer');
                    echo $this->Form->control('is_view');
                    echo $this->Form->control('is_click');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
