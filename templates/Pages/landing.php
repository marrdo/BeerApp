<main class="landing">
    <section id="hero">
        <div class="container-fluid">
            <div class="grid">
                <?php for ($i = 1; $i <= 12; $i++) { ?>
                    <div class="item item<?= $i ?> d-none d-xl-block ">
                        <figure role="presentation">
                            <picture>
                                <?= $this->Html->image('landing_page/mural/beer-' . $i . '.jpg', ['alt' => 'Imagen de mural ' . $i]); ?>
                            </picture>
                        </figure>
                    </div>
                <?php } ?>
                <div class="center-message">
                    <h1>BeerApp</h1>
                    <h2><?= $this->Html->link('Descubre', ['plugin' => null, 'controller' => 'Cervezas', 'action' => 'index'],  ['class' => 'text-secondary']); ?>,
                        <?= $this->Html->link('valora', ['plugin' => null, 'controller' => 'Resenas', 'action' => 'index'],  ['class' => 'text-secondary']); ?> y
                        compra tus cervezas favoritas</h2>
                </div>
            </div>
        </div>
    </section>
    <section id="presentation" class="py-3">
        <div class="container">
            <div class="row">
                <article class="col-md-6 d-md-flex flex-column">
                    <h5 class="mt-md-5 text-secondary">BeerApp</h5>
                    <p> Es tu plataforma en línea para <u>descubrir</u>, <u>valorar</u> y <u>comprar</u> las mejores cervezas. Únete a una comunidad de amantes de la cerveza, comparte tus opiniones y descubre nuevas cervezas de todo el mundo</h5>
                    <h4 class="my-md-auto">¡
                        <?= $this->Html->link('Únete a la comunidad de BeerApp', ['plugin' => null, 'controller' => 'Users', 'action' => 'add'], ['class' => 'text-secondary']); ?> y comienza tu aventura cervecera hoy mismo!</h4>
                </article>
                <div class="col-md-6 mt-md-5 carousel carousel-landing">
                    <?php for ($i = 1; $i <= 3; $i++) : ?>
                        <figure role="presentation" class="m-5 m-xl-0">
                            <?= $this->Html->image(
                                'landing_page/img-' . $i . '.webp',
                                ['alt' => 'Imagen ' . $i]
                            ) ?>
                            <figcaption class="my-3">
                                <?php
                                if ($i == 1) {
                                    echo '<span class="h6">Descubre</span>: Explora una amplia variedad de cervezas de diferentes estilos y países. Encuentra nuevas cervezas para probar y añadir a tu lista de favoritos.';
                                } elseif ($i == 2) {
                                    echo '<span class="h6">Valora</span>: Comparte tus opiniones y valoraciones sobre las cervezas que pruebas. Ayuda a otros usuarios a encontrar las mejores cervezas según sus preferencias.';
                                } else {
                                    echo '<span class="h6">Compra</span>: Próximamente, podrás comprar tus cervezas favoritas directamente desde BeerApp. Explora nuestra tienda online y encuentra las mejores ofertas en cervezas artesanales y de importación.';
                                }    ?>
                            </figcaption>
                        </figure>
                    <?php endfor; ?>
                </div>
            </div>
        </div>
    </section>
    <section id="info-tienda" class="">
        <div class="container">
            <div class="row">
                <figure class="col-md-6 " role="presentation">
                    <?= $this->Html->image(
                        'landing_page/beer-shop.webp',
                        [
                            'alt' => 'Logo modificado de BeerApp',
                            'url' => [
                                'plugin' => null,
                                'controller' => 'Pages',
                                'action' => 'home'
                            ],
                            'class' => ''
                        ]
                    ); ?>
                </figure>
                <article class="col-md-6 d-flex flex-column">
                    <h6 class="text-secondary mt-auto"><u>¡Próximamente!</u></h6>
                    <p class="mb-auto">Descubre un mundo de sabores con nuestra selección de cervezas artesanales e internacionales.<wbr> Desde las clásicas hasta las más exclusivas, encuentra tu cerveza perfecta y déjate sorprender por nuevos sabores.<wbr> Próximamente podrás disfrutar de nuestra tienda online, donde encontrarás la mejor selección de cervezas para todos los gustos.</p>
                </article>
            </div>
        </div>
    </section>
</main>

<script>
    $('.carousel-landing').slick({
        dots: false,
        arrows: false,
        infinite: true,
        speed: 900,
        fade: true,
        cssEase: 'linear',
        autoplay: true,
        autoplaySpeed: 8000,
        mobileFirst: true,
    });
</script>
