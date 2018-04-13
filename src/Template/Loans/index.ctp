<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Loan[]|\Cake\Collection\CollectionInterface $loans
 */
?>
<header class="content-header">
	<h1>Loans</h1>
	<?php
	   $this->Breadcrumbs->add('Loans', ['controller' => 'loans', 'action' => 'index'], ['templateVars' => ['icon' => '<i class="fa fa-dashboard" aria-hidden="true"></i>']]);
	   $this->Breadcrumbs->templates($breadcrumbsTemplates);
	   echo $this->Breadcrumbs->render(['class' => 'breadcrumb']);
	?>
</header>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<?= $this->Html->link('<i class="fa fa-user-plus" aria-hidden="true"></i>', ['controller' => 'loans', 'action' => 'add'], ['class' => 'btn btn-success btn-sm', 'escape' => false, 'title' => 'Add loan'])?>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-12">
		<br />
			<div class="box box-primary">
				<div class="box-body table-resonsive">
					<table class="table table-condensed">
                        <thead>
                            <tr>
                                <th scope="col"><?= $this->Paginator->sort('Users.username', 'Username') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('BookInventories.serial', 'Book serial') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('loan_date_start') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('loan_date_end') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('active_loan') ?></th>
                                <th scope="col" class="actions"><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($loans as $loan): ?>
                            <tr>
                                <td><?= $loan->has('user') ? $this->Html->link($loan->user->username, ['controller' => 'Users', 'action' => 'view', $loan->user->id]) : '' ?></td>
                                <td><?= $loan->has('book_inventory') ? $this->Html->link($loan->book_inventory->serial, ['controller' => 'BookInventories', 'action' => 'view', $loan->book_inventory->id]) : '' ?></td>
                                <td><?= h($loan->loan_date_start) ?></td>
                                <td><?= h($loan->loan_date_end) ?></td>
                                <td><?= ($loan->active_loan) ? 'Yes':'NO' ?></td>
                                <td class="actions">
                                    <?= $this->Html->link(__('View'), ['action' => 'view', $loan->id], ['class' => 'btn btn-primary btn-xs']) ?>
                                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $loan->id], ['class' => 'btn btn-warning btn-xs']) ?>
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