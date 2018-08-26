<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BookInventory $bookInventory
 */
$this->Form->setTemplates($formTemplates);
?>
<header class="content-header">
	<h1>Book inventory</h1>
	<?php
    	$this->Breadcrumbs->add('Book inventory', ['controller' => 'book_inventories', 'action' => 'index'], ['templateVars' => ['icon' => '<i class="fa fa-dashboard" aria-hidden="true"></i>']]);
    	$this->Breadcrumbs->add('New');
    	$this->Breadcrumbs->setTemplates($breadcrumbsTemplates);
    	echo $this->Breadcrumbs->render(['class' => 'breadcrumb']);
	?>
</header>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-body">
					<?= $this->Form->create($bookInventory) ?>
        				<?php
                            echo $this->Form->control('book_id', [
                                'class' => 'form-control',
                                'empty' => 'Choose a book',
                                'options' => $books
                            ]);
                            echo $this->Form->control('location_id', [
                                'class' => 'form-control',
                                'empty' => 'Choose a location',
                                'options' => $locations
                            ]);
                        ?>
                    	<?= $this->Form->button('Save', ['class' => 'btn btn-success'])?>
                    	<?= $this->Html->link('Cancel', ['controller' => 'book_inventories', 'action' => 'index'], ['class' => 'btn btn-default'])?>
					<?= $this->Form->end()?>
					</div>
			</div>
		</div>
	</div>
</section>