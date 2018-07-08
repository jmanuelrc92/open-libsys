<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Loan $loan
 */
?>
<header class="content-header">
	<h1>Loans</h1>
	<?php
	   $this->Breadcrumbs->add('Loans', ['controller' => 'loans', 'action' => 'index'], ['templateVars' => ['icon' => '<i class="fa fa-dashboard" aria-hidden="true"></i>']]);
	   $this->Breadcrumbs->add('View');
	   $this->Breadcrumbs->templates($breadcrumbsTemplates);
	   echo $this->Breadcrumbs->render(['class' => 'breadcrumb']);
	?>
</header>
<section class="content">
	<div class="row">
		<div class="col-md-4">
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">Loan information</h3>
				</div>
				<div class="box-body">
					<dl class="dl-horizontal">
						<dt>Username:</dt>
						<dd><?= $loan->user->username?></dd>
						<dt>Name:</dt>
						<dd><?= $loan->user->person->informal_name?></dd>
						<dt>Loan start:</dt>
						<dd><?= $loan->loan_date_start?></dd>
						<dt>Loan end:</dt>
						<dd><?= $loan->loan_date_end?></dd>
						<dt>Active:</dt>
						<dd><?= ($loan->active_loan)? 'Yes':'NO'?></dd>
						<dt>Expired:</dt>
						<dd><?= ($loan->expired_loan)? 'Yes':'NO'?></dd>
					</dl>
				</div>
			</div>
		</div>
		<div class="col-md-8">
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">Book info</h3>
				</div>
				<div class="box-body table-responsive">
					<table class="table table-condensed">
                        <thead>
                            <tr>
                                <th scope="col">Title</th>
                                <th scope="col">Serial</th>
                                <th scope="col">ISBN</th>
                                <th scope="col">Author</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($loan->loan_details as $loanDetail): ?>
                            <tr>
                                <td><?= $loanDetail->book_inventory->book->title ?></td>
                                <td><?= $loanDetail->book_inventory->book->serial?></td>
                                <td><?= $loanDetail->book_inventory->book->isbn_code?></td>
                                <td><?= $loanDetail->book_inventory->book->author->person->formal_name?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
				</div>
			</div>
		</div>
	</div>
</section>
