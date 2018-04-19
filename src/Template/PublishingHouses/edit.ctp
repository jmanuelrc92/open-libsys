<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PublishingHouse $publishingHouse
 */
?>
<div class="publishingHouses form large-9 medium-8 columns content">
    <?= $this->Form->create($publishingHouse) ?>
    <fieldset>
        <legend><?= __('Edit Publishing House') ?></legend>
        <?php
            echo $this->Form->control('publishing_house_name');
            echo $this->Form->control('authors._ids', ['options' => $authors]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
