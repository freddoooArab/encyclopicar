<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\InformationsCar $informationsCar
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $informationsCar->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $informationsCar->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Informations Cars'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Cars'), ['controller' => 'Cars', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Car'), ['controller' => 'Cars', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Informations'), ['controller' => 'Informations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Information'), ['controller' => 'Informations', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="informationsCars form large-9 medium-8 columns content">
    <?= $this->Form->create($informationsCar) ?>
    <fieldset>
        <legend><?= __('Edit Informations Car') ?></legend>
        <?php
            echo $this->Form->control('car_id');
            echo $this->Form->control('information_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
