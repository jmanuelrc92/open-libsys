<?php
$this->Form->setTemplates($formTemplates);
echo $this->Form->create($user);
echo $this->Form->control('username', ['class' => 'form-control', 'placeholder' => 'mail@openlibrary.org']);
echo $this->Form->control('password', ['class' => 'form-control']);
echo $this->Form->button('Login', ['class' => 'btn btn-success']);
echo $this->Form->end();
?>