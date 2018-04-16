<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BookInventory $bookInventory
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $bookInventory->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $bookInventory->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Book Inventories'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Books'), ['controller' => 'Books', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Book'), ['controller' => 'Books', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Locations'), ['controller' => 'Locations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Location'), ['controller' => 'Locations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Loans'), ['controller' => 'Loans', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Loan'), ['controller' => 'Loans', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="bookInventories form large-9 medium-8 columns content">
    <?= $this->Form->create($bookInventory) ?>
    <fieldset>
        <legend><?= __('Edit Book Inventory') ?></legend>
        <?php
            echo $this->Form->control('book_id', ['options' => $books]);
            echo $this->Form->control('available');
            echo $this->Form->control('location_id', ['options' => $locations]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
