<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<header class="content-header">
	<h1>Users</h1>
	<?php
    	$this->Breadcrumbs->add('Users', ['controller' => 'users', 'action' => 'index'], ['templateVars' => ['icon' => '<i class="fa fa-dashboard" aria-hidden="true"></i>']]);
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
					<?= $this->Form->create($user)?>
        				<?php
                            echo $this->Form->control('username', [
                                'class' => 'form-control',
                                'placeholder' => 'user@mail.org'
                            ]);
                            echo $this->Form->control('password', [
                                'class' => 'form-control'
                            ]);
                            echo $this->Form->control('role_id', [
                                'options' => $roles,
                                'empty' => 'CHOOSE A ROLE',
                                'class' => 'form-control'
                            ]);
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
                    	<?= $this->Html->link('Cancel', ['controller' => 'users', 'action' => 'index'], ['class' => 'btn btn-default'])?>
					<?= $this->Form->end()?>
					</div>
			</div>
		</div>
	</div>
</section>