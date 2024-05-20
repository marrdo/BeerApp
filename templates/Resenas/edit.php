<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Resena $resena
 * @var string[]|\Cake\Collection\CollectionInterface $users
 * @var string[]|\Cake\Collection\CollectionInterface $cervezas
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $resena->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $resena->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Resenas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="resenas form content">
            <?= $this->Form->create($resena) ?>
            <fieldset>
                <legend><?= __('Edit Resena') ?></legend>
                <?php
                    echo $this->Form->control('ref');
                    echo $this->Form->control('slug');
                    echo $this->Form->control('calificacion');
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('cerveza_id', ['options' => $cervezas]);
                    echo $this->Form->control('comentario');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
