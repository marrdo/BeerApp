<footer class="py-3 mt-4 border-top bg-dark">
    <div class="container">
        <div class="row align-items-center justify-content-center ">
            <a href="#top" class="col-12 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto text-decoration-none">
                <figure id="logo-footer"><?= $this->Html->image('logo_favicon/logoBeerApp.png',['alt' => 'Logo']); ?></figure>
            </a>
            <ul class="nav col-12 row justify-content-center align-items-center">
                <li class="nav-item col-12 col-md-3 text-center">
                    <?php echo $this->Html->link('Inicio', ['plugin' => null, 'controller' => 'Pages', 'action' => 'display'], ['class' => 'nav-link px-2']); ?>
                </li>

                <li class="nav-item col-12 col-md-3 text-center">
                    <?php echo $this->Html->link('Características', ['plugin' => null, 'controller' => 'Pages', 'action' => 'features'], ['class' => 'nav-link px-2']); ?>
                </li>
                <li class="nav-item col-12 col-md-3 text-center">
                    <?php echo $this->Html->link('Preguntas frecuentes', ['plugin' => null, 'controller' => 'Pages', 'action' => 'faqs'], ['class' => 'nav-link px-2']); ?>
                </li>
                <li class="nav-item col-12 col-md-3 text-center">
                    <?php echo $this->Html->link('Sobre nosotros', ['plugin' => null, 'controller' => 'Pages', 'action' => 'about'], ['class' => 'nav-link px-2']); ?>
                </li>
            </ul>
        </div>
    </div>
</footer>