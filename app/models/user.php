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
                          'rule'=>array('minLength', 4),
                          'message'=>'Name has to be at least four characters'),

            'email'=>array(
                          'rule'=>array('email'),
                          'message'=>'Please enter a valid email'),

            'username'=>array(
                              'Username has to be at least four characters'=>array(
                                  'rule'=>array('minLength', 4)
                              ),
                              'This username is already taken, please try another'=>array(
                                  'rule'=>'isUnique'
                              )),

            'password'=>array(
                              'Password cannot be empty'=>array(
                                   'rule'=>array('notEmpty')
                                ),
                              'Password must be at least four characters'=>array(
                                   'rule'=>array('minLength', 4)
                                ),
                              'Passwords must match'=>array(
                                   'rule'=>array('passwordCompare', 'password_confirm')
                              ))
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
    
?>