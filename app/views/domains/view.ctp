<!-- File: domains/view.ctp -->
<article>
  <h1><i class="fa fa-globe"></i> <?php echo $domain['Domain']['domain_name']?></h1>
  <p class="important">
    <span>
      <i class="fa fa-clock-o"></i> Expires in 
      <strong class="<?php echo (((strtotime($domain['Domain']['expiry']) - mktime())/3600/24)<28) ? 'urgent' : ''; ?>"><?php echo $time->timeAgoInWords($domain['Domain']['expiry'], array('end' => '+5 years')); ?></strong> 
    </span>
    <span>
      <i class="fa fa-calendar"></i> on 
      <strong><?php echo $time->format('d M Y',$domain['Domain']['expiry']); ?></strong>
    </span>
    <span>
      <i class="fa fa-certificate"></i> registered 
      <strong><?php echo $time->format('d M Y',$domain['Domain']['registered']); ?></strong>
    </span>
    <span>
      <i class="fa fa-refresh"></i> updated 
      <strong><?php echo $time->format('d M Y',$domain['Domain']['created']); ?></strong>
  </p>
  <table>
    <tbody>
      <tr><th>By</th><td><?php echo ((isset($whois['regrinfo']['owner']['name'])) ? $whois['regrinfo']['owner']['name'] : '') . ((isset($whois['regrinfo']['owner']['organization']) && $whois['regrinfo']['owner']['organization']!='') ? ' (' . $whois['regrinfo']['owner']['organization'] . ')' : ''); ?></td></tr>
      <tr><th>Email</th><td><?php echo (isset($whois['regrinfo']['admin']['email'])) ? $whois['regrinfo']['admin']['email'] : ''; ?></td></tr>
      <tr><th>Telephone</th><td><?php echo isset($whois['regrinfo']['admin']['phone']) ? $whois['regrinfo']['admin']['phone'] : ''; ?></td></tr>
      <tr><th>Registrar</th><td><?php echo (isset($whois['regyinfo']['referrer'])) ? '<a href="'. $whois['regyinfo']['referrer'] . '">' .$whois['regyinfo']['registrar'] .'</a>' : 'N/A'; ?></td></tr>
    </tbody>
  </table>

</article>
<aside>
  <h2>Authenticate Ownership</h2>
  <ul class="actions">
  
    <?php if(isset($whois['regrinfo']['admin']['email']) && $whois['regrinfo']['admin']['email']!='') : ?>
    <li><?php echo $html->link('<i class="fa fa-envelope"></i> Send email to owner', array('controller'=>'domains','action'=>'authenticate',$domain['Domain']['id'].'/email'),array('class'=>'cta', 'title'=>'Send an email to ' . $whois['regrinfo']['admin']['email'],'escape'=>false)); ?></li>
    <?php endif; ?>
  
    <li><?php echo $html->link('<i class="fa fa-code"></i> Check META tag', array('controller'=>'domains','action'=>'authenticate',$domain['Domain']['id'].'/meta'),array('class'=>'cta', 'escape'=>false)); ?></li>
    
    <li><?php echo $html->link('<i class="fa fa-cloud"></i> Upload file to website', array('controller'=>'domains','action'=>'authenticate',$domain['Domain']['id'].'/ftp'),array('class'=>'cta', 'title'=>'Upload a file to ' . $domain['Domain']['domain_name'],'escape'=>false)); ?></li>
  </ul>
</aside>

  <?php
  $tags = explode(',', $domain['Domain']['tags']);
  if(count($tags)>0) : ?>
  <h2>Tags</h2>
  <ul class="tags">
  <?php
  foreach($tags as $tag) {
    echo '<li>'. $html->link(
      '<i class="fa fa-tag"></i> ' . trim($tag),
      array(
        'controller'=>'domains',
        'action'=>'tag',
        urlencode(trim($tag))
      ),
      array('rel'=>'tag', 'escape'=>false)
    ) . '</li>';
  }
  ?>
  </ul>
  <?php else: ?>
  <p class="na">No tags set yet.</p>
  <?php endif; ?>

<ul>
  <li><?php echo $html->link('Refresh Details', array('controller' => 'domains', 'action' => 'refresh', $domain['Domain']['id']))?></li>
  <li><?php echo $html->link('Edit Domain', array('controller' => 'domains', 'action' => 'edit', $domain['Domain']['id']))?></li>
  <li><?php echo $html->link('Delete Domain', array('controller' => 'domains', 'action' => 'delete', $domain['Domain']['id']),null,'Are you sure you want to remove this domain or just archive it?')?></li>
  <li><?php echo $html->link('Back to list', array('controller' => 'domains', 'action' => 'index'))?></li>
</ul>

<textarea class="debug" id="domain_detail">
<?php var_dump($domain); ?>
</textarea>

<textarea class="debug" id="whois_detail">
<?php var_dump($whois); ?>
</textarea>

