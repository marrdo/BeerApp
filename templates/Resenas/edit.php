<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Resena $resena
 * @var string[]|\Cake\Collection\CollectionInterface $users
 * @var string[]|\Cake\Collection\CollectionInterface $cervezas
 */
?>
<main class="Resenas-edit">
    <section class="container">
        <div class="row">
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
            <div class="col-12">
                <div class="resenas form content">
                    <?= $this->Form->create($resena) ?>
                    <fieldset>
                        <legend><?= __('Editar Reseña') ?></legend>
                        <?= $this->Form->control('ref'); ?>
                        <?= $this->Form->control('slug'); ?>
                        <?= $this->Form->control('calificacion', ['type' => 'number', 'class' => 'mx-3 my-2 rounded', 'label' => 'Calificación', 'min' => 1, 'max' => 5]); ?>
                        <?= $this->Form->hidden('user_id', ['value' => $resena->user_id]); ?>
                        <?= $this->Form->hidden('cerveza_id', ['value' => $resena->cerveza_id]); ?>
                        <?= $this->Form->control('comentario', ['label' => 'Comentario', 'type' => 'textarea', 'class' => 'my-3 rounded']); ?>
                    </fieldset>
                    <?= $this->Form->button('Guardar cambios', ['class' => 'mt-3 col-3 btn btn-secondary', 'type' => 'submit']); ?>
                    <?= $this->Form->end() ?>
                </div>
            </div>
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
    </section>
</main>