
<!-- File: domains/edit.ctp -->
	
<h1>Edit Domain</h1>
<?php
	echo $this->element('domain_form'); 
?>
<?php
echo $html->link('Cancel', array('action'=>'index'));
?>