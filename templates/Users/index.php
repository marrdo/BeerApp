<?php

/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\User> $users
 * @var bool $isAdmin
 */
?>
<main class="index-user">
    <section class="container">
        <div class="users index content">
            <?= $isAdmin ? $this->Html->link(__('New User'), ['action' => 'add'], ['class' => 'button float-right']) : '' ?>
            <h3><?= __('Usuarios') ?></h3>
            <div class="table-responsive">
                <table class="table table-primary table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <?= $isAdmin ? '<th scope="col"><span class="text-dark">' . $this->Paginator->sort('id') . '</span></th>' : '' ?>
                            <?= $isAdmin ? '<th scope="col"><span class="text-dark">' . $this->Paginator->sort('dni') . '</span></th>' : '' ?>
                            <th scope="col"><span class="text-dark"><?= $this->Paginator->sort('nombre') ?></span></th>
                            <th scope="col"><span class="text-dark"><?= $this->Paginator->sort('apellidos') ?></span></th>
                            <th scope="col"><span class="text-dark"><?= $this->Paginator->sort('email') ?></span></th>
                            <?= $isAdmin ? '<th scope="col"><span class="text-dark">' . $this->Paginator->sort('direccion') . '</span></th>' : '' ?>

                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <?php foreach ($users as $user) : ?>
                            <tr>
                                <?= $isAdmin ? '<td>' . h($user->id) . '</td>' : '' ?>
                                <?= $isAdmin ? '<td>' . h($user->dni) . '</td>' : '' ?>
                                <td><?= ucfirst(h($user->nombre)) ?></td>
                                <td><?= ucfirst(h($user->apellidos)) ?></td>
                                <td><?= h($user->email) ?></td>
                                <?= $isAdmin ? '<td>' . h($user->direccion) . '</td>' : '' ?>
                                <td class="actions">
                                    <div class="btn-group btn-group-sm" role="group" aria-label="Small button group">
                                        <?= $this->Html->link(__('Ver'), ['action' => 'view', $user->id], ['class' => 'btn btn-info my-2 mx-1 rounded-pill', 'type' => 'button']) ?>
                                        <?= $isAdmin ? $this->Html->link(__('Editar'), ['action' => 'edit', $user->id], ['class' => 'btn btn-info my-2 mx-1 rounded-pill', 'type' => 'button']) : '' ?>
                                        <?= $isAdmin ? $this->Form->postLink(__('Borrar'), ['action' => 'delete', $user->id], ['confirm' => __('¿Seguro que deseas borrar a # {0}?', $user->id), 'class' => 'btn btn-danger my-2 mx-1 rounded-pill', 'type' => 'button']) : '' ?>
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