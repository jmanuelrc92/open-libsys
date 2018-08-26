<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PublishingHouse[]|\Cake\Collection\CollectionInterface $publishingHouses
 */
?>
<header class="content-header">
	<h1>Publishing Houses</h1>
	<?php
	   $this->Breadcrumbs->add('Publishing house', ['controller' => 'publishing_houses', 'action' => 'index'], ['templateVars' => ['icon' => '<i class="fa fa-dashboard" aria-hidden="true"></i>']]);
	   $this->Breadcrumbs->setTemplates($breadcrumbsTemplates);
	   echo $this->Breadcrumbs->render(['class' => 'breadcrumb']);
	?>
</header>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<?= $this->Html->link('<i class="fa fa-user-plus" aria-hidden="true"></i>', ['controller' => 'publishing_houses', 'action' => 'add'], ['class' => 'btn btn-success btn-sm', 'escape' => false, 'title' => 'Add publishing house'])?>
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
                                <th scope="col"><?= $this->Paginator->sort('publishing_house_name', 'Publishing House') ?></th>
                                <th scope="col" class="actions"><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($publishingHouses as $publishingHouse): ?>
                            <tr>
                                <td><?= h($publishingHouse->publishing_house_name) ?></td>
                                <td class="actions">
                                	<?= $this->Html->link(__('View'), ['action' => 'view', $publishingHouse->id], ['class' => 'btn btn-primary btn-xs']) ?>
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