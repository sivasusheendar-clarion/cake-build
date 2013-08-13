<h1>Edit User</h1>
<?php
echo $this->Form->create('User',array('type' => 'file'));
echo $this->Form->input('email');
echo $this->Form->input('role');
echo $this->Form->end('Save');
?>