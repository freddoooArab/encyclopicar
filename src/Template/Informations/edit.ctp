<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Information $information
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $information->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $information->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Informations'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Cars'), ['controller' => 'Cars', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Car'), ['controller' => 'Cars', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="informations form large-9 medium-8 columns content">
    <?= $this->Form->create($information) ?>
    <fieldset>
        <legend><?= __('Edit Information') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('description');
            echo $this->Form->control('cars._ids', ['options' => $cars]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
