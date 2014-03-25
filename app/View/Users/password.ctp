<?php if(isset($success)) : ?>

<h1>Success!</h1>
<p><?php echo $success; ?></p>
<?php echo $this->Html->link('In you go', array('controller'=>'users','action'=>'login')); ?>



<?php else : ?>
<h1>New Password</h1>

<?php
if(isset($error)) {
  echo '<p class="error">' . $error . '</p>'; 
} else {
  echo '<p>Your token looks good. You can now choose a new password that is more memorable.</p>';
}
?>

<?php
echo $this->Form->create();
  echo $this->Form->input('token',array('type'=>'hidden', 'value' => ((empty($this->data)) ? $token : $this->data['User']['token'])));
?>
<fieldset>
  <legend>Passwords</legend>

  <?php echo $this->Form->input('password',array('label'=>'New password')); ?>
  <?php echo $this->Form->input('password_confirm',array('type'=>'password','label'=>'And to be sure')); ?>

</fieldset>
<?php echo $this->Form->end('Set password'); ?>

<?php endif; ?>