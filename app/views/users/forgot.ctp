<h1>Forgot Password</h1>

<?php if(isset($token)) : ?>

<p>We found your account and sent email to you with a link to reset your password.</p>

<?php echo $html->link('Reset password', array('action'=>'password',$token)); ?>

<?php else : ?>

<p>Please enter your email address or username so we can find your account.</p>
<?php
echo $form->create();
?>
<fieldset>
  <legend>Your Details</legend>

  <?php echo $form->input('username'); ?>
  or
  <?php echo $form->input('email'); ?>

</fieldset>
<?php echo $form->end('Find account'); ?>

<?php endif; ?>