<?php
echo $form->create('Domain');
  echo $form->input('id', array('type'=>'hidden')); 
  echo $form->input('user_id', array('type'=>'hidden','value'=>$_SESSION['Auth']['User']['id'])); 
?>
<fieldset>
  <legend>Domain Details</legend>
  <?php
  echo $form->input('domain_name', array('label'=>'Domain'));
  echo $form->input('tags', array('label'=>'Tags (comma separated)'));
  if($this->data['Domain']['id']!='') echo $form->input('archive', array('label'=>'Archive'));
  ?>  
</fieldset>
<?php
echo $form->end('Save');
?>


