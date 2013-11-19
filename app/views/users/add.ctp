<h1>Registration</h1>
<?php
echo $form->create();
?>
<fieldset>
  <legend>Your Details</legend>
  <ul>
    <li><?php echo $form->input('name'); ?></li>
    <li><?php echo $form->input('username'); ?></li>
    <li><?php echo $form->input('email'); ?></li>
    <li><?php echo $form->input('password'); ?></li>
    <li><?php echo $form->input('password_confirm', array('label'=>'Confirm password')); ?></li>
  </ul>
</fieldset>
<?php echo $form->end('Register'); ?>