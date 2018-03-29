<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Author $author
 */
?>
<header class="content-header">
	<h1>Authors</h1>
	breadcrumb
</header>
<section class="content table-responsive">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-body">
				<?php $this->Form->setTemplates($templates) ?>
				<?= $this->Form->create($author)?>
				<?php
                    echo $this->Form->control('first_name', [
                        'class' => 'form-control',
                        'placeholder' => 'JOHN'
                    ]);
                    echo $this->Form->control('middle_name', [
                        'class' => 'form-control',
                        'placeholder' => 'UNKNOWN'
                    ]);
                    echo $this->Form->control('last_name', [
                        'class' => 'form-control',
                        'placeholder' => 'DOE'
                    ]);
                    echo $this->Form->control('sur_name', [
                        'class' => 'form-control',
                        'placeholder' => 'JOHNSON'
                    ]);
                    echo $this->Form->control('publishing_houses._ids', [
                        'options' => $publishingHouses
                    ]);
                ?>
				<?= $this->Form->button('Save', ['class' => 'btn btn-success'])?>
				<?= $this->Form->end()?>
				</div>
			</div>
		</div>
	</div>
</section>