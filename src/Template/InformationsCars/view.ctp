<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\InformationsCar $informationsCar
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Informations Car'), ['action' => 'edit', $informationsCar->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Informations Car'), ['action' => 'delete', $informationsCar->id], ['confirm' => __('Are you sure you want to delete # {0}?', $informationsCar->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Informations Cars'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Informations Car'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cars'), ['controller' => 'Cars', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Car'), ['controller' => 'Cars', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Informations'), ['controller' => 'Informations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Information'), ['controller' => 'Informations', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="informationsCars view large-9 medium-8 columns content">
    <h3><?= h($informationsCar->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($informationsCar->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Car Id') ?></th>
            <td><?= $this->Number->format($informationsCar->car_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Information Id') ?></th>
            <td><?= $this->Number->format($informationsCar->information_id) ?></td>
        </tr>
    </table>
</div>
