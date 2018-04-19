<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Loan $loan
 */
$this->Form->setTemplates($formTemplates);
?>
<header class="content-header">
	<h1>Loans</h1>
	<?php
    	$this->Breadcrumbs->add('Loans', ['controller' => 'loans', 'action' => 'index'], ['templateVars' => ['icon' => '<i class="fa fa-dashboard" aria-hidden="true"></i>']]);
    	$this->Breadcrumbs->add('New');
    	$this->Breadcrumbs->templates($breadcrumbsTemplates);
    	echo $this->Breadcrumbs->render(['class' => 'breadcrumb']);
	?>
</header>
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-body">
					<?= $this->Form->create($loan)?>
        				<?php
                            echo $this->Form->control('user_id', [
                                'class' => 'form-control',
                                'options' => $users,
                                'label' => 'User',
                                'empty' => 'Choose a user'
                            ]);
                            echo $this->Form->control('book_inventory.serial', [
                                'class' => 'form-control',
                                'type' => 'text',
                                'label' => 'Serial',
                                'placeholder' => 'Type the book serial'
                            ]);
                            echo $this->Form->control('book_inventory.book.title', [
                                'class' => 'form-control',
                                'type' => 'text',
                                'readonly' => true,
                                'label' => 'Title'
                            ]);
                            echo $this->Form->control('book_inventory.book.isbn_code', [
                                'class' => 'form-control',
                                'type' => 'text',
                                'readonly' => true,
                                'label' => 'ISBN code'
                            ]);
                            echo $this->Form->control('loan_date_end', [
                                'class' => 'form-control',
                                'type' => 'text',
                                'placeholder' => 'YYYY-MM-DD hh:mm:ss'
                            ]);
                            echo $this->Form->control('active_loan', [
                                'checked' => true,
                                'hidden' => true,
                                'label' => false
                            ]);
                        ?>
                    	<?= $this->Form->button('Save', ['class' => 'btn btn-success'])?>
                    	<?= $this->Html->link('Cancel', ['controller' => 'loans', 'action' => 'index'], ['class' => 'btn btn-default'])?>
					<?= $this->Form->end()?>
				</div>
			</div>
		</div>
	</div>
</section>