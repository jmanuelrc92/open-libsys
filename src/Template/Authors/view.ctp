<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Author $author
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Author'), ['action' => 'edit', $author->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Author'), ['action' => 'delete', $author->id], ['confirm' => __('Are you sure you want to delete # {0}?', $author->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Authors'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Author'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List People'), ['controller' => 'People', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Person'), ['controller' => 'People', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Books'), ['controller' => 'Books', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Book'), ['controller' => 'Books', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Publishing Houses'), ['controller' => 'PublishingHouses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Publishing House'), ['controller' => 'PublishingHouses', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="authors view large-9 medium-8 columns content">
    <h3><?= h($author->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Person') ?></th>
            <td><?= $author->has('person') ? $this->Html->link($author->person->id, ['controller' => 'People', 'action' => 'view', $author->person->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($author->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($author->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($author->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Books') ?></h4>
        <?php if (!empty($author->books)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Title') ?></th>
                <th scope="col"><?= __('Isbn Code') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($author->books as $books): ?>
            <tr>
                <td><?= h($books->id) ?></td>
                <td><?= h($books->title) ?></td>
                <td><?= h($books->isbn_code) ?></td>
                <td><?= h($books->description) ?></td>
                <td><?= h($books->created) ?></td>
                <td><?= h($books->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Books', 'action' => 'view', $books->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Books', 'action' => 'edit', $books->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Books', 'action' => 'delete', $books->id], ['confirm' => __('Are you sure you want to delete # {0}?', $books->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Publishing Houses') ?></h4>
        <?php if (!empty($author->publishing_houses)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Publishing House Name') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($author->publishing_houses as $publishingHouses): ?>
            <tr>
                <td><?= h($publishingHouses->id) ?></td>
                <td><?= h($publishingHouses->publishing_house_name) ?></td>
                <td><?= h($publishingHouses->created) ?></td>
                <td><?= h($publishingHouses->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'PublishingHouses', 'action' => 'view', $publishingHouses->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'PublishingHouses', 'action' => 'edit', $publishingHouses->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'PublishingHouses', 'action' => 'delete', $publishingHouses->id], ['confirm' => __('Are you sure you want to delete # {0}?', $publishingHouses->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
