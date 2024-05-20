<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cerveza $cerveza
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $cerveza->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $cerveza->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Cervezas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="cervezas form content">
            <?= $this->Form->create($cerveza) ?>
            <fieldset>
                <legend><?= __('Edit Cerveza') ?></legend>
                <?php
                    echo $this->Form->control('ref');
                    echo $this->Form->control('slug');
                    echo $this->Form->control('nombre');
                    echo $this->Form->control('descripcion');
                    echo $this->Form->control('precio');
                    echo $this->Form->control('stock');
                    echo $this->Form->control('media_valoracion');
                    echo $this->Form->control('tipo');
                    echo $this->Form->control('ibu');
                    echo $this->Form->control('grados_alcohol');
                    echo $this->Form->control('color');
                    echo $this->Form->control('origen');
                    echo $this->Form->control('familia_estilos');
                    echo $this->Form->control('sabor_dominante');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
