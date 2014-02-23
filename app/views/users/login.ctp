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

<p class="cta-register">Not registered? <?php echo $html->link('Register',array('action'=>'add')); ?> for a free account.</p>