<h1>Registration</h1>
<p>You can register for a free account on Domiary. We'll need a few details to get you going first so complete the boxes below and hit <em>Register</em>.</p>
<?php
echo $form->create();
?>
<fieldset>
  <legend>Your Details</legend>
  <ul>
    <li><?php echo $form->input('name'); ?></li>
    <li><?php echo $form->input('username'); ?></li>
    <li><?php echo $form->input('email', array('type'=>'email')); ?></li>
    <li><?php echo $form->input('password'); ?></li>
    <li><?php echo $form->input('password_confirm', array('type'=>'password','label'=>'Confirm password')); ?></li>
  </ul>
</fieldset>
<?php echo $form->end('Register'); ?>