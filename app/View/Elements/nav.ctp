    <nav>
      <ul>
        <li><?php echo $this->Html->link('Home', '/'); ?></li>
        <li><?php echo $this->Html->link('About', '/info/about'); ?></li>
        <?php if(isset($_SESSION['Auth']['User'])) : ?>
        <li><?php echo $this->Html->link('Domains', array('controller'=>'domains','action'=>'index'),array('class'=>(($this->params['controller']=='domains') ? 'current' : ''))); ?></li>
        <li><?php echo $this->Html->link('Profile', array('controller'=>'users','action'=>'index'),array('class'=>(($this->params['controller']=='users') ? 'current' : ''))); ?></li>
        <li><?php echo $this->Html->link('Log out', array('controller'=>'users','action'=>'logout'),array('class'=>(($this->params['action']=='logout') ? 'current' : ''))); ?></li>
        <?php else: ?>
        <li><?php echo $this->Html->link('Register', array('controller'=>'users','action'=>'add'),array('class'=>(($this->params['controller']=='users' && $this->params['action']=='add') ? 'current' : ''))); ?></li>
        <li><?php echo $this->Html->link('Log in', array('controller'=>'users','action'=>'logout'),array('class'=>(($this->params['action']=='login') ? 'current' : ''))); ?></li>
        <?php endif; ?>
      </ul>
    </nav>
