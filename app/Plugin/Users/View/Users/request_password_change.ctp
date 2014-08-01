<?php
$this->set("title_for_layout","Request Password");
?>
<div class="users form">
<h1><?php echo __d('users', 'Forgot your password?'); ?></h1>
<p><?php echo __d('users', 'Please enter the email you used for registration and you\'ll get an email with further instructions.'); ?></p>
<?php
	echo $this->Form->create($model, array(
		'url' => array(
			'admin' => false,
			'action' => 'reset_password')));
	echo $this->Form->input('email', array(
		'label' => __d('users', 'Your Email'),
		'type' => 'email'));
	echo $this->Form->submit(__d('users', 'Send Email'));
	echo $this->Form->end();
?>
</div>
<?php echo $this->element('Users.Users/sidebar'); ?>