<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Car $car
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Car'), ['action' => 'edit', $car->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Car'), ['action' => 'delete', $car->id], ['confirm' => __('Are you sure you want to delete # {0}?', $car->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Cars'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Car'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Photos'), ['controller' => 'Photos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Photo'), ['controller' => 'Photos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Informations'), ['controller' => 'Informations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Information'), ['controller' => 'Informations', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="cars view large-9 medium-8 columns content">
    <h3><?= h($car->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $car->has('user') ? $this->Html->link($car->user->email, ['controller' => 'Users', 'action' => 'view', $car->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($car->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Brand') ?></th>
            <td><?= h($car->brand) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Model') ?></th>
            <td><?= h($car->model) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Price') ?></th>
            <td><?= $this->Number->format($car->price) ?></td>
        </tr>
    </table>
    <p><?= $this->Html->link('Edit', ['action' => 'edit', $car->slug])?></p>
    <p>
        <?php
        $this->request->session()->write('Car.id', $car->id);
        echo $this->Html->link(__('New Informations'), ['Informations', 'action' => 'add'])
        ?>
    </p>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($car->description)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Informations') ?></h4>
        <?php if (!empty($car->informations)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($car->informations as $informations): ?>
            <tr>
                <td><?= h($informations->id) ?></td>
                <td><?= h($informations->name) ?></td>
                <td><?= h($informations->description) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Informations', 'action' => 'view', $informations->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Informations', 'action' => 'edit', $informations->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Informations', 'action' => 'delete', $informations->id], ['confirm' => __('Are you sure you want to delete # {0}?', $informations->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Photos') ?></h4>
        <?php if (!empty($car->photos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Car Id') ?></th>
                <th scope="col"><?= __('Title') ?></th>
                <th scope="col"><?= __('Filename') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($car->photos as $photos): ?>
            <tr>
                <td><?= h($photos->id) ?></td>
                <td><?= h($photos->car_id) ?></td>
                <td><?= h($photos->title) ?></td>
                <td><?= h($photos->filename) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Photos', 'action' => 'view', $photos->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Photos', 'action' => 'edit', $photos->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Photos', 'action' => 'delete', $photos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $photos->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
