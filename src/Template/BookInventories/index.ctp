<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BookInventory[]|\Cake\Collection\CollectionInterface $bookInventories
 */
?>
<header class="content-header">
	<h1>Book inventory</h1>
	<?php
$this->Breadcrumbs->add('Book iventory', [
    'controller' => 'book_inventories',
    'action' => 'index'
], [
    'templateVars' => [
        'icon' => '<i class="fa fa-dashboard" aria-hidden="true"></i>'
    ]
]);
$this->Breadcrumbs->templates($breadcrumbsTemplates);
echo $this->Breadcrumbs->render([
    'class' => 'breadcrumb'
]);
?>
</header>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<?= $this->Html->link('<i class="fa fa-user-plus" aria-hidden="true"></i>', ['controller' => 'book_inventories', 'action' => 'add'], ['class' => 'btn btn-success btn-sm', 'escape' => false, 'title' => 'Add inventory'])?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<br />
			<div class="box box-primary">
				<div class="box-body table-responsive">
					<table class="table table-condensed">
						<thead>
							<tr>
								<th scope="col"><?= $this->Paginator->sort('book.title') ?></th>
								<th scope="col"><?= $this->Paginator->sort('serial') ?></th>
								<th scope="col"><?= $this->Paginator->sort('available') ?></th>
								<th scope="col"><?= $this->Paginator->sort('location.location_code') ?></th>
								<th scope="col"><?= $this->Paginator->sort('location.location_name') ?></th>
								<th scope="col"><?= $this->Paginator->sort('modified', 'Last update') ?></th>
								<th scope="col" class="actions"><?= __('Actions') ?></th>
							</tr>
						</thead>
						<tbody>
                            <?php foreach ($bookInventories as $bookInventory): ?>
                            <tr>
								<td><?= h($bookInventory->book->title) ?></td>
								<td><?= h($bookInventory->serial) ?></td>
								<td><?= ($bookInventory->available > 0)? 'Yes':'No' ?></td>
								<td><?= h($bookInventory->location->location_code) ?></td>
								<td><?= h($bookInventory->location->location_name) ?></td>
								<td><?= h($bookInventory->modified) ?></td>
								<td class="actions">
                                    <?= $this->Html->link(__('View'), ['action' => 'view', $bookInventory->id], ['class' => 'btn btn-primary btn-xs']) ?>
                                </td>
							</tr>
                            <?php endforeach; ?>
                        </tbody>
					</table>
				</div>
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
</section>