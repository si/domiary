<?php
$this->pageTitle = 'Monitor domain expiry dates in your calendar with Domiary';
?>

<h1>Monitor domain expiry dates in your calendar with Domiary</h1>

<p class="intro">Subscribe to your calendar of domain name expiry dates in your own calendar software, whether it's <strong>Outlook&reg;</strong>, <strong>iCal&reg;</strong>, <strong>Sunbird</strong> or even your <strong>iPhone&trade;</strong> or <strong>Blackberry&trade;</strong>.</p>

<?php if(!isset($_SESSION['Auth']['User'])) : ?>

<h2>Sign in with your social accounts</h2>
<ul>
	<li><?php echo $this->Html->link('Twitter', array('controller'=>'auth_login','action'=>'twitter'), array('class'=>'twitter')); ?></li>
	<li><?php echo $this->Html->link('Facebook', array('controller'=>'auth_login','action'=>'facebook'), array('class'=>'facebook')); ?></li>
	<li><?php echo $this->Html->link('Google', array('controller'=>'auth_login','action'=>'google'), array('class'=>'google')); ?></li>
	<li><?php echo $this->Html->link('Email', array('controller'=>'users','action'=>'login'), array('class'=>'email')); ?></li>
</ul>

<?php endif; ?>

<h2>Just some of the awesome features</h2>
<ul>
  <li>Auto-lookup against domain WHOIS database</li>
  <li>Calendar subscriptions for Outlook and Apple iCal</li>
  <li>Email and Twitter alerts</li>
</ul>


<?php if(isset($recent_domain)) : ?>
<div id="recent_domains">
<ol>
<?php 
foreach($recent_domains as $domain) {
  
  echo '<li>'.$domain['domain'].'</li>';

}
?>
</ol>
</div>
<?php endif; ?>
