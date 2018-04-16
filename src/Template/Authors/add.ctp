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
				<?php $this->Form->setTemplates($formTemplates) ?>
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
                ?>
				<?= $this->Form->button('Save', ['class' => 'btn btn-success'])?>
				<?= $this->Html->link('Cancel', ['controller' => 'authors', 'action' => 'index'], ['class' => 'btn btn-default'])?>
				<?= $this->Form->end()?>
				</div>
			</div>
		</div>
	</div>
</section>