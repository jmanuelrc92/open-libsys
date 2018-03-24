<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<header class="content-header">
	<h1>Usuarios</h1>
	breadcrumb
</header>
<section class="content table-responsive">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-body">
				<?php $this->Form->setTemplates($templates) ?>
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
				<?= $this->Form->button('Guardar', ['class' => 'btn btn-success'])?>
				<?= $this->Form->end()?>
				</div>
			</div>
		</div>
	</div>
</section>