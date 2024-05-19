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
                        <h3>Login</h3>
                        <?= $this->Form->create() ?>
                        <fieldset>
                            <legend><?= __('Please enter your username and password') ?></legend>
                            <?= $this->Form->control('email', ['required' => true]) ?>
                            <?= $this->Form->control('password', ['required' => true]) ?>
                        </fieldset>
                        <?= $this->Form->submit(__('Login')); ?>
                        <?= $this->Form->end() ?>

                        <?= $this->Html->link("Add User", ['action' => 'add']) ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>