<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cerveza $cerveza
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Cerveza'), ['action' => 'edit', $cerveza->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Cerveza'), ['action' => 'delete', $cerveza->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cerveza->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Cervezas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Cerveza'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="cervezas view content">
            <h3><?= h($cerveza->nombre) ?></h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= h($cerveza->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Ref') ?></th>
                    <td><?= h($cerveza->ref) ?></td>
                </tr>
                <tr>
                    <th><?= __('Slug') ?></th>
                    <td><?= h($cerveza->slug) ?></td>
                </tr>
                <tr>
                    <th><?= __('Nombre') ?></th>
                    <td><?= h($cerveza->nombre) ?></td>
                </tr>
                <tr>
                    <th><?= __('Tipo') ?></th>
                    <td><?= h($cerveza->tipo) ?></td>
                </tr>
                <tr>
                    <th><?= __('Color') ?></th>
                    <td><?= h($cerveza->color) ?></td>
                </tr>
                <tr>
                    <th><?= __('Origen') ?></th>
                    <td><?= h($cerveza->origen) ?></td>
                </tr>
                <tr>
                    <th><?= __('Familia Estilos') ?></th>
                    <td><?= h($cerveza->familia_estilos) ?></td>
                </tr>
                <tr>
                    <th><?= __('Sabor Dominante') ?></th>
                    <td><?= h($cerveza->sabor_dominante) ?></td>
                </tr>
                <tr>
                    <th><?= __('Precio') ?></th>
                    <td><?= $cerveza->precio === null ? '' : $this->Number->format($cerveza->precio) ?></td>
                </tr>
                <tr>
                    <th><?= __('Stock') ?></th>
                    <td><?= $cerveza->stock === null ? '' : $this->Number->format($cerveza->stock) ?></td>
                </tr>
                <tr>
                    <th><?= __('Media Valoracion') ?></th>
                    <td><?= $cerveza->media_valoracion === null ? '' : $this->Number->format($cerveza->media_valoracion) ?></td>
                </tr>
                <tr>
                    <th><?= __('Ibu') ?></th>
                    <td><?= $cerveza->ibu === null ? '' : $this->Number->format($cerveza->ibu) ?></td>
                </tr>
                <tr>
                    <th><?= __('Grados Alcohol') ?></th>
                    <td><?= $cerveza->grados_alcohol === null ? '' : $this->Number->format($cerveza->grados_alcohol) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Descripcion') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($cerveza->descripcion)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
