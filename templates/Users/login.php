<main class="login">
    <section class=" text-center text-lg-start">
        <div class="card mb-3">
            <div class="row g-0 d-flex align-items-center">
                <?= $this->Flash->render(); ?>
                <figure class="col-lg-4 d-none d-lg-flex img-login">
                    <?= $this->Html->image('Users/login/login.webp', ['class' => 'rounded-t-5 rounded-tr-lg-0 rounded-bl-lg-5']); ?>
                </figure>
                <div class="col-lg-8">
                    <div class="card-body py-5 px-md-5">
                        <h2>Inicio de sesión</h2>
                        <?= $this->Form->create() ?>
                        <fieldset>
                            <legend><?= __('Introduzca sus credenciales') ?></legend>
                            <?= $this->Form->control('email', ['required' => true, 'class' => 'form-control form-floating mb-3', 'type' => 'email', 'label' => ['text' => 'Correo electrónico', 'class' => 'floatingInput']]) ?>
                            <?= $this->Form->control('password', ['required' => true, 'class' => 'form-control form-floating mb-3', 'type' => 'password', 'label' => ['text' => 'Contraseña', 'class' => 'floatingPassword']]) ?>
                        </fieldset>
                        <?= $this->Form->submit(__('Iniciar sesión'), ['class' => 'btn btn-primary mb-3']); ?>
                        <?= $this->Form->end() ?>

                        <?= $this->Html->link("Registrarse", ['action' => 'add'], ['class' => 'btn btn-outline-primary text-end']) ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>