<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Cerveza> $cervezas
 */
?>
<div class="cervezas index content">
    <?= $this->Html->link(__('New Cerveza'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Cervezas') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('ref') ?></th>
                    <th><?= $this->Paginator->sort('slug') ?></th>
                    <th><?= $this->Paginator->sort('nombre') ?></th>
                    <th><?= $this->Paginator->sort('precio') ?></th>
                    <th><?= $this->Paginator->sort('stock') ?></th>
                    <th><?= $this->Paginator->sort('media_valoracion') ?></th>
                    <th><?= $this->Paginator->sort('tipo') ?></th>
                    <th><?= $this->Paginator->sort('ibu') ?></th>
                    <th><?= $this->Paginator->sort('grados_alcohol') ?></th>
                    <th><?= $this->Paginator->sort('color') ?></th>
                    <th><?= $this->Paginator->sort('origen') ?></th>
                    <th><?= $this->Paginator->sort('familia_estilos') ?></th>
                    <th><?= $this->Paginator->sort('sabor_dominante') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cervezas as $cerveza): ?>
                <tr>
                    <td><?= h($cerveza->id) ?></td>
                    <td><?= h($cerveza->ref) ?></td>
                    <td><?= h($cerveza->slug) ?></td>
                    <td><?= h($cerveza->nombre) ?></td>
                    <td><?= $cerveza->precio === null ? '' : $this->Number->format($cerveza->precio) ?></td>
                    <td><?= $cerveza->stock === null ? '' : $this->Number->format($cerveza->stock) ?></td>
                    <td><?= $cerveza->media_valoracion === null ? '' : $this->Number->format($cerveza->media_valoracion) ?></td>
                    <td><?= h($cerveza->tipo) ?></td>
                    <td><?= $cerveza->ibu === null ? '' : $this->Number->format($cerveza->ibu) ?></td>
                    <td><?= $cerveza->grados_alcohol === null ? '' : $this->Number->format($cerveza->grados_alcohol) ?></td>
                    <td><?= h($cerveza->color) ?></td>
                    <td><?= h($cerveza->origen) ?></td>
                    <td><?= h($cerveza->familia_estilos) ?></td>
                    <td><?= h($cerveza->sabor_dominante) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $cerveza->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $cerveza->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $cerveza->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cerveza->id)]) ?>
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
