<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Location[]|\Cake\Collection\CollectionInterface $locations
 */
?>
<header class="content-header">
	<h1>Locations</h1>
	breadcrumb
</header>
<section class="content table-responsive">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-body">
					<table cellpadding="0" cellspacing="0"
						class="table table-condensed">
						<thead>
							<tr>
								<th scope="col"><?= $this->Paginator->sort('id') ?></th>
								<th scope="col"><?= $this->Paginator->sort('location_name') ?></th>
								<th scope="col"><?= $this->Paginator->sort('location_code') ?></th>
								<th scope="col"><?= $this->Paginator->sort('created') ?></th>
								<th scope="col"><?= $this->Paginator->sort('modified') ?></th>
								<th scope="col" class="actions"><?= __('Actions') ?></th>
							</tr>
						</thead>
						<tbody>
                <?php foreach ($locations as $location): ?>
            <tr>
								<td><?= $this->Number->format($location->id) ?></td>
								<td><?= h($location->location_name) ?></td>
								<td><?= h($location->location_code) ?></td>
								<td><?= h($location->created) ?></td>
								<td><?= h($location->modified) ?></td>
								<td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $location->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $location->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $location->id], ['confirm' => __('Are you sure you want to delete # {0}?', $location->id)]) ?>
                </td>
							</tr>
            <?php endforeach; ?>
            </tbody>
					</table>
					<div class="box-footer">
						<div class="paginator">
							<ul class="pagination">
                <?= $this->Paginator->first('<< ' . __('first')) ?>
                <?= $this->Paginator->prev('< ' . __('previous')) ?>
                <?= $this->Paginator->numbers() ?>
                <?= $this->Paginator->next(__('next') . ' >') ?>
                <?= $this->Paginator->last(__('last') . ' >>') ?>
            </ul>
						</div>
						<p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>