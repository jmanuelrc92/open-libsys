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
	   $this->Breadcrumbs->setTemplates($breadcrumbsTemplates);
	   echo $this->Breadcrumbs->render(['class' => 'breadcrumb']);
	?>
</header>
<section class="content">
	<div class="row">
		<div class="col-md-6">
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">User info</h3>
				</div>
				<div class="box-body">
					<dl class="dl-horizontal">
						<dt>Username:</dt>
						<dd><?= $user->username?></dd>
						<dt>Member since:</dt>
						<dd><?= $user->created?></dd>
						<dt>Role:</dt>
						<dd><?= $user->role->role_name?></dd>
					</dl>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">Author info</h3>
				</div>
				<div class="box-body">
					<dl class="dl-horizontal">
						<dt>Name:</dt>
						<dd><?= $user->person->informal_name?></dd>
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
								<th>Loan start</th>
								<th>Loan end</th>
								<th>Active</th>
								<th>Expired</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							<?php if (!empty($user->loans)): ?>
								<?php foreach ($user->loans as $loan): ?>
                                <tr>
                                    <td><?= h($loan->loan_date_start) ?></td>
                                    <td><?= h($loan->loan_date_end) ?></td>
                                    <td><?= ($loan->active_loan) ? 'Yes':'No' ?></td>
                                    <td><?= ($loan->expired_loan) ? 'Yes':'No' ?></td>
                                    <td class="actions">
                                        <?= $this->Html->link(__('View'), ['controller' => 'loans', 'action' => 'view', $loan->id], ['class' => 'btn btn-primary btn-xs']) ?>
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