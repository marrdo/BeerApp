<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Resena> $resenas
 */
?>
<div class="resenas index content">
    <?= $this->Html->link(__('New Resena'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Resenas') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('ref') ?></th>
                    <th><?= $this->Paginator->sort('slug') ?></th>
                    <th><?= $this->Paginator->sort('calificacion') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('cerveza_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($resenas as $resena): ?>
                <tr>
                    <td><?= h($resena->id) ?></td>
                    <td><?= h($resena->ref) ?></td>
                    <td><?= h($resena->slug) ?></td>
                    <td><?= $this->Number->format($resena->calificacion) ?></td>
                    <td><?= $resena->has('user') ? $this->Html->link($resena->user->nombre, ['controller' => 'Users', 'action' => 'view', $resena->user->id]) : '' ?></td>
                    <td><?= $resena->has('cerveza') ? $this->Html->link($resena->cerveza->nombre, ['controller' => 'Cervezas', 'action' => 'view', $resena->cerveza->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $resena->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $resena->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $resena->id], ['confirm' => __('Are you sure you want to delete # {0}?', $resena->id)]) ?>
                    </td>
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
