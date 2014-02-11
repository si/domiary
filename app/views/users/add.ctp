<h1>Registration</h1>
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