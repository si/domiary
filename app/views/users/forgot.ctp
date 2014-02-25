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
  <ul>
    <li><?php echo $form->input('username'); ?></li>
    <li><?php echo $form->input('email'); ?></li>
  </ul>
</fieldset>
<?php echo $form->end('Find account'); ?>

<?php endif; ?>