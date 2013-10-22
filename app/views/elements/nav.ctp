    <nav>
      <ul>
        <li><?php echo $html->link('Home', '/'); ?></li>
        <li><?php echo $html->link('About', '/info/about'); ?></li>
        <?php if(isset($_SESSION['Auth']['User'])) : ?>
        <li><?php echo $html->link('My Domains', '/domains'); ?></li>
        <li><?php echo $html->link('My Profile', '/users'); ?></li>
        <li><?php echo $html->link('Log out', '/users/logout'); ?></li>
        <?php else: ?>
        <li><?php echo $html->link('Register', '/register'); ?></li>
        <li><?php echo $html->link('Log in', '/users/login'); ?></li>
        <?php endif; ?>
      </ul>
    </nav>
