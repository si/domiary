<!-- File: domains/index.ctp -->

<h1>My Domains</h1>

<article>
  <table>
    <thead>
  	<tr>
  		<th><?php echo $html->link('Domain',array('action'=>'index','order/domain_name')); ?></th>
  		<th><?php echo $html->link('Expires',array('action'=>'index','order/expiry')); ?></th>
  		<th>Actions</th>
  	</tr>
    </thead>
    <tfoot>
      <tr>
        <th colspan="4"><?php echo count($domains) . ' domains'; ?></th>
      </tr>
    </tfoot>
    <tbody>
    <?php if(count($domains)==0) : ?>
    <tr>
      <td colspan="4" class="na">No domains stored</td>
    </tr>
  	<?php 
  	else :
  	foreach ($domains as $domain):
  	?>
  	<tr class="vevent <?php echo (strtotime($domain['Domain']['expiry']) < mktime()) ? 'expired': 'active'; ?>">
  		<td class="summary">
  			<?php echo $html->link($domain['Domain']['domain_name'], "/domains/view/".$domain['Domain']['id']); ?>
  		</td>
  		<td><abbr title="<?php echo date('c',strtotime($domain['Domain']['expiry'])); ?>" class="dtstart"><i class="fa fa-clock-o"></i> <?php echo floor((strtotime($domain['Domain']['expiry']) - mktime())/3600/24) . ' days'; ?></abbr></td>
  		<td>
  		  <ul class="actions">
  		    <li> <?php echo $html->link('<i class="fa fa-refresh"></i> Refresh', array('action' => 'refresh', $domain['Domain']['id']),array('escape'=>false)); ?></li>
  		    <li><?php echo $html->link('<i class="fa fa-edit"></i> Edit', array('action' => 'edit', $domain['Domain']['id']),array('escape'=>false)); ?></li>
  		    <li><?php echo $html->link('<i class="fa fa-trash-o"></i> Delete', array('action' => 'delete', $domain['Domain']['id']), array('escape'=>false), 'Are you sure?' )?></li>
  		  </ul>
  		</td>
  	</tr>
  	<?php endforeach; 
  	endif;
  	?>
    </tbody>
  
  </table>
</article>
<aside>
  <section class="statistics">
    <h2>Statistics</h2>
    <ul>
      <li><strong><?php echo count($domains); ?></strong> domains</li>
      <li><strong><?php echo (count($domains)>0) ? floor((strtotime($domains[0]['Domain']['expiry']) - mktime())/3600/24) : '0'; ?></strong> days until next renewal</li>
      <li><strong>&pound;<?php echo count($domains)*6; ?>*</strong> worth of domains <small>(based on &pound;6 per domain)</small></li>
    </ul>
  </section>
  <ul class="actions">
    <li><?php echo $html->link('<i class="fa fa-plus"></i> Add domain',array('controller' => 'domains', 'action' => 'add'),array('class'=>'cta','escape'=>false)); ?></li>
    
    
    <li>
    <?php echo $html->link('<i class="fa fa-calendar"></i> Subscribe to Calendar', array('controller'=>'domains','action' => 'ics', base64_encode($_SESSION['Auth']['User']['email'])), array('escape'=>false,'type'=>'text/calendar','class'=>'cta')); ?>
    </li>
  </ul>
  
  <?php echo $this->element('domain_form'); ?>

  <?php echo $this->element('namecheap'); ?>

</aside>

