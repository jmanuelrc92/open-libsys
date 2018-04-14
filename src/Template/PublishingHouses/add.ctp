<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PublishingHouse $publishingHouse
 */
$this->Form->setTemplates($formTemplates);
?>
<header class="content-header">
	<h1>Publishing Houses</h1>
	<?php
    	$this->Breadcrumbs->add('Publishing houses', ['controller' => 'publishing_houses', 'action' => 'index'], ['templateVars' => ['icon' => '<i class="fa fa-dashboard" aria-hidden="true"></i>']]);
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
					<?= $this->Form->create($publishingHouse) ?>
        				<?= $this->Form->control('publishing_house_name', [
                                'class' => 'form-control',
                                'placeholder' => 'Honorable organization'
                            ]);
        				?>
                    	<?= $this->Form->button('Save', ['class' => 'btn btn-success'])?>
                    	<?= $this->Html->link('Cancel', ['controller' => 'users', 'action' => 'index'], ['class' => 'btn btn-default'])?>
					<?= $this->Form->end()?>
					</div>
			</div>
		</div>
	</div>
</section>