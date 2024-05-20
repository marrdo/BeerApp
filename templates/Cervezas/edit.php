<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cerveza $cerveza
 */
?>
<main class="Cervezas-edit">
    <section class="container">
        <div class="row">
            <aside class="col col-sm-2">
                <div class="side-nav d-flex flex-column">
                    <h5 class="heading"><?= __('Acciones') ?></h5>
                    <?= $this->Form->postLink(
                        __('Eliminar esta cerveza'),
                        ['action' => 'delete', $cerveza->id],
                        ['confirm' => __('Seguro que desea eliminar la cerveza  {0}?', $cerveza->nombre), 'class' => 'side-nav-item text-dark']
                    ) ?>
                    <?= $this->Html->link(__('Listado de cervezas'), ['action' => 'index'], ['class' => 'side-nav-item text-dark']) ?>
                </div>
            </aside>
            <div class="col col-sm-10">
                <div class="cervezas form content">
                    <?= $this->Form->create($cerveza) ?>
                    <fieldset class="row">
                        <legend><?= __('Actualizar cerveza ' . $cerveza->nombre) ?></legend>

                        <?= $isAdmin ? '<div class="col col-sm-4">' . $this->Form->control('ref', [
                            'required' => true,
                            'class' => 'form-control form-floating mb-3',
                            'type' => 'text',
                            'label' => ['text' => 'Referencia', 'class' => 'floatingInput']
                        ]) . '</div>' : ''; ?>


                        <?= $isAdmin ? '<div class="col col-sm-4">' . $this->Form->control('slug', [
                            'required' => true,
                            'class' => 'form-control form-floating mb-3',
                            'type' => 'text',
                            'label' => ['text' => 'Slug', 'class' => 'floatingInput']
                        ]) . '</div>' : '' ?>

                        <div class="col col-sm-4">
                            <?= $this->Form->control('nombre', [
                                'required' => true,
                                'class' => 'form-control form-floating mb-3',
                                'type' => 'text',
                                'label' => ['text' => 'Nombre', 'class' => 'floatingInput']
                            ]) ?>
                        </div>

                        <div class="col col-sm-4">
                            <?= $this->Form->control('precio', [
                                'class' => 'form-control form-floating mb-3',
                                'type' => 'number',
                                'label' => ['text' => 'Precio', 'class' => 'floatingInput']
                            ]) ?>
                        </div>

                        <div class="col col-sm-4">
                            <?= $this->Form->control('stock', [
                                'class' => 'form-control form-floating mb-3',
                                'type' => 'number',
                                'label' => ['text' => 'Stock', 'class' => 'floatingInput']
                            ]) ?>
                        </div>

                        <div class="col col-sm-4">
                            <?= $this->Form->control('media_valoracion', [
                                'class' => 'form-control form-floating mb-3',
                                'type' => 'number',
                                'label' => ['text' => 'Media Valoración', 'class' => 'floatingInput']
                            ]) ?>
                        </div>

                        <div class="col col-sm-4">
                            <?= $this->Form->control('tipo', [
                                'class' => 'form-control form-floating mb-3',
                                'type' => 'select',
                                'label' => ['text' => 'Tipos de fermentación', 'class' => 'floatingInput'],
                                'options' => $tipos,
                                'empty' => 'Selecciona una región'
                            ]) ?>
                        </div>

                        <div class="col col-sm-4">
                            <?= $this->Form->control('ibu', [
                                'class' => 'form-control form-floating mb-3',
                                'type' => 'number',
                                'label' => ['text' => 'IBU', 'class' => 'floatingInput'],
                                'max' => '100',
                                'default' => '1',
                                'min' => '1'
                            ]) ?>
                        </div>

                        <div class="col col-sm-4">
                            <?= $this->Form->control('grados_alcohol', [
                                'class' => 'form-control form-floating mb-3',
                                'type' => 'number',
                                'label' => ['text' => 'Grados de alcohol (%)', 'class' => 'floatingInput'],
                                'empty' => '5.0%'
                            ]) ?>
                        </div>

                        <div class="col col-sm-4">
                            <?= $this->Form->control('color', [
                                'class' => 'form-control form-floating mb-3',
                                'type' => 'select',
                                'label' => ['text' => 'Color', 'class' => 'floatingInput'],
                                'options' => $colores,
                                'empty' => 'Selecciona un color'
                            ]) ?>
                        </div>

                        <div class="col col-sm-8">
                            <?= $this->Form->control('origen', [
                                'class' => 'form-control form-floating mb-3',
                                'type' => 'select',
                                'label' => ['text' => 'Región de Origen', 'class' => 'floatingInput'],
                                'options' => $regionesOrigen,
                                'empty' => 'Selecciona una región'
                            ]) ?>
                        </div>

                        <div class="col col-sm-6">
                            <?= $this->Form->control('familia_estilos', [
                                'class' => 'form-control form-floating mb-3',
                                'type' => 'select',
                                'label' => ['text' => 'Familia de Estilo', 'class' => 'floatingInput'],
                                'options' => $familiasEstilos,
                                'empty' => 'Selecciona una familia de estilo'
                            ]) ?>
                        </div>

                        <div class="col col-sm-6">
                            <?= $this->Form->control('sabor_dominante', [
                                'class' => 'form-control form-floating mb-3',
                                'type' => 'select',
                                'label' => ['text' => 'Sabor', 'class' => 'floatingInput'],
                                'options' => $sabores,
                                'empty' => 'Selecciona un sabor'
                            ]) ?>
                        </div>

                        <div class="col-12">
                            <?= $this->Form->control('descripcion', [
                                'required' => true,
                                'class' => 'form-control form-floating mb-3',
                                'type' => 'textarea',
                                'label' => ['text' => 'Descripción', 'class' => 'floatingInput']
                            ]) ?>
                        </div>
                    </fieldset>
                    <?= $this->Form->button(__('Actualizar'), ['class' => 'btn btn-secondary mb-3']) ?>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </section>
</main>