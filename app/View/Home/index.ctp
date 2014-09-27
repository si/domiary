<?php
$this->pageTitle = 'Monitor domain expiry dates in your calendar with Domiary';
?>

<h1>Monitor domains in your calendar with Domiary</h1>

<p class="intro">Domiary tracks your domain names and creates your own personal calendar of expiry dates; never let a domain name lapse again!</p>
<p class="intro">Subscribe to your own calendar on your smart phone (iPhone, Android, Blackberry &amp; Windows Phone), Outlook, iCal, Google Calendar... in fact, anywhere that supports calendar subscriptions.</p>


<?php if(!isset($_SESSION['Auth']['User'])) : ?>
<section class="login-list">
	<h2>Sign In</h2>
	<p>Domiary is free to use, all you need to do is sign in using one of your <em>awesome</em> social accounts and we'll take care of the rest.</p>
	<ul class="social-login-list">
		<li><i class="fa-twitter-square"></i> <?php echo $this->Html->link('Twitter', array('controller'=>'auth_login','action'=>'twitter'), array('class'=>'twitter')); ?></li>
		<li><i class="fa-facebook-square"></i> <?php echo $this->Html->link('Facebook', array('controller'=>'auth_login','action'=>'facebook'), array('class'=>'facebook')); ?></li>
		<li><i class="fa-google-plus-square"></i> <?php echo $this->Html->link('Google', array('controller'=>'auth_login','action'=>'google'), array('class'=>'google')); ?></li>
		<li><i class="fa-circle"></i> <?php echo $this->Html->link('Email', array('controller'=>'users','action'=>'login'), array('class'=>'email')); ?></li>
	</ul>
</section>
<?php endif; ?>

<section class="feature-list">
	<h2>Features</h2>
	<p>Domiary is pretty slick straight out of the box; check out some of the features already baked in...</p>
	<ul>
		<li>
			<h3><i class="fa-list"></i>Domains</h3>
			<div>Keep track of your entire domain collection</div>
		</li>
		<li>
			<h3><i class="fa-question-circle"></i>WHOIS</h3>
			<div>Auto-lookup against domain WHOIS database</div>
		</li>
		<li>
			<h3><i class="fa-calendar-o"></i>Subscriptions</h3>
			<div>Calendar subscriptions for Outlook and Apple iCal</div>
		</li>
		<li>
			<h3><i class="fa-exclamation-circle"></i>Notifications</h3>
			<div>Email and Twitter alerts<span class="label coming-soon">coming soon</span></div>
		</li>
		<li>
			<h3><i class="fa-star"></i>Stay ahead</h3>
			<div>Never miss a domain expiry date again</div>
		</li>
	</ul>
	<p>We're constantly working on building new features for Domiary, but if you're desperate for a particular feature, you can check our <a href="#">roadmap</a> or drop us a <a href="http://twitter.com/domiary" title="Hit us up on twitter">tweet @domiary</a> with your request and we'll get straight on it.</p>
</section>


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
