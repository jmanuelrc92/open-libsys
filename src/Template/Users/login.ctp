<?php
$this->Form->setTemplates($templates);
echo $this->Form->create();
echo $this->Form->control('username', ['class' => 'form-control', 'placeholder' => 'mail@openlibrary.org']);
echo $this->Form->control('password', ['class' => 'form-control']);
echo $this->Form->button('Submit', ['class' => 'btn btn-success']);
echo $this->Form->end();
?>