<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Author $author
 */
?>
<header class="content-header">
	<h1>Authors</h1>
	<?php
	   $this->Breadcrumbs->add('Authors', ['controller' => 'authors', 'action' => 'index'], ['templateVars' => ['icon' => '<i class="fa fa-dashboard" aria-hidden="true"></i>']]);
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
					<h3 class="box-title">Author info</h3>
				</div>
				<div class="box-body">
					<dl class="dl-horizontal">
						<dt>Name:</dt>
						<dd><?= $author->person->first_name?></dd>
						<dt>Last name:</dt>
						<dd><?= $author->person->last_name?></dd>
					</dl>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">Books</h3>
				</div>
				<div class="box-body table-responsive">
					<table class="table table-condensed">
						<thead>
							<tr>
								<th>ISBN</th>
								<th>Title</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							<?php if (!empty($author->books)): ?>
								<?php foreach ($author->books as $book): ?>
                                <tr>
                                    <td><?= h($book->isbn_code) ?></td>
                                    <td><?= h($book->title) ?></td>
                                    <td class="actions">
                                        <?= $this->Html->link(__('View'), ['controller' => 'books', 'action' => 'view', $book->id]) ?>
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