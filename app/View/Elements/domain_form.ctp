<?php
//$_SESSION['Auth']['User']['id']
echo $this->Form->create('Domain', array('action'=>( isset ( $this->data['Domain']['id']))?'edit':'add'));
  echo $this->Form->input('id', array('type'=>'hidden'));
  echo $this->Form->input('user_id', array('type'=>'hidden','value'=>''));
?>
<fieldset>
  <legend>Domain details</legend>
  <?php
  echo $this->Form->input('domain_name', array('label'=>'Domain', 'type'=>'url'));
  echo $this->Form->input('tags', array('label'=>'Tags (comma separated)'));
  if(isset($this->data['Domain']) && $this->data['Domain']['id']!='') echo $this->Form->input('archive', array('label'=>'Archive'));
  ?>
</fieldset>
<?php
echo $this->Form->end('Save');
?>
