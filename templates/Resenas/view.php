<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Resena $resena
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Resena'), ['action' => 'edit', $resena->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Resena'), ['action' => 'delete', $resena->id], ['confirm' => __('Are you sure you want to delete # {0}?', $resena->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Resenas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Resena'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="resenas view content">
            <h3><?= h($resena->ref) ?></h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= h($resena->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Ref') ?></th>
                    <td><?= h($resena->ref) ?></td>
                </tr>
                <tr>
                    <th><?= __('Slug') ?></th>
                    <td><?= h($resena->slug) ?></td>
                </tr>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $resena->has('user') ? $this->Html->link($resena->user->nombre, ['controller' => 'Users', 'action' => 'view', $resena->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Cerveza') ?></th>
                    <td><?= $resena->has('cerveza') ? $this->Html->link($resena->cerveza->nombre, ['controller' => 'Cervezas', 'action' => 'view', $resena->cerveza->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Calificacion') ?></th>
                    <td><?= $this->Number->format($resena->calificacion) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Comentario') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($resena->comentario)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
