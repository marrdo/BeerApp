<?php

/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Cerveza> $cervezas
 */
?>
<main class="cervezas-index">
    <section class="container-fluid">
        <div class="cervezas index content">
            <?= $isAdmin ?  $this->Html->link(__('Añadir cerveza'), ['action' => 'add'], ['class' => 'btn btn-secondary']) : '' ?>
            <h3><?= __('Cervezas') ?></h3>
            <div class="table-responsive">
                <table class="table table-primary table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <?= $isAdmin ? '<th scope="col"><span class="text-dark">' . $this->Paginator->sort('id') . '</span></th>' : '' ?></th>
                            <th><?= $this->Paginator->sort('ref') ?></th>
                            <?= $isAdmin ? '<th scope="col"><span class="text-dark">' .  $this->Paginator->sort('slug')  . '</span></th>' : '' ?>
                            <th scope="col"><span class="text-dark"><?= $this->Paginator->sort('nombre') ?></span></th>
                            <th scope="col"><span class="text-dark"><?= $this->Paginator->sort('stock') ?></span></th>
                            <th scope="col"><span class="text-dark"><?= $this->Paginator->sort('precio') ?></span></th>
                            <th scope="col"><span class="text-dark"><?= $this->Paginator->sort('media_valoracion') ?></span></th>
                            <th scope="col"><span class="text-dark"><?= $this->Paginator->sort('tipo') ?></span></th>
                            <th scope="col"><span class="text-dark"><?= $this->Paginator->sort('ibu') ?></span></th>
                            <th scope="col"><span class="text-dark"><?= $this->Paginator->sort('grados_alcohol') ?></span></th>
                            <th scope="col"><span class="text-dark"><?= $this->Paginator->sort('color') ?></span></th>
                            <th scope="col"><span class="text-dark"><?= $this->Paginator->sort('origen') ?></span></th>
                            <th scope="col"><span class="text-dark"><?= $this->Paginator->sort('familia_estilos') ?></span></th>
                            <th scope="col"><span class="text-dark"><?= $this->Paginator->sort('sabor_dominante') ?></span></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <?php foreach ($cervezas as $cerveza) : ?>
                            <tr>
                                <?= $isAdmin ? '<td>' . h($cerveza->id) . '</td>' : '' ?>
                                <td><?= h($cerveza->ref) ?></td>
                                <?= $isAdmin ? '<td>' . h($cerveza->slug) . '</td>' : '' ?>
                                <td><?= ucfirst(h($cerveza->nombre)) ?></td>
                                <td><?= $cerveza->stock === null ? '' : $this->Number->format($cerveza->stock) ?></td>
                                <td><?= $cerveza->precio === null ? '' :$cerveza->precio ?></td>
                                <td><?= $cerveza->media_valoracion === null ? '' : $cerveza->valoracion ?></td>
                                <td><?= ucfirst(h($cerveza->tipo)) ?></td>
                                <td><?= $cerveza->ibu === null ? '' : $this->Number->format($cerveza->ibu) ?></td>
                                <td><?= $cerveza->grados_alcohol === null ? '' : $cerveza->grados_alcohol ?></td>
                                <td><?= ucfirst(h($cerveza->color)) ?></td>
                                <td><?= ucfirst(h($cerveza->origen)) ?></td>
                                <td><?= ucfirst(h($cerveza->familia_estilos)) ?></td>
                                <td><?= ucfirst(h($cerveza->sabor_dominante)) ?></td>
                                <td class="actions">
                                    <div class="btn-group btn-group-sm" role="group" aria-label="Small button group">
                                        <?= $this->Html->link(__('Ver'), ['action' => 'view', $cerveza->id], ['class' => 'btn btn-info my-2 mx-1 rounded-pill', 'type' => 'button']) ?>
                                        <?= $isAdmin ? $this->Html->link(__('Editar'), ['action' => 'edit', $cerveza->id], ['class' => 'btn btn-info my-2 mx-1 rounded-pill', 'type' => 'button']) : '' ?>
                                        <?= $isAdmin ? $this->Form->postLink(__("Borrar"), ['action' => 'delete', $cerveza->id], ['confirm' => __('¿Seguro que deseas borrar a # {0}?', $cerveza->nombre), 'class' => 'btn btn-danger my-2 mx-1 rounded-pill', 'type' => 'button']) : '' ?>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="paginator">
                <ul class="pagination">
                    <?= $this->Paginator->first('<< ' . __('Primero')) ?>
                    <?= $this->Paginator->prev('< ' . __('Anterior')) ?>
                    <?= $this->Paginator->numbers() ?>
                    <?= $this->Paginator->next(__('Siguiente') . ' >') ?>
                    <?= $this->Paginator->last(__('Última') . ' >>') ?>
                </ul>
                <p><?= $this->Paginator->counter(__('Pagina {{page}} de {{pages}}, mostrando {{current}} registro/s de {{count}} en total')) ?></p>
            </div>
        </div>
    </section>
</main>