<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cerveza $cerveza
 */
?>
<main class="Cervezas-view">
    <section class="container">
        <div class="row">
            <aside class="col col-sm-4">
                <div class="side-nav d-flex flex-column">
                    <h4 class="heading"><?= __('Actions') ?></h4>
                    <?= $this->Html->link(__('Actualizar cerveza'), ['action' => 'edit', $cerveza->id], ['class' => 'side-nav-item text-dark']) ?>
                    <?= $this->Form->postLink(__('Eliminar cerveza'), ['action' => 'delete', $cerveza->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cerveza->id), 'class' => 'side-nav-item text-dark']) ?>
                    <?= $this->Html->link(__('Ver todas las cervezas'), ['action' => 'index'], ['class' => 'side-nav-item text-dark']) ?>
                    <?= $this->Html->link(__('Añadir cervezas'), ['action' => 'add'], ['class' => 'side-nav-item text-dark']) ?>
                </div>
            </aside>
            <div class="col col-sm-8">
                <div class="cervezas view content">
                    <h3><?= ucfirst(h($cerveza->nombre)) ?></h3>
                    <div class="table-responsive">
                        <table class="table table-primary table-striped table-hover table-borderless>
                            <?= $isAdmin ? '<tr scope="row">
                                <th>' . __('Id') . '</th>
                                <td>' . h($cerveza->id) . '</td>
                            </tr>' : ''; ?>
                            <tr scope=" row">
                            <th><?= __('Ref') ?></th>
                            <td><?= h($cerveza->ref) ?></td>
                            </tr>
                            <?= $isAdmin ? '<tr scope="row">
                                <th>' . __('Slug') . '</th>
                                <td>' . h($cerveza->slug) . '</td>
                            </tr>' : ''; ?>
                            <tr scope="row">
                                <th><?= __('Nombre') ?></th>
                                <td><?= ucfirst(h($cerveza->nombre)) ?></td>
                            </tr>
                            <tr scope="row">
                                <th><?= __('Tipo') ?></th>
                                <td><?= ucfirst(h($cerveza->tipo)) ?></td>
                            </tr>
                            <tr scope="row">
                                <th><?= __('Color') ?></th>
                                <td><?= ucfirst(h($cerveza->color)) ?></td>
                            </tr>
                            <tr scope="row">
                                <th><?= __('Origen') ?></th>
                                <td><?= ucfirst(h($cerveza->origen)) ?></td>
                            </tr>
                            <tr scope="row">
                                <th><?= __('Familia Estilos') ?></th>
                                <td><?= h($cerveza->familia_estilos) ?></td>
                            </tr>
                            <tr scope="row">
                                <th><?= __('Sabor Dominante') ?></th>
                                <td><?= ucfirst(h($cerveza->sabor_dominante)) ?></td>
                            </tr>
                            <tr scope="row">
                                <th><?= __('Precio') ?></th>
                                <td><?= $cerveza->precio === null ? '' : $this->Number->currency($cerveza->precio) ?></td>
                            </tr>
                            <tr scope="row">
                                <th><?= __('Stock') ?></th>
                                <td><?= $cerveza->stock === null ? '' : $this->Number->format($cerveza->stock) ?></td>
                            </tr>
                            <tr scope="row">
                                <th><?= __('Media Valoracion') ?></th>
                                <td><?= $cerveza->media_valoracion === null ? '' : $this->Number->precision($cerveza->media_valoracion) ?></td>
                            </tr>
                            <tr scope="row">
                                <th><?= __('Ibu') ?></th>
                                <td><?= $cerveza->ibu === null ? '' : $this->Number->format($cerveza->ibu) ?></td>
                            </tr>
                            <tr scope="row">
                                <th><?= __('Grados Alcohol') ?></th>
                                <td><?= $cerveza->grados_alcohol === null ? '' : $this->Number->toPercentage($cerveza->grados_alcohol) ?></td>
                            </tr>
                        </table>
                        <div class="text">
                            <strong><?= __('Descripcion') ?></strong>
                            <blockquote>
                                <?= $this->Text->autoParagraph(h($cerveza->descripcion)); ?>
                            </blockquote>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div >
            <div>
                <div class="row">
                    <h4 class="col-12"><?= __('Añadir Reseña') ?></h4>

                    <div class="col-12 col-sm-4 form-floating">
                        <input type="number" class="form-control" id="valoracion" placeholder="name@example.com" value="test@example.com">
                        <label for="valoracion" style="max-width: 25ch;">Valoración</label>

                    </div>

                    <div class="col-12 col-sm-8 form-floating">
                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                        <label for="floatingTextarea">Comments</label>
                    </div>
                    <?= $this->Form->button('Enviar reseña', ['class' => 'btn btn-secondary', 'id' => 'Eresena']); ?>
                </div>
            </div>
            <h4><?= __('Reseñas') ?></h4>
            <div id="resenas">

            </div>
        </div>
        </div>
    </section>
</main>

<script>
document.querySelector('#Eresena').addEventListener('click', ()=>{
    let val = document.querySelector('#valoracion').value;
    let coment = document.querySelector('#floatingTextarea').value;

    fetch
})
</script>