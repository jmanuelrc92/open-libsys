<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Location $location
 */
?>
<header class="content-header">
	<h1>Locations</h1>
	breadcrumb
</header>
<section class="content table-responsive">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-body">
				<?php $this->Form->setTemplates($templates) ?>
				<?= $this->Form->create($location)?>
				<?php
    echo $this->Form->control('location_name', [
        'class' => 'form-control',
        'placeholder' => 'bookshelve'
    ]);
    echo $this->Form->control('location_code', [
        'class' => 'form-control',
        'placeholder' => 'A1'
    ]);
    ?>
				<?= $this->Form->button('Save', ['class' => 'btn btn-success'])?>
				<?= $this->Form->end()?>
				</div>
			</div>
		</div>
	</div>
</section>