<?php
class User extends AppModel {

  var $name = 'User';

  var $hasMany = array(
      'Domain' => array(
        'className' => 'Domain',
        'conditions' => '',
        'foreignKey' => 'user_id',
        'dependent' => true,
        'exclusive' => false,
        'finderQuery'   => '',
        'fields' => '',
        'offset' => '',
        'counterQuery' => ''
      )
    );
    

  var $validate = array(
    'name'=>array(
      'rule'=>array('minLength', 2),
      'message'=>'Name has to be at least 2 characters'),
  
    'email'=>array(
      'rule'=>array('email'),
      'message'=>'Please enter a valid email'),
  
    'username'=>array(
      'length' =>array(
        'rule' =>array('minLength', 2),
        'message' => 'Username has to be at least 2 characters',
      ),
      'unique' =>array(
        'rule'=>'isUnique',
        'message' => 'This username is already taken, please try another',
      )),
  
    'password'=>array(
      'empty' =>array(
         'rule'=>array('notEmpty'),
         'message' => 'Password cannot be empty',
        ),
      'length'=>array(
         'rule'=>array('minLength', 4),
         'message' => 'Password must be at least four characters',
        ),
      'match' =>array(
        'rule'=>array('passwordCompare', 'password_confirm'),
        'message' => 'Passwords must match',
      )
    )
  );

  function passwordCompare($data, $fieldTwo) {   

    if($data['password'] != $this->data[$this->alias][$fieldTwo]) {
      $this->invalidate($fieldTwo, 'Passwords must match');
      return false;
    } 
    return true;
  }

  function hashPasswords($data, $enforce=false) {            

     if($enforce && isset($this->data[$this->alias]['password'])) {
       if(!empty($this->data[$this->alias]['password'])) {
         $this->data[$this->alias]['password'] = Security::hash($this->data[$this->alias]['password'], null, true);
       }
     }
     return $data;
  }

  function beforeSave() {
    $this->hashPasswords(null, true);
    return true;
  }
}
