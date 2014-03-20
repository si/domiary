<h1>Log in</h1>
<?php
if ($this->Session->check('Message.auth')) $this->Session->flash('auth');
?>
<?php echo $this->Form->create('User', array('action' => 'login')); ?>
<fieldset>
  <legend>Your Details</legend>
  <?php echo $this->Form->input('username'); ?>
  <?php echo $this->Form->input('password'); ?>
</fieldset>
<?php echo $this->Form->end('Login'); ?>  

<ul>
  <li>New here? <?php echo $this->Html->link('Register for free',array('action'=>'add')); ?></li>
  <li>Can't login? <?php echo $this->Html->link('Reset your password',array('action'=>'forgot')); ?></li>
</ul>