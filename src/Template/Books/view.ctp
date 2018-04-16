<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Book $book
 */
?>
<header class="content-header">
	<h1>Books</h1>
	<?php
	   $this->Breadcrumbs->add('Books', ['controller' => 'books', 'action' => 'index'], ['templateVars' => ['icon' => '<i class="fa fa-dashboard" aria-hidden="true"></i>']]);
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
					<h3 class="box-title">Book information</h3>
				</div>
				<div class="box-body">
					<dl class="dl-horizontal">
						<dt>Title:</dt>
						<dd><?= $book->title?></dd>
						<dt>ISBN code:</dt>
						<dd><?= $book->isbn_code?></dd>
						<dt>Description:</dt>
						<dd><?= $book->description?></dd>
					</dl>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">Authors</h3>
				</div>
				<div class="box-body table-responsive">
					<table class="table table-condensed">
						<thead>
							<tr>
                                <th scope="col"><?= __('Last name') ?></th>
                                <th scope="col"><?= __('Sur name') ?></th>
                                <th scope="col"><?= __('Middle name') ?></th>
                                <th scope="col"><?= __('First name') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                        	<?php foreach ($book->authors as $authors): ?>
                            <tr>
                                <td><?= h($authors->person->last_name) ?></td>
                                <td><?= h($authors->person->sur_name) ?></td>
                                <td><?= h($authors->person->middle_name) ?></td>
                                <td><?= h($authors->person->first_name) ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">Inventory</h3>
				</div>
				<div class="box-body table-responsive">
					<table class="table table-condensed">
						<thead>
							<tr>
								<th>Serial</th>
								<th>Location code</th>
								<th>Location</th>
								<th>Available</th>
								<th>Last update</th>
							</tr>
						</thead>
						<tbody>
							<?php if (!empty($book->book_inventories)): ?>
								<?php foreach ($book->book_inventories as $inventory): ?>
                                <tr>
                                    <td><?= h($inventory->serial) ?></td>
                                    <td><?= h($inventory->location->location_code) ?></td>
                                    <td><?= h($inventory->location->location_name) ?></td>
                                    <td><?= ($inventory->available > 0) ? 'Yes':'NO' ?></td>
                                    <td><?= h($inventory->modified) ?></td>
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