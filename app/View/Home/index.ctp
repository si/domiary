<?php
$this->pageTitle = 'Monitor domain expiry dates in your calendar with Domiary';
?>

<h1>Monitor domain expiry dates in your calendar with Domiary</h1>

<a href="/register" class="large cta">Register now for free</a>

<p class="intro">Subscribe to your calendar of domain name expiry dates in your own calendar software, whether it's <strong>Outlook&reg;</strong>, <strong>iCal&reg;</strong>, <strong>Sunbird</strong> or even your <strong>iPhone&trade;</strong> or <strong>Blackberry&trade;</strong>.</p>

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

<div id="cta_godaddy">
<?php echo $this->element('godaddy_form'); ?>
</div>

<div id="cta_1and1">
<?php echo $this->element('1&1_form'); ?>
</div>
