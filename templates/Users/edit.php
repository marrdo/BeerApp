<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<main class="user-edit">
    <section class="container">
        <div class="row">
            <aside class="col col-sm-4">
                <div class="side-nav d-flex flex-column">
                    <h4 class="heading"><?= __('Acciones') ?></h4>
                    <?= $this->Html->link(__('Editar Usuario'), ['action' => 'edit', $user->id], ['class' => 'side-nav-item text-dark']) ?>
                    <?= $this->Form->postLink(__('Eliminar cuenta'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id), 'class' => 'side-nav-item text-dark']) ?>
                    <?= $this->Html->link(__('Ver usuarios'), ['action' => 'index'], ['class' => 'side-nav-item text-dark']) ?>
                </div>
            </aside>
            <div class="col col-sm-8">
                <div class="users form content">
                    <?= $this->Form->create($user) ?>
                    <fieldset>
                        <legend><?= __('Editar usuario: ' . ucfirst($user->nombre)) ?></legend>
                        <?php
                        echo $this->Form->control('dni', ['required' => true, 'class' => 'form-control form-floating mb-3', 'type' => 'text', 'label' => ['text' => 'DNI', 'class' => 'floatingInput']]);
                        echo $this->Form->control('nombre', ['required' => true, 'class' => 'form-control form-floating mb-3', 'type' => 'text', 'label' => ['text' => 'Nombre', 'class' => 'floatingInput']]);
                        echo $this->Form->control('apellidos', ['required' => true, 'class' => 'form-control form-floating mb-3', 'type' => 'text', 'label' => ['text' => 'Apellidos', 'class' => 'floatingInput']]);
                        echo $this->Form->control('email', ['required' => true, 'class' => 'form-control form-floating mb-3', 'type' => 'email', 'label' => ['text' => 'Correo electrónico', 'class' => 'floatingInput']]);
                        echo $this->Form->control('direccion', ['required' => true, 'class' => 'form-control form-floating mb-3', 'type' => 'text', 'label' => ['text' => 'Dirección', 'class' => 'floatingInput']]);
                        echo $this->Form->control('password', ['required' => true, 'class' => 'form-control form-floating mb-3', 'type' => 'password', 'label' => ['text' => 'Contraseña', 'class' => 'passwordInput'], 'default' => ' ']);
                        ?>
                    </fieldset>
                    <?= $this->Form->button(__('Actualizar'), ['class' => 'btn btn-secondary mb-3', 'confirm' => __('¿Realizar cambios para {0}?', ucfirst($user->nombre))]) ?>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </section>
</main>