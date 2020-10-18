<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\InformationsCar[]|\Cake\Collection\CollectionInterface $informationsCars
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Informations Car'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Cars'), ['controller' => 'Cars', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Car'), ['controller' => 'Cars', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Informations'), ['controller' => 'Informations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Information'), ['controller' => 'Informations', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="informationsCars index large-9 medium-8 columns content">
    <h3><?= __('Informations Cars') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cars_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('informations_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($informationsCars as $informationsCar): ?>
            <tr>
                <td><?= $this->Number->format($informationsCar->id) ?></td>
                <td><?= $informationsCar->has('car') ? $this->Html->link($informationsCar->car->id, ['controller' => 'Cars', 'action' => 'view', $informationsCar->car->id]) : '' ?></td>
                <td><?= $informationsCar->has('information') ? $this->Html->link($informationsCar->information->name, ['controller' => 'Informations', 'action' => 'view', $informationsCar->information->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $informationsCar->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $informationsCar->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $informationsCar->id], ['confirm' => __('Are you sure you want to delete # {0}?', $informationsCar->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
