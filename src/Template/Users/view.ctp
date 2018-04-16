<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<header class="content-header">
	<h1>Users</h1>
	<?php
	   $this->Breadcrumbs->add('Users', ['controller' => 'users', 'action' => 'index'], ['templateVars' => ['icon' => '<i class="fa fa-dashboard" aria-hidden="true"></i>']]);
	   $this->Breadcrumbs->add('View');
	   $this->Breadcrumbs->templates($breadcrumbsTemplates);
	   echo $this->Breadcrumbs->render(['class' => 'breadcrumb']);
	?>
</header>
<section class="content">
	<div class="row">
		<div class="col-md-6">
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">User information</h3>
				</div>
				<div class="box-body">
					<dl class="dl-horizontal">
						<dt>Username:</dt>
						<dd><?= $user->username?></dd>
						<dt>Rol:</dt>
						<dd><?= $user->role->role_name?></dd>
						<dt>Member since:</dt>
						<dd><?= $user->created?></dd>
					</dl>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">Personal info</h3>
				</div>
				<div class="box-body">
					<dl class="dl-horizontal">
						<dt>Name:</dt>
						<dd><?= $user->person->_getInformalName()?></dd>
					</dl>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">Recent loans</h3>
				</div>
				<div class="box-body table-responsive">
					<table class="table table-condensed">
						<thead>
							<tr>
								<th>Serial</th>
								<th>Book ID</th>
								<th>Loan date start</th>
								<th>Loan date end</th>
								<th>Finished</th>
							</tr>
						</thead>
						<tbody>
							<?php if (!empty($user->loans)): ?>
								<?php foreach ($user->loans as $loans): ?>
                                <tr>
                                    <td><?= h($loans->id) ?></td>
                                    <td><?= h($loans->book_inventory_id) ?></td>
                                    <td><?= h($loans->loan_date_start) ?></td>
                                    <td><?= h($loans->loan_date_end) ?></td>
                                    <td><?= h($loans->active_loan) ?></td>
                                    <td class="actions">
                                        <?= $this->Html->link(__('View'), ['controller' => 'Loans', 'action' => 'view', $loans->id]) ?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
							<?php endif;?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>