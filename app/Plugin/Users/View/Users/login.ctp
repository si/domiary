<?php
$this->set("title_for_layout","Sign in");
?>

<div class="users index">
	<h1><?php echo __d('users', 'Login'); ?></h1>
	
	<div class="social">
  	<h2>Sign in with your social accounts</h3>
  	<ul class="providers">
  		<li><?php echo $this->Html->link('Twitter', array('controller'=>'auth_login','action'=>'twitter'), array('class'=>'twitter')); ?></li>
  		<li><?php echo $this->Html->link('Facebook', array('controller'=>'auth_login','action'=>'facebook'), array('class'=>'facebook')); ?></li>
  		<li><?php echo $this->Html->link('Google', array('controller'=>'auth_login','action'=>'google'), array('class'=>'google')); ?></li>
  	</ul>
	
	</div>
	
	<div class="email">
  	<h2>&hellip; or your email address</h3>
		<?php
			echo $this->Form->create($model, array(
				'action' => 'login',
				'id' => 'LoginForm'));
        echo $this->Form->hidden('User.return_to', array(
				'value' => $return_to));
		?>
  	<fieldset>
  	  <?php
  			echo $this->Form->input('email', array(
  				'label' => __d('users', 'Email'),
  				'placeholder' => 'Email',
  				'type' => 'email'
        ));
  			echo $this->Form->input('password',  array(
  				'label' => __d('users', 'Password'),
  				'placeholder' => 'Password'
  		  ));
  
  			echo $this->Form->input('remember_me', array('type' => 'checkbox', 'label' =>  __d('users', 'Remember Me')));
  			echo $this->Form->button(__d('users','Sign in'));
  
        echo $this->Html->link(__d('users', 'I forgot my password'), array('action' => 'reset_password'));
        ?>
    </fieldset>
    <?php
  		echo $this->Form->end();
    ?>
	</div>

</div>
<?php // echo $this->element('/Users.Users/sidebar'); ?>