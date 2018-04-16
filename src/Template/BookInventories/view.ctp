<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BookInventory $bookInventory
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Book Inventory'), ['action' => 'edit', $bookInventory->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Book Inventory'), ['action' => 'delete', $bookInventory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bookInventory->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Book Inventories'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Book Inventory'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Books'), ['controller' => 'Books', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Book'), ['controller' => 'Books', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Locations'), ['controller' => 'Locations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Location'), ['controller' => 'Locations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Loans'), ['controller' => 'Loans', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Loan'), ['controller' => 'Loans', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="bookInventories view large-9 medium-8 columns content">
    <h3><?= h($bookInventory->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= h($bookInventory->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Book') ?></th>
            <td><?= $bookInventory->has('book') ? $this->Html->link($bookInventory->book->title, ['controller' => 'Books', 'action' => 'view', $bookInventory->book->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Location') ?></th>
            <td><?= $bookInventory->has('location') ? $this->Html->link($bookInventory->location->id, ['controller' => 'Locations', 'action' => 'view', $bookInventory->location->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($bookInventory->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($bookInventory->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Available') ?></th>
            <td><?= $bookInventory->available ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Loans') ?></h4>
        <?php if (!empty($bookInventory->loans)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Book Inventory Id') ?></th>
                <th scope="col"><?= __('Loan Date Start') ?></th>
                <th scope="col"><?= __('Loan Date End') ?></th>
                <th scope="col"><?= __('Active Loan') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($bookInventory->loans as $loans): ?>
            <tr>
                <td><?= h($loans->id) ?></td>
                <td><?= h($loans->user_id) ?></td>
                <td><?= h($loans->book_inventory_id) ?></td>
                <td><?= h($loans->loan_date_start) ?></td>
                <td><?= h($loans->loan_date_end) ?></td>
                <td><?= h($loans->active_loan) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Loans', 'action' => 'view', $loans->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Loans', 'action' => 'edit', $loans->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Loans', 'action' => 'delete', $loans->id], ['confirm' => __('Are you sure you want to delete # {0}?', $loans->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
