<?php
$user = $this->getRequest()->getAttribute('authentication')->getIdentity();
$isAuthenticated = $user !== null;
$userId = $isAuthenticated ? $user->id : null;
?>
<header>
  <nav class="navbar bg-dark navbar-dark">
    <div class="container-fluid">
      <figure id="logo">
        <?= $this->Html->image('logo_favicon/logoBeerApp.png', ['url' => ['plugin' => null, 'controller' => 'Pages', 'action' => 'display']]); ?>
      </figure>

      <button class="navbar-toggler me-auto me-md-5" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="offcanvas offcanvas-end bg-dark" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title text-primary" id="offcanvasNavbarLabel">Menu</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body bg-primary">
          <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
            <li class="nav-item">
              <?= $this->Html->link('Inicio', ['plugin' => null, 'controller' => 'Pages', 'action' => 'display'], ['class' => 'nav-link active text-dark', 'aria-current' => 'page']); ?>
            </li>
            <li class="nav-item">
              <?= $this->Html->link('Cervezas', ['plugin' => null, 'controller' => 'Cervezas', 'action' => 'index'], ['class' => 'nav-link active text-dark', 'aria-current' => 'page']); ?>
            </li>
            <li class="nav-item dropdown">
              <?= $this->Html->link('Usuarios', ['plugin' => null, 'controller' => 'Users', 'action' => 'index'], ['class' => 'nav-link active text-dark', 'aria-current' => 'page']); ?>
            </li>
            <li>

            </li>
          </ul>
          <form class="d-flex mt-3" role="search">
            <input class="form-control me-2" type="search" placeholder="Buscador de cervezas" aria-label="Search">
            <button class="btn btn-outline-dark" type="submit">Buscar</button>
          </form>
          <ul class="list-group my-5">
            <li class="list-group-item active" aria-current="true">Opciones de usuario</li>
            <?php if ($isAuthenticated) : ?>
              <li class="list-group-item"><?= $this->Html->link('Ver perfil', ['plugin' => null, 'controller' => 'Users', 'action' => 'view', $userId], ['class' => 'text-dark']); ?></li>
              <li class="list-group-item"><?= $this->Html->link('Editar perfil', ['plugin' => null, 'controller' => 'Users', 'action' => 'edit', $userId], ['class' => 'text-dark']); ?></li>
              <li class="list-group-item"><?= $this->Form->postLink(
                                            'Eliminar cuenta',
                                            ['plugin' => null, 'controller' => 'Users', 'action' => 'delete', $userId],
                                            ['confirm' => '¿Estás seguro de que deseas eliminar tu cuenta?'],
                                            ['class' => 'text-dark']
                                          ); ?></li>
              <li class="list-group-item"><?= $isAuthenticated ? $this->Html->link('Cerrar sesión', ['plugin' => null, 'controller' => 'Users', 'action' => 'logout'], ['class' => 'nav-link active text-dark', 'aria-current' => 'page']) :
                                            $this->Html->link('Iniciar sesión', ['plugin' => null, 'controller' => 'Users', 'action' => 'login'], ['class' => 'nav-link active text-dark', 'aria-current' => 'page']); ?></li>
            <?php else : ?>
              <li><?= $this->Html->link('Iniciar sesión', ['plugin' => null, 'controller' => 'Users', 'action' => 'login'], ['class' => 'text-dark', 'aria-current' => 'page']) ?></li>
            <?php endif; ?>
          </ul>
        </div>
      </div>
  </nav>
</header>