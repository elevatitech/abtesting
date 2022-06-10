<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AccessLog[]|\Cake\Collection\CollectionInterface $accessLog
 */
?>
<div class="accessLog index content">
    <h3><?= __('Raw Access Log') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('page') ?></th>
                    <th><?= $this->Paginator->sort('version') ?></th>
                    <th><?= $this->Paginator->sort('referrer') ?></th>
                    <th><?= $this->Paginator->sort('is_view') ?></th>
                    <th><?= $this->Paginator->sort('is_click') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($accessLog as $accessLog): ?>
                <tr>
                    <td><?= h($accessLog->page) ?></td>
                    <td><?= h($accessLog->version) ?></td>
                    <td><?= h($accessLog->referrer) ?></td>
                    <td><?= $this->Number->format($accessLog->is_view) ?></td>
                    <td><?= $this->Number->format($accessLog->is_click) ?></td>
                    <td><?= h($accessLog->created) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
