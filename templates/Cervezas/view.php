<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cerveza $cerveza
 */
?>
<main class="Cervezas-view">
    <section class="container">
        <div class="row">
            <aside class="col col-sm-4">
                <div class="side-nav d-flex flex-column">
                    <h4 class="heading"><?= __('Actions') ?></h4>
                    <?= $this->Html->link(__('Actualizar cerveza'), ['action' => 'edit', $cerveza->id], ['class' => 'side-nav-item text-dark']) ?>
                    <?= $this->Form->postLink(__('Eliminar cerveza'), ['action' => 'delete', $cerveza->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cerveza->id), 'class' => 'side-nav-item text-dark']) ?>
                    <?= $this->Html->link(__('Ver todas las cervezas'), ['action' => 'index'], ['class' => 'side-nav-item text-dark']) ?>
                    <?= $this->Html->link(__('Añadir cervezas'), ['action' => 'add'], ['class' => 'side-nav-item text-dark']) ?>
                </div>
            </aside>
            <div class="col-12 col-sm-8">
                <div class="cervezas view content">
                    <h3><?= ucfirst(h($cerveza->nombre)) ?></h3>
                    <div class="table-responsive">
                        <table class="table table-primary table-striped table-hover table-borderless>
                            <?= $isAdmin ? '<tr scope="row">
                                <th>' . __('Id') . '</th>
                                <td>' . h($cerveza->id) . '</td>
                            </tr>' : ''; ?>
                            <tr scope=" row">
                            <th><?= __('Ref') ?></th>
                            <td><?= h($cerveza->ref) ?></td>
                            </tr>
                            <?= $isAdmin ? '<tr scope="row">
                                <th>' . __('Slug') . '</th>
                                <td>' . h($cerveza->slug) . '</td>
                            </tr>' : ''; ?>
                            <tr scope="row">
                                <th><?= __('Nombre') ?></th>
                                <td><?= ucfirst(h($cerveza->nombre)) ?></td>
                            </tr>
                            <tr scope="row">
                                <th><?= __('Tipo') ?></th>
                                <td><?= ucfirst(h($cerveza->tipo)) ?></td>
                            </tr>
                            <tr scope="row">
                                <th><?= __('Color') ?></th>
                                <td><?= ucfirst(h($cerveza->color)) ?></td>
                            </tr>
                            <tr scope="row">
                                <th><?= __('Origen') ?></th>
                                <td><?= ucfirst(h($cerveza->origen)) ?></td>
                            </tr>
                            <tr scope="row">
                                <th><?= __('Familia Estilos') ?></th>
                                <td><?= h($cerveza->familia_estilos) ?></td>
                            </tr>
                            <tr scope="row">
                                <th><?= __('Sabor Dominante') ?></th>
                                <td><?= ucfirst(h($cerveza->sabor_dominante)) ?></td>
                            </tr>
                            <tr scope="row">
                                <th><?= __('Precio') ?></th>
                                <td><?= $cerveza->precio === null ? '' : $this->Number->currency($cerveza->precio) ?></td>
                            </tr>
                            <tr scope="row">
                                <th><?= __('Stock') ?></th>
                                <td><?= $cerveza->stock === null ? '' : $this->Number->format($cerveza->stock) ?></td>
                            </tr>
                            <tr scope="row">
                                <th><?= __('Media Valoracion') ?></th>
                                <td><?= $cerveza->media_valoracion === null ? '' : $this->Number->precision($cerveza->media_valoracion) ?></td>
                            </tr>
                            <tr scope="row">
                                <th><?= __('Ibu') ?></th>
                                <td><?= $cerveza->ibu === null ? '' : $this->Number->format($cerveza->ibu) ?></td>
                            </tr>
                            <tr scope="row">
                                <th><?= __('Grados Alcohol') ?></th>
                                <td><?= $cerveza->grados_alcohol === null ? '' : $this->Number->toPercentage($cerveza->grados_alcohol) ?></td>
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
        </div>
        <div>
            <div>
                <div class="row">
                    <?= $this->Html->link(__('Crear reseña'), ['controller' => 'Resenas', 'action' => 'add', $cerveza->id], ['class' => 'mt-5 col-3 btn btn-secondary']); ?>
                    <h4 class="mt-5"><?= __('Reseñas') ?></h4>
                    <div id="resenas" class="table-responsive">
                        <table class="table table-primary table-striped table-hover">
                            <thead class="table-dark">
                                <th scope="col"><span class="text-dark"><?= $this->Paginator->sort('Nombre usuario') ?></span></th>
                                <th scope="col"><span class="text-dark"><?= $this->Paginator->sort('Valoracion') ?></span></th>
                                <th scope="col"><span class="text-dark"><?= $this->Paginator->sort('Comentarios') ?></span></th>
                                <th scope="col"><span class="text-primary"><?= __('Acciones') ?></span></th>
                            </thead>
                            <tbody>
                                <?php foreach ($resenas as $resena) { ?>
                                    <tr>
                                        <td><?= $resena->user->nombre; ?></td>
                                        <td><?= $resena->calificacion; ?></td>
                                        <td><?= $resena->comentario; ?></td>
                                        <td class="action">
                                            <div class="btn-group btn-group-sm" role="group" aria-label="Small button group">
                                                <?= $this->Html->link(__('Ver usuario'), ['controller' => 'Users', 'action' => 'view', $user->id], ['class' => 'btn btn-info my-2 mx-1 rounded-pill', 'type' => 'button']) ?>
                                                <?= $isAdmin ? $this->Html->link(__('Editar'), ['action' => 'edit', $resena->id], ['class' => 'btn btn-info my-2 mx-1 rounded-pill', 'type' => 'button']) : '' ?>
                                                <?= $isAdmin ? $this->Form->postLink(__('Borrar'), ['action' => 'delete', $resena->id], ['confirm' => __('¿Seguro que deseas borrar a # {0}?', $resena->slug), 'class' => 'btn btn-danger my-2 mx-1 rounded-pill', 'type' => 'button']) : '' ?>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </section>
</main>