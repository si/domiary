<?php
class Registrar extends AppModel {
  var $name = 'Registrar';

	var $validate = array(
		'name' => array(
			'rule' => 'notEmpty',
			'message' => 'Required'
		),
		'url' => array(
			'rule' => 'notEmpty',
			'message' => 'Required'
		)
  );
}
