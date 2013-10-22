<h1>Log in</h1>
<?php
if ($session->check('Message.auth')) $session->flash('auth');
?>
<?php echo $form->create('User', array('action' => 'login')); ?>
<fieldset>
  <legend>Your Details</legend>
  <?php echo $form->input('username'); ?>
  <?php echo $form->input('password'); ?>
</fieldset>
<?php echo $form->end('Login'); ?>  

<p><?php echo $html->link('Register',array('action'=>'add')); ?></p>