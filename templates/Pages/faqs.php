<main class="preguntas-frecuentes">
    <div class="container d-flex align-items-center flex-column">
        <h2 class="mt-4">Preguntas frecuentes</h2>
        <div class="row justify-content-center mt-5 gap-3">
            <div class="col-12 col-md-4 card text-bg-dark mb-3">
                <div class="card-body">
                    <h5 class="card-title mb-3">¿Cómo puedo escribir una reseña?</h5>
                    <p class="card-text">Para escribir una reseña, simplemente inicia sesión en tu cuenta, busca la cerveza que deseas reseñar y haz clic en el botón "Escribir reseña". Luego, podrás compartir tu opinión sobre la cerveza y ayudar a otros usuarios a tomar decisiones informadas.</p>
                </div>
            </div>
            <div class="col-12 col-md-4 card text-bg-dark mb-3" >
                <div class="card-body">
                    <h5 class="card-title mb-3">¿Cómo puedo agregar una nueva cerveza a la aplicación?</h5>
                    <p class="card-text">En este momento, solo los administradores pueden agregar nuevas cervezas a la aplicación. Si deseas sugerir una nueva cerveza, contáctanos y estaremos encantados de revisar tu solicitud.</p>
                </div>
            </div>
            <div class="col-12 col-md-4 card text-bg-dark mb-3">
                <div class="card-body">
                    <h5 class="card-title mb-3">¿Cómo puedo eliminar mi cuenta?</h5>
                    <p class="card-text">Para eliminar tu cuenta, inicia sesión, ve a tu perfil y busca la opción "Eliminar cuenta". Ten en cuenta que esta acción es irreversible y eliminará permanentemente todos tus datos y reseñas de la aplicación.</p>
                </div>
            </div>
            <div class="col-12 col-md-4 card text-bg-dark mb-3">
                <div class="card-body">
                    <h5 class="card-title mb-3">¿Cómo puedo contactar al equipo de soporte?</h5>
                    <p class="card-text">Si tienes alguna pregunta, sugerencia o problema técnico, no dudes en ponerte en contacto con nuestro equipo de soporte. Puedes enviarnos un correo electrónico a manuelmaldonado930329@gmail.com o utilizar el formulario de contacto en nuestra página web.</p>
                </div>
            </div>
            <div class="col-12 col-md-5 card text-bg-dark mb-3">
                <div class="card-body">
                    <h5 class="card-title mb-3">¿Listo para comenzar?</h5>
                    <p class="card-text">¡Únete a nuestra comunidad de amantes de la cerveza y empieza a disfrutar de todas estas increíbles funcionalidades!</p>
                    <?php echo $this->Html->link('Regístrate ahora', ['controller' => 'Users', 'action' => 'add', 'plugin' => null, '?' => []], ['class' => 'btn btn-primary']); ?>
                </div>
            </div>
        </div>
    </div>
</main>