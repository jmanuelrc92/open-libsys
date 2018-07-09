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
    	$this->Breadcrumbs->add('Edit');
    	$this->Breadcrumbs->templates($breadcrumbsTemplates);
    	echo $this->Breadcrumbs->render(['class' => 'breadcrumb']);
	?>
</header>
<section class="content">
	<div class="row">
		<?= $this->Form->create($loan)?>
		<div class="col-md-3">
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">Loan information</h3>
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse">
							<i class="fa fa-minus"></i>
						</button>
					</div>
				</div>
				<div class="box-body">
        				<?php
                            echo $this->Form->control('user_id', [
                                'class' => 'form-control',
                                'options' => $users,
                                'label' => 'User',
                                'empty' => 'Choose a user',
                                'readonly' => true,
                                'selected' => $loan->user->username
                            ]);
                            echo $this->Form->control('loan_date_start', [
                                'class' => 'form-control',
                                'type' => 'text',
                                'placeholder' => 'YYYY-MM-DD',
                                'readonly' => true,
                                'value' => $loan->loan_date_start
                            ]);
                            echo $this->Form->control('loan_date_end', [
                                'class' => 'form-control',
                                'type' => 'text',
                                'placeholder' => 'YYYY-MM-DD',
                                'readonly' => true,
                                'value' => $loan->loan_date_end
                            ]);
                            echo $this->Form->control('active_loan', [
                                'checked' => $loan->active_loan,
                                'label' => 'Active'
                            ]);
                        ?>
                    	<?= $this->Form->button('Save', ['class' => 'btn btn-success'])?>
                    	<?= $this->Html->link('Cancel', ['controller' => 'loans', 'action' => 'index'], ['class' => 'btn btn-default'])?>
				</div>
			</div>
		</div>
		<div class="col-md-9">
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">Books |<small> Add book</small></h3>
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse">
							<i class="fa fa-minus"></i>
						</button>
					</div>
				</div>
				<div class="box-body">
					<?php
					   echo $this->Form->control('loan_details.0.serial', [
					       'class' => 'form-control',
					       'type' => 'text',
					       'label' => 'Serial',
					       'readonly' => true,
					       'value' => $loan->loan_details[0]->book_inventory->serial
					   ]);
					   if (count($loan->loan_details) == 2) {
					       echo $this->Form->control('loan_details.1.serial', [
					           'class' => 'form-control',
					           'type' => 'text',
					           'label' => 'Serial',
					           'readonly' => true,
					           'value' => $loan->loan_details[1]->book_inventory->serial
					       ]);
					   }
					   if (count($loan->loan_details) == 3) {
					       echo $this->Form->control('loan_details.2.serial', [
					           'class' => 'form-control',
					           'type' => 'text',
					           'label' => 'Serial',
					           'readonly' => true,
					           'value' => $loan->loan_details[2]->book_inventory->serial
					       ]);
					   }
					   ?>
				</div>
			</div>
		</div>
		<?= $this->Form->end()?>
	</div>
</section>