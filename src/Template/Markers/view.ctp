<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Marker $marker
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Marker'), ['action' => 'edit', $marker->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Marker'), ['action' => 'delete', $marker->id], ['confirm' => __('Are you sure you want to delete # {0}?', $marker->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Markers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Marker'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="markers view large-9 medium-8 columns content">
    <h3><?= h($marker->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($marker->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address') ?></th>
            <td><?= h($marker->address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($marker->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lat') ?></th>
            <td><?= $this->Number->format($marker->lat) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lng') ?></th>
            <td><?= $this->Number->format($marker->lng) ?></td>
        </tr>
    </table>
</div>
