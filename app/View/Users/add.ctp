<h1>Registration</h1>
<?php
echo $this->Form->create();
?>
<fieldset>
  <legend>Your Details</legend>
  <ul>
    <li><?php echo $this->Form->input('name'); ?></li>
    <li><?php echo $this->Form->input('username'); ?></li>
    <li><?php echo $this->Form->input('email'); ?></li>
    <li><?php echo $this->Form->input('password'); ?></li>
    <li><?php echo $this->Form->input('password_confirm', array('type'=>'password','label'=>'Confirm password')); ?></li>
  </ul>
</fieldset>
<?php echo $this->Form->end('Register'); ?>