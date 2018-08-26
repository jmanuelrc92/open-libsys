<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Book $book
 */
$this->Form->setTemplates($formTemplates);
?>
<header class="content-header">
	<h1>Books</h1>
	<?php
    	$this->Breadcrumbs->add('Books', ['controller' => 'books', 'action' => 'index'], ['templateVars' => ['icon' => '<i class="fa fa-dashboard" aria-hidden="true"></i>']]);
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
					<?= $this->Form->create($book)?>
        				<?php
                            echo $this->Form->control('title', [
                                'class' => 'form-control',
                                'placeholder' => 'Bram Stoker\'s Dracula'
                            ]);
                            echo $this->Form->control('isbn_code', [
                                'class' => 'form-control',
                                'placeholder' => 'type the isbn code here'
                            ]);
                            echo $this->Form->control('description', [
                                'placeholder' => 'enter a little description of the book',
                                'class' => 'form-control'
                            ]);
                            echo $this->Form->control('publishing_house_id', [
                                'options' => $publishingHouses,
                                'class' => 'form-control',
                                'empty' => 'Choose a publisher'
                            ]);
                            echo $this->Form->control('author_id', [
                                'options' => $authors,
                                'class' => 'form-control',
                                'empty' => 'Choose an author'
                            ]);
                        ?>
                    	<?= $this->Form->button('Save', ['class' => 'btn btn-success'])?>
                    	<?= $this->Html->link('Cancel', ['controller' => 'books', 'action' => 'index'], ['class' => 'btn btn-default'])?>
					<?= $this->Form->end()?>
					</div>
			</div>
		</div>
	</div>
</section>