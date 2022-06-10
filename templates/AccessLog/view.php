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
            <?= $this->Html->link(__('Edit Access Log'), ['action' => 'edit', $accessLog->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Access Log'), ['action' => 'delete', $accessLog->id], ['confirm' => __('Are you sure you want to delete # {0}?', $accessLog->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Access Log'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Access Log'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="accessLog view content">
            <h3><?= h($accessLog->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Page') ?></th>
                    <td><?= h($accessLog->page) ?></td>
                </tr>
                <tr>
                    <th><?= __('Version') ?></th>
                    <td><?= h($accessLog->version) ?></td>
                </tr>
                <tr>
                    <th><?= __('Referrer') ?></th>
                    <td><?= h($accessLog->referrer) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($accessLog->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Is View') ?></th>
                    <td><?= $this->Number->format($accessLog->is_view) ?></td>
                </tr>
                <tr>
                    <th><?= __('Is Click') ?></th>
                    <td><?= $this->Number->format($accessLog->is_click) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($accessLog->created) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
