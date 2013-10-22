<h1>Register</h1>
<?php
echo $form->create();
?>
<fieldset>
  <legend>Your Details</legend>
  <ol>
    <li><?php echo $form->input('name'); ?></li>
    <li><?php echo $form->input('username'); ?></li>
    <li><?php echo $form->input('email'); ?></li>
    <li><?php echo $form->input('password'); ?></li>
    <li><?php echo $form->input('password_confirm'); ?></li>
  </ol>
</fieldset>
<?php echo $form->end('Register'); ?>