<header class="content-header">
	<h1>Dashboard</h1>
	<?php
$this->Breadcrumbs->add('Dashboard', [
    'controller' => 'pages',
    'action' => 'app_home'
], [
    'templateVars' => [
        'icon' => '<i class="fa fa-dashboard" aria-hidden="true"></i>'
    ]
]);
$this->Breadcrumbs->setTemplates($breadcrumbsTemplates);
echo $this->Breadcrumbs->render([
    'class' => 'breadcrumb'
]);
?>
</header>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Expired Loans</h3>
				</div>
				<div class="box-body table-responsive">
					<table class="table table-condensed table-striped">
						<thead>
							<tr>
								<th scope="col"><?= $this->Paginator->sort('users.username') ?></th>
								<th scope="col"><?= $this->Paginator->sort('loan_date_start') ?></th>
								<th scope="col"><?= $this->Paginator->sort('loan_date_end') ?></th>
								<th scope="col" class="actions"><?= __('Actions') ?></th>
							</tr>
						</thead>
						<tbody>
                            <?php foreach ($expiredLoans as $expiredLoan): ?>
                            <tr>
								<td><?= $this->Html->link($expiredLoan->Users['username'], ['controller' => 'users', 'action' => 'view', $expiredLoan->user_id]) ?></td>
								<td><?= h($expiredLoan->loan_date_start) ?></td>
								<td><?= h($expiredLoan->loan_date_end) ?></td>
								<td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'loans', 'action' => 'view', $expiredLoan->id], ['class' => 'btn btn-primary btn-xs']) ?>
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