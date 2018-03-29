<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>
<header class="content-header">
	<h1>Users</h1>
	<?php
	   $this->Breadcrumbs->add('Users', ['controller' => 'users', 'action' => 'index'], ['templateVars' => ['icon' => '<i class="fa fa-dashboard" aria-hidden="true"></i>']]);
	   $this->Breadcrumbs->templates($breadcrumbsTemplates);
	   echo $this->Breadcrumbs->render(['class' => 'breadcrumb']);
	?>
</header>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<?= $this->Html->link('<i class="fa fa-user-plus" aria-hidden="true"></i>', ['controller' => 'users', 'action' => 'add'], ['class' => 'btn btn-success btn-sm', 'escape' => false, 'title' => 'Add user'])?>
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
								<th scope="col"><?= $this->Paginator->sort('People.last_name', 'User last name') ?></th>
								<th scope="col"><?= $this->Paginator->sort('People.first_name', 'User first name') ?></th>
								<th scope="col"><?= $this->Paginator->sort('username') ?></th>
								<th scope="col"><?= $this->Paginator->sort('created') ?></th>
								<th scope="col" class="actions"><?= __('Actions') ?></th>
							</tr>
						</thead>
						<tbody>
                            <?php foreach ($users as $user): ?>
                            <tr>
                            	<td><?= $user->has('person') ? $user->person->last_name: '' ?></td>
            					<td><?= $user->has('person') ? $user->person->first_name: '' ?></td>
            					<td><?= h($user->username) ?></td>
            					<td><?= h($user->created) ?></td>
            					<td class="actions">
            						<?= $this->Html->link(__('View'), ['action' => 'view', $user->id], ['class' => 'btn btn-primary btn-xs']) ?>
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