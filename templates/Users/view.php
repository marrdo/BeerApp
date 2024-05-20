<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<main class="user-view">
    <section class="container">
        <div class="row">
            <aside class="col col-sm-4">
                <div class="side-nav d-flex flex-column">
                    <h4 class="heading"><?= __('Acciones') ?></h4>
                    <?= $this->Html->link(__('Editar Usuario'), ['action' => 'edit', $user->id], ['class' => 'side-nav-item text-dark']) ?>
                    <?= $this->Form->postLink(__('Eliminar cuenta'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id), 'class' => 'side-nav-item text-dark']) ?>
                    <?= $this->Html->link(__('Ver usuarios'), ['action' => 'index'], ['class' => 'side-nav-item text-dark']) ?>
                    <?= $isAdmin ?  $this->Html->link(__('Añadir usuario'), ['action' => 'add'], ['class' => 'side-nav-item text-dark']) : '' ?>
                    <?= $isAdmin ?  $this->Html->link(__('Añadir Cerveza'), ['plugin' => null, 'controller' => 'Cervezas','action' => 'add'], ['class' => 'side-nav-item text-dark']) : '' ?>
                </div>
            </aside>
            <div class="col col-sm-8">
                <div class="users view content">
                    <h3><?= ucFirst(h($user->nombre)) ?></h3>
                    <div class="table-responsive">
                        <table class="table table-primary table-striped table-hover table-borderless">
                            <tr scope="row">
                                <th><?= __('DNI') ?></th>
                                <td><?= h($user->dni) ?></td>
                            </tr>
                            <tr scope="row">
                                <th><?= __('Nombre') ?></th>
                                <td><?= ucfirst(h($user->nombre)) ?></td>
                            </tr>
                            <tr scope="row">
                                <th><?= __('Apellidos') ?></th>
                                <td><?= ucfirst(h($user->apellidos)) ?></td>
                            </tr>
                            <tr scope="row">
                                <th><?= __('Email') ?></th>
                                <td><?= h($user->email) ?></td>
                            </tr>
                            <tr scope="row">
                                <th><?= __('Direccion') ?></th>
                                <td><?= h($user->direccion) ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>