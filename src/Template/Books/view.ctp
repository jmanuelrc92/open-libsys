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
	   $this->Breadcrumbs->setTemplates($breadcrumbsTemplates);
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
						<dt>Publisher:</dt>
						<dd><?= $book->publishing_house->publishing_house_name?></dd>
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
                                <th scope="col"><?= __('Author') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?= $book->author->person->formal_name ?></td>
                            </tr>
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