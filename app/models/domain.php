<?php
class Domain extends AppModel
{
  var $name = 'Domain';
  var $belongsTo = 'User';

	var $validate = array(
		'domain' => array(
			'rule' => 'notEmpty',
			'message' => 'Required'
		)
  );
}
?>