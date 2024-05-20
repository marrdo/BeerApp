<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<main class="user-add">
    <section class="container">
        <div class="row g-5">
            <aside class="col col-sm-4">
                <div class="side-nav">
                    <figure class="d-none d-lg-flex ">
                        <?= $this->Html->image('Users/add/user-add.webp', ['alt' => '3 cervezas', 'class' => 'rounded-5']); ?>
                    </figure>
                </div>
            </aside>
            <div class="col col-sm-4">
                <div class="users form content">
                    <?= $this->Form->create($user) ?>
                    <fieldset>
                        <legend><?= __('Registro de usuario') ?></legend>
                        <?php
                            echo $this->Form->control('dni', ['required' => true, 'class' => 'form-control form-floating mb-3', 'type' => 'text', 'label' => ['text' => 'DNI', 'class' => 'floatingInput']]);
                            echo $this->Form->control('nombre', ['required' => true, 'class' => 'form-control form-floating mb-3', 'type' => 'text', 'label' => ['text' => 'Nombre', 'class' => 'floatingInput']]);
                            echo $this->Form->control('apellidos', ['required' => true, 'class' => 'form-control form-floating mb-3', 'type' => 'text', 'label' => ['text' => 'Apellidos', 'class' => 'floatingInput']]);
                            echo $this->Form->control('email', ['required' => true, 'class' => 'form-control form-floating mb-3', 'type' => 'email', 'label' => ['text' => 'Correo electrónico', 'class' => 'floatingInput']]);
                            echo $this->Form->control('direccion', ['required' => true, 'class' => 'form-control form-floating mb-3', 'type' => 'text', 'label' => ['text' => 'Dirección', 'class' => 'floatingInput']]);
                            echo $this->Form->control('password', ['required' => true, 'class' => 'form-control form-floating mb-3', 'type' => 'password', 'label' => ['text' => 'Contraseña', 'class' => 'passwordInput']]);
                        ?>
                    </fieldset>
                    <?= $this->Form->button(__('Registrarse'), ['class' => 'btn btn-secondary mb-3']) ?>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </section>
</main>
