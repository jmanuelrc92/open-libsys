<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BookInventory $bookInventory
 */
?>
<header class="content-header">
	<h1>Book inventory</h1>
	<?php
	   $this->Breadcrumbs->add('Inventory', ['controller' => 'book_inventories', 'action' => 'index'], ['templateVars' => ['icon' => '<i class="fa fa-dashboard" aria-hidden="true"></i>']]);
	   $this->Breadcrumbs->add('View');
	   $this->Breadcrumbs->templates($breadcrumbsTemplates);
	   echo $this->Breadcrumbs->render(['class' => 'breadcrumb']);
	?>
</header>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">Book information</h3>
				</div>
				<div class="box-body">
					<dl class="dl-horizontal">
						<dt>Title:</dt>
						<dd><?= $bookInventory->book->title?></dd>
						<dt>Author:</dt>
						<dd><?= $bookInventory->book->author->person->formal_name?></dd>
						<dt>Location code:</dt>
						<dd><?= $bookInventory->location->location_code?></dd>
						<dt>Last update:</dt>
						<dd><?= $bookInventory->modified?></dd>
						<dt>Available:</dt>
						<dd><?= $bookInventory->available ? __('Yes') : __('No')?></dd>
					</dl>
				</div>
			</div>
		</div>
	</div>
</section>
