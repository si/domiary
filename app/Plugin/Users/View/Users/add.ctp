<?php
$this->set("title_for_layout","Register");
?>

<div class="users form">
	<h1><?php echo __d('users', 'Register'); ?></h1>
	<fieldset>
		<?php
			echo $this->Form->create($model);
			echo $this->Form->input('username', array(
				'label' => __d('users', 'Username')));
			echo $this->Form->input('email', array(
				'label' => __d('users', 'E-mail (used as login)'),
				'type' => 'email',
				'error' => array(
				  'isValid' => __d('users', 'Must be a valid email address'),
          'isUnique' => __d('users', 'An account with that email already exists')
        )
		  ));
			echo $this->Form->input('password', array(
				'label' => __d('users', 'Password'),
				'type' => 'password'));
			echo $this->Form->input('temppassword', array(
				'label' => __d('users', 'Confirm Password'),
				'type' => 'password'));

			// Terms of Service link
			$tosLink = $this->Html->link(__d('users', 'Terms of Service'), array('controller' => 'pages', 'action' => 'tos', 'plugin' => null));
			echo $this->Form->input('tos', array(
				'type' => 'checkbox',
				'label' => __d('users', 'I have read and agreed to the ') . $tosLink));
			echo $this->Form->end(__d('users', 'Submit'));
		?>
	</fieldset>
</div>
<?php echo $this->element('Users.Users/sidebar'); ?>
