    <nav>
      <ul>
        <li><?php echo $html->link('Home', '/'); ?></li>
        <li><?php echo $html->link('About', '/info/about'); ?></li>
        <?php if(isset($_SESSION['Auth']['User'])) : ?>
        <li><?php echo $html->link('Domains', array('controller'=>'domains','action'=>'index'),array('class'=>(($this->params['controller']=='domains') ? 'current' : ''))); ?></li>
        <li><?php echo $html->link('Profile', array('controller'=>'users','action'=>'index'),array('class'=>(($this->params['controller']=='users') ? 'current' : ''))); ?></li>
        <li><?php echo $html->link('Log out', array('controller'=>'users','action'=>'logout'),array('class'=>(($this->params['action']=='logout') ? 'current' : ''))); ?></li>
        <?php else: ?>
        <li><?php echo $html->link('Register', array('controller'=>'users','action'=>'add'),array('class'=>(($this->params['controller']=='users' && $this->params['action']=='add') ? 'current' : ''))); ?></li>
        <li><?php echo $html->link('Log in', array('controller'=>'users','action'=>'logout'),array('class'=>(($this->params['action']=='login') ? 'current' : ''))); ?></li>
        <?php endif; ?>
      </ul>
    </nav>
