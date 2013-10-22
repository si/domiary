<!-- File: domains/view.ctp -->
<article>
  <h1><?php echo $domain['Domain']['domain_name']?></h1>
  <p>Expires in <strong><?php echo floor((strtotime($domain['Domain']['expiry']) - mktime())/3600/24) . ' days'; ?></strong> <small>(<?php echo $time->nice($domain['Domain']['expiry'])?>)</small></p>
  <h2>Domain Information</h2>
  <table>
    <tbody>
      <tr><th>Registered</th><td><?php echo $time->nice($domain['Domain']['registered']); ?></td></tr>
      <tr><th>By</th><td><?php echo $owner['name'] . ((isset($owner['organization']) && $owner['organization']!='') ? ' (' . $owner['organization'] . ')' : ''); ?></td></tr>
      <tr><th>Email</th><td><?php echo $admin['email']?></td></tr>
      <tr><th>Telephone</th><td><?php echo $admin['phone']?></td></tr>
      <tr><th>Added</th><td><?php echo $time->nice($domain['Domain']['created'])?></td></tr>
      <tr><th>Registrar</th><td><?php echo '<a href="'. $whois['regyinfo']['referrer'] . '">' .$whois['regyinfo']['registrar'] .'</a>'; ?></td></tr>
    </tbody>
  </table>
  <h2>Tags</h2>
  <?php
  $tags = explode(',', $domain['Domain']['tags']);
  if(count($tags)>0) : ?>
  <ul class="tags">
  <?php
  foreach($tags as $tag) {
    echo '<li>'. $html->link(
      trim($tag),
      array(
        'controller'=>'domains',
        'action'=>'tag',
        urlencode(trim($tag))
      ),
      array('rel'=>'tag')
    ) . '</li>';
  }
  ?>
  </ul>
  <?php else: ?>
  <p class="na">No tags set yet.</p>
  <?php endif; ?>

</article>
<aside>
  <h2>Authenticate</h2>
  <ul class="actions">
  
    <?php if(isset($admin['email']) && $admin['email']!='') : ?>
    <li><?php echo $html->link('Send an email to '.$admin['email'], array('controller'=>'domains','action'=>'authenticate',$domain['Domain']['id'].'/email'),array('class'=>'cta')); ?></li>
    <?php endif; ?>
  
    <?php if(isset($admin['phone']) && $admin['phone']!='') : ?>
    <li><?php echo $html->link('Send SMS code to '.$admin['phone'], array('controller'=>'domains','action'=>'authenticate',$domain['Domain']['id'].'/sms'),array('class'=>'cta')); ?></li>
    <?php endif; ?>
    
    <li><?php echo $html->link('FTP file to '.$domain['Domain']['domain_name'], array('controller'=>'domains','action'=>'authenticate',$domain['Domain']['id'].'/ftp'),array('class'=>'cta')); ?></li>
  </ul>
</aside>

<p><?php echo $html->link('Back to list', array('controller' => 'domains', 'action' => 'index'))?></p>

<textarea class="debug" id="domain_detail">
<?php var_dump($domain); ?>
</textarea>

<textarea class="debug" id="whois_detail">
<?php var_dump($whois); ?>
</textarea>

