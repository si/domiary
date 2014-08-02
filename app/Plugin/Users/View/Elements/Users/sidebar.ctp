<div class="actions">
	<ul>
		<!-- if not logged in -->
		<?php if (!$this->Session->read('Auth.User.id')) : ?>

			<!-- login -->
			<li><?php echo $this->Html->link(__d('users', 'Already a member? log in here'), array('action' => 'login')); ?></li>
            <?php if (!empty($allowRegistration) && $allowRegistration)  : true ?>
			<!-- Register -->
			<li><?php echo $this->Html->link(__d('users', 'Register an account'), array('action' => 'add')); ?></li>
            <?php endif; ?>
		<?php else : ?>
			<!-- logout -->
			<li><?php echo $this->Html->link(__d('users', 'Logout'), array('action' => 'logout')); ?>

			<!-- my account -->
			<li><?php echo $this->Html->link(__d('users', 'My Account'), array('action' => 'edit')); ?>

			<!-- change password -->
			<li><?php echo $this->Html->link(__d('users', 'Change password'), array('action' => 'change_password')); ?>
		<?php endif ?>
		<?php if($this->Session->read('Auth.User.is_admin')) : ?>
            <li>&nbsp;</li>
            <li><?php echo $this->Html->link(__d('users', 'List Users'), array('action'=>'index'));?></li>
        <?php endif; ?>
	</ul>
</div>
