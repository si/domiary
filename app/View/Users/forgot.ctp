<h1>Forgot Password</h1>

<?php if(isset($token)) : ?>

<p>We found your account and sent email to you with a link to reset your password.</p>

<?php echo $this->Html->link('Reset password', array('action'=>'password',$token)); ?>

<?php else : ?>

<p>Please enter your email address or username so we can find your account.</p>
<?php
echo $this->Form->create();
?>
<fieldset>
  <legend>Your Details</legend>

  <?php echo $this->Form->input('username', array('required'=>false)); ?>
  or
  <?php echo $this->Form->input('email', array('required'=>false)); ?>

</fieldset>
<?php echo $this->Form->end('Find account'); ?>

<?php endif; ?>