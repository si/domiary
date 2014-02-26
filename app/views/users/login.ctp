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

<ul>
  <li>New here? <?php echo $html->link('Register for free',array('action'=>'add')); ?></li>
  <li>Can't login? <?php echo $html->link('Reset your password',array('action'=>'forgot')); ?></li>
</ul>